<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'ID_Usuario';
    public $timestamps = false;


    protected $fillable = [
        'Nombre',
        'Apellido',
        'Email',
        'Contraseña',
        'Fecha_registro',
        'Telefono',
        'ID_Rol',
    ];

    protected $hidden = [
        'Contraseña',
        'remember_token',
    ];

    protected $casts = [
        'Fecha_registro' => 'date',
    ];

    public function getAuthPassword()
    {
        return $this->Contraseña;
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'ID_Rol');
    }
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'ID_Usuario', 'ID_Usuario');
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'ID_Usuario', 'ID_Usuario');
    }
    public function generateTwoFactorCode()
    {
        $this->two_factor_code = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $this->two_factor_expires_at = now()->addMinutes(10);
        $this->save();
    }
    
    public function resetTwoFactorCode()
    {
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }
    
}