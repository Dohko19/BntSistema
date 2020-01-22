<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sua extends Model
{
    protected $files = ['num_mes','mes', 'anio', 'cedula_determinacion_cuotas', 'resumen_liquidacion', 'pago_sua'];
}
