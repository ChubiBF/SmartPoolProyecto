<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Nombre de la tabla asociada
    protected $table = 'PRODUCTO';

    // Llave primaria de la tabla
    protected $primaryKey = 'ID_Producto';

    // Indicar que no hay timestamps (created_at, updated_at)
    public $timestamps = false;

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'Nombre_Producto',
        'Precio_Unitario',
        'Stock_Actual'
    ];

    // Definir las relaciones con otras tablas si es necesario
    public function detallesVenta()
    {
        return $this->hasMany(DetalleVenta::class, 'ID_Producto');
    }

    public function detallesCompra()
    {
        return $this->hasMany(DetalleCompra::class, 'ID_Producto');
    }
}
