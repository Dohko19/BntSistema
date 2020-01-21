<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
	protected $fillable = ['name'];

    public function rnominas()
    {
    	return $this->hasMany(RecibosNomina::class);
    }
}
