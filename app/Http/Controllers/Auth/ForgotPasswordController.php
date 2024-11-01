<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Usuario;
use Carbon\Carbon;
use App\Services\NotificationService;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
class ForgotPasswordController extends Controller
{
    protected $notificationService;
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usuario,Email',
        ]);

        $user = Usuario::where('Email', $request->email)->first();
        $token = Str::random(64);

        // Eliminar tokens anteriores
        PasswordReset::where('email', $user->Email)->delete();

        // Crear nuevo token
        PasswordReset::create([
            'email' => $user->Email,
            'token' => $token,
            'created_at' => Carbon::now(),
            'expires_at' => Carbon::now()->addHours(2)
        ]);

        // Enviar email
        $emailSent = $this->notificationService->sendPasswordResetEmail($user, $token);

        if (!$emailSent) {
            return back()->withErrors([
                'email' => 'Hubo un problema al enviar el correo. Por favor, intenta más tarde.'
            ]);
        }

        return back()->with('status', 'Te hemos enviado un correo con las instrucciones para restablecer tu contraseña.');
    }
    public function showForm()
    {
        return view('auth.forgot-password');
    }

    

    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:usuario,Email',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/' // Requiere mayúsculas, minúsculas y números
            ]
        ], [
            'password.regex' => 'La contraseña debe contener al menos una mayúscula, una minúscula y un número.'
        ]);
    
        $reset = PasswordReset::where('email', $request->email)
            ->where('token', $request->token)
            ->where('expires_at', '>', Carbon::now())
            ->first();
    
        if (!$reset) {
            return back()->withErrors(['email' => 'El enlace de recuperación no es válido o ha expirado.']);
        }
    
        $user = Usuario::where('Email', $request->email)->first();
        $user->Contraseña = Hash::make($request->password);
        $user->save();
    
        // Eliminar todos los tokens de este usuario
        PasswordReset::where('email', $request->email)->delete();
    
        return redirect()->route('login')
            ->with('status', 'Tu contraseña ha sido restablecida correctamente. Ya puedes iniciar sesión.');
    }
}