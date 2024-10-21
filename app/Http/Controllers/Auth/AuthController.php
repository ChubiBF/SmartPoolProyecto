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

class AuthController extends Controller
{
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
                'ID_Rol' => 1, // Asumiendo que 1 es el ID para el rol de Cliente
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

    public function login(Request $request)
    {
        Log::info('Intento de inicio de sesión', ['email' => $request->email]);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['Email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            Log::info('Inicio de sesión exitoso', ['usuario' => Auth::user()->ID_Usuario]);

            if (Auth::user()->rol->Nombre_Rol === 'Cliente') {
                return redirect()->route('dashboard.cliente');
            } else {
                return redirect()->route('dashboard.empleado');
            }
        }

        Log::warning('Intento de inicio de sesión fallido', ['email' => $request->email]);
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput($request->except('password'));
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
                'ID_Rol' => 2, // Asumiendo que 2 es el ID para el rol de Empleado
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