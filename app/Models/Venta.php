<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
    protected $primaryKey = 'ID_Venta';
    public $timestamps = false;

    protected $fillable = [
        'Fecha_venta', 'ID_Cliente', 'ID_Empleado'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'ID_Empleado');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'ID_Venta');
    }

    public function pago()
    {
        return $this->hasOne(Pago::class, 'ID_Venta');
    }
}