<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compra';
    protected $primaryKey = 'ID_Compra';
    public $timestamps = false;

    protected $fillable = [
        'Fecha_Compra', 'ID_Proveedor', 'ID_Empleado'
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'ID_Proveedor');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'ID_Empleado');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleCompra::class, 'ID_Compra');
    }
}