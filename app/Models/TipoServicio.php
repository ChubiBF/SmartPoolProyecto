<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    protected $table = 'tipo_servicio';
    protected $primaryKey = 'ID_Tipo_Servicio';
    public $timestamps = false;

    protected $fillable = [
        'Nombre_Tipo', 'Descripcion', 'Precio'
    ];

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'ID_Tipo_Servicio');
    }
}