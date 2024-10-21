<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piscina extends Model
{
    protected $table = 'piscina';
    protected $primaryKey = 'ID_Piscina';
    public $timestamps = false;

    protected $fillable = [
        'Capacidad', 'Precio'
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'ID_Piscina');
    }
}