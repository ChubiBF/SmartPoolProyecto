<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_venta';
    protected $primaryKey = 'ID_Detalle_Venta';
    public $timestamps = false;

    protected $fillable = [
        'ID_Venta', 'ID_Producto', 'Cantidad'
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'ID_Venta');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }
}