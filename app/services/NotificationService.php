<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;
use App\Models\Usuario;

class NotificationService
{
    public function sendPasswordResetEmail(Usuario $user, string $token)
    {
        try {
            Mail::to($user->Email)->send(new PasswordResetMail($token));
            return true;
        } catch (\Exception $e) {
            \Log::error('Error enviando email de recuperación: ' . $e->getMessage());
            return false;
        }
    }
}