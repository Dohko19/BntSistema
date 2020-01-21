<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Closter extends Model
{
    use SoftDeletes;

	protected $fillable = ['name'];
    protected $dates = ['deleted_at'];

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public static function create(array $attributes = [])
    {
        $closter = static::query()->create($attributes);

        return $closter;
    }

    public function rnominas()
    {
        return $this->hasMany(RecibosNomina::class);
    }
}
