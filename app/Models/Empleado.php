<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';
    protected $primaryKey = 'ID_empleado';
    public $timestamps = false;

    protected $fillable = [
        'Puesto', 'Salario', 'Fecha_contratacion', 'ID_Usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_Usuario');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'ID_Empleado');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'ID_Empleado');
    }
}