<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';
    protected $primaryKey = 'ID_Proveedor';
    public $timestamps = false;

    protected $fillable = [
        'Nombre_Prov', 'Email', 'Telefono', 'Direccion'
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class, 'ID_Proveedor');
    }
}