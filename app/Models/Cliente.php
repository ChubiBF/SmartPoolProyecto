<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'ID_Cliente';
    public $timestamps = false;

    protected $fillable = [
        'U_CI', 'ID_Usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_Usuario');
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'ID_Cliente');
    }
}