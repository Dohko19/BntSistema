<?php

namespace App;

use Jenssegers\Date\Date;
use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;

class Sua extends Model
{
	use DatesTranslator;

    protected $fillable = [
    	'num_mes','month', 'year', 'cedula_determinacion_cuotas',
        'resumen_liquidacion', 'pago_sua', 'user_id'
    	];

    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->id();

        $sua = static::query()->create($attributes);
        return $sua;
    }

     public function users()
    {
        return $this->belongsTo(User::class);
    }
}
