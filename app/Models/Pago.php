<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
    protected $primaryKey = 'ID_Pago';
    public $timestamps = false;

    protected $fillable = [
        'Fecha_Pago', 'Metodo_Pago', 'ID_Reserva', 'ID_Servicio', 'ID_Venta'
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'ID_Reserva');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'ID_Servicio');
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'ID_Venta');
    }
}