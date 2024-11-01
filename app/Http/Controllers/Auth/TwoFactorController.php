<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\TwoFactorCode;
use Illuminate\Support\Facades\Mail;

class TwoFactorController extends Controller
{
    // Mostrar la vista de verificación
    public function show()
    {
        return view('emails.auth.two-factor');
    }

    // Verificar el código ingresado
    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:6',
        ]);

        $user = auth()->user();

        // Verificar si el código es válido y no ha expirado
        if ($request->code !== $user->two_factor_code || 
            now()->isAfter($user->two_factor_expires_at)) 
        {
            return back()->withErrors(['code' => 'El código no es válido o ha expirado.']);
        }

        // Limpiar el código y marcar como verificado
        $user->resetTwoFactorCode();
        session()->put('two_factor_verified', true);

        return redirect()->intended(route('dashboard.cliente'));
    }

    // Reenviar el código
    public function resend()
    {
        $user = auth()->user();
        $user->generateTwoFactorCode();
        
        Mail::to($user->Email)->send(new TwoFactorCode($user));

        return back()->with('status', 'Se ha enviado un nuevo código de verificación.');
    }
}