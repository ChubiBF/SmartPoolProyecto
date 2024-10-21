<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'ID_Producto';
    public $timestamps = false;

    protected $fillable = [
        'Nombre_Producto', 'Precio_Unitario', 'Stock_Actual'
    ];

    public function detallesCompra()
    {
        return $this->hasMany(DetalleCompra::class, 'ID_Producto');
    }

    public function detallesVenta()
    {
        return $this->hasMany(DetalleVenta::class, 'ID_Producto');
    }
}