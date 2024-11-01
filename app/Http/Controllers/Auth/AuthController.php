<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Mail\TwoFactorCode;
use Illuminate\Support\Facades\Cache; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter; // Agregar este
use Illuminate\Auth\Events\Lockout;         // Agregar este
use Illuminate\Cache\RateLimiting\Limit;    // Agregar este
use Illuminate\Support\Str;                 // Agregar este
class AuthController extends Controller
{
    private $maxLoginAttempts = 5;
    private $lockoutTime = 300;
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        Log::info('Intento de registro', ['email' => $request->email]);

        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:usuario,Email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['nullable', 'string', 'max:20'],
            'u_ci' => ['nullable', 'string', 'max:20'],
        ]);

        try {
            $usuario = Usuario::create([
                'Nombre' => $request->name,
                'Apellido' => $request->lastname,
                'Email' => $request->email,
                'Contraseña' => Hash::make($request->password),
                'Fecha_registro' => now(),
                'Telefono' => $request->phone,
                'ID_Rol' => 1,
            ]);

            Cliente::create([
                'U_CI' => $request->u_ci ?? '',
                'ID_Usuario' => $usuario->ID_Usuario,
            ]);

            Auth::login($usuario);

            Log::info('Registro exitoso', ['usuario' => $usuario->ID_Usuario]);
            return redirect()->route('dashboard.cliente');
        } catch (\Exception $e) {
            Log::error('Error en el registro', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Ocurrió un error durante el registro. Por favor, inténtelo de nuevo.'])->withInput($request->except('password'));
        }
    }

    protected $maxAttempts = 5;
    protected $decayMinutes = 5;

    //{}{}{{}{}{}{}{}{}{}} LOGIN {}{}{{}{}{}{}{}{}{}}
    public function login(Request $request)
    {
        // Validar el límite de intentos
        $key = 'login_attempts_' . $request->ip();
        $attempts = Cache::get($key, 0);

        if ($attempts >= 3) {
            $blockedUntil = now()->addMinutes(5);
            Cache::put('login_blocked_' . $request->ip(), $blockedUntil, 300);

            return back()->withErrors([
                'email' => 'Demasiados intentos fallidos. Por favor, espera 5 minutos antes de intentar nuevamente.'
            ]);
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['Email' => $credentials['email'], 'password' => $credentials['password']])) {
            // Éxito en el login - limpiar intentos fallidos
            Cache::forget($key);
            $user = Auth::user();
            if ($user->two_factor_enabled) {
                // Generar y enviar el código
                $user->generateTwoFactorCode();
                
                try {
                    Mail::to($user->Email)->send(new TwoFactorCode($user));
                    Log::info('Código de verificación enviado', ['usuario' => $user->ID_Usuario]);
                } catch (\Exception $e) {
                    Log::error('Error enviando código de verificación', [
                        'usuario' => $user->ID_Usuario,
                        'error' => $e->getMessage()
                    ]);
                    return back()->withErrors([
                        'email' => 'Error enviando código de verificación. Por favor, intenta de nuevo.'
                    ]);
                }
                
                // Guardar la URL prevista para después de la verificación
                session()->put('intended_url', session()->get('url.intended', 
                    $user->rol->Nombre_Rol === 'Cliente' 
                        ? route('dashboard.cliente') 
                        : route('dashboard.empleado')
                ));
                
                return redirect()->route('two-factor.show');
            }
            $request->session()->regenerate();
            
            // Registrar inicio de sesión exitoso
            $this->logLoginAttempt($request, true);

            return redirect()->intended(
                Auth::user()->rol->Nombre_Rol === 'Cliente'
                ? route('dashboard.cliente')
                : route('dashboard.empleado')
            );
        }

        // Incrementar intentos fallidos
        Cache::put($key, $attempts + 1, 300);

        // Registrar intento fallido
        $this->logLoginAttempt($request, false);

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.'
        ])->withInput($request->except('password'));
    }

    // Agregar este nuevo método para registrar intentos
    private function logLoginAttempt(Request $request, bool $successful)
    {
        DB::table('login_attempts')->insert([
            'email' => $request->email,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'successful' => $successful,
            'created_at' => now()
        ]);
    }
    protected function updateLoginData($user)
    {
        try {
            $user->last_login_at = now();
            $user->save();
        } catch (\Exception $e) {
            Log::error('Error actualizando datos de login', [
                'user_id' => $user->ID_Usuario,
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function logActivity(Request $request, $action)
    {
        try {
            \DB::table('activity_logs')->insert([
                'user_id' => Auth::id() ?? null,
                'action' => $action,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } catch (\Exception $e) {
            Log::error('Error registrando actividad', [
                'action' => $action,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    //empleado temporal jsdfasjdf
    public function crearEmpleadoConHash()
    {
        try {
            $usuario = Usuario::create([
                'Nombre' => 'an',
                'Apellido' => 'ba',
                'Email' => 'chubi@emp.com',
                'Contraseña' => Hash::make('emp123123'), // Contraseña encriptada
                'Fecha_registro' => now(),
                'Telefono' => '1234567890',
                'ID_Rol' => 2,
            ]);

            Empleado::create([
                'Puesto' => 'Puesto del Empleado',
                'Salario' => 2500.00,
                'Fecha_contratacion' => now(),
                'ID_Usuario' => $usuario->ID_Usuario,
            ]);

            Log::info('Empleado creado exitosamente', ['usuario' => $usuario->ID_Usuario]);
            return "Empleado creado exitosamente con ID: " . $usuario->ID_Usuario;
        } catch (\Exception $e) {
            Log::error('Error al crear empleado', ['error' => $e->getMessage()]);
            return "Error al crear empleado: " . $e->getMessage();
        }
    }

    
}