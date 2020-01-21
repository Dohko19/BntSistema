<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecibosNomina extends Model
{
    protected $fillable = [
		'closter_id', 'marca_id', 'nombre', 'nss', 'closter', 'tienda', 'recibo_nomina',
	];

	public function scopeAllowed($query)
    {
        if (auth()->user()->can('view', $this))
        {
            return $query;
        }
            // return $query->where('user_id', auth()->id());
    }

    public static function create(array $attributes = [])
    {
        $recibosnomina = static::query()->create($attributes);

        return $recibosnomina;
    }

    public function closters()
    {
        return $this->belongsTo(Closter::class, 'closter_id');
    }

    public function marcas()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }
}
