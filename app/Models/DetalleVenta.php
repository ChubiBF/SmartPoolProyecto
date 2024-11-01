<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table = 'detalle_venta';
    protected $primaryKey = 'ID_Detalle_Venta';
    public $timestamps = false;

    protected $fillable = [
        'ID_Venta',
        'ID_Producto',
        'Cantidad',
    ];

    // Relación con venta
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'ID_Venta');
    }

    // Relación con producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }
}
