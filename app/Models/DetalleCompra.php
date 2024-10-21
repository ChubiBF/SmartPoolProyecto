<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = 'detalle_compra';
    protected $primaryKey = 'ID_Detalle_Compra';
    public $timestamps = false;

    protected $fillable = [
        'ID_Compra', 'ID_Producto', 'Cantidad'
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'ID_Compra');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }
}