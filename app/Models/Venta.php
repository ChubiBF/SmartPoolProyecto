<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'venta';
    protected $primaryKey = 'ID_Venta';
    public $timestamps = false;

    protected $fillable = [
        'Fecha_venta',
        'ID_Cliente',
        'ID_Empleado',
    ];

    // Relación con detalle venta
    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'ID_Venta');
    }

    // Relación con cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }

    // Relación con empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'ID_Empleado');
    }
}
