<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio';
    protected $primaryKey = 'ID_Servicio';
    public $timestamps = false;

    protected $fillable = [
        'ID_Cliente', 'ID_Empleado', 'ID_Tipo_Servicio'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'ID_Empleado');
    }

    public function tipoServicio()
    {
        return $this->belongsTo(TipoServicio::class, 'ID_Tipo_Servicio');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'ID_Servicio');
    }
}