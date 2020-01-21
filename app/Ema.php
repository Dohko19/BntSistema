<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ema extends Model
{
    protected $fillable = ['user_id','periodo', 'desde', 'hasta', 'pdf'];

    protected $dates = ['periodo', 'desde', 'hasta'];

    //Parseo de fechas
    public function setPeriodoAttribute($periodo)
    {
        $this->attributes['periodo'] = Carbon::parse($periodo);
    }
    public function setDesdeAttribute($desde)
    {
        $this->attributes['desde'] = Carbon::parse($desde);
    }
    public function setHastaAttribute($hasta)
    {
        $this->attributes['hasta'] = Carbon::parse($hasta);
    }
    //fin de parseo de fechas

    //Relacion Uno a Muchos entre modelo user y Eba
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->id();

        $ema = static::query()->create($attributes);
        return $ema;
    }
}
