<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'closter_id', 'marca_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'assigned_roles');
    }

    public function hasRoles(array $roles)
    {
        return $this->roles->pluck('name')->intersect($roles)->count();
    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function isCliente()
    {
        return $this->hasRoles(['cliente']);
    }

    public function marcas()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function closters()
    {
        return $this->belongsTo(Closter::class, 'closter_id');
    }

    public function emas()
    {
        return $this->hasMany(Ema::class);
    }

    public function ebas()
    {
        return $this->hasMany(Eba::class);
    }

    public function suas()
    {
        return $this->hasMany(Sua::class);
    }

    public function scopeAllowed($query)
    {
        if (auth()->user()->can('view', $this))
        {
            return $query;
        }
            return $query->where('user_id', auth()->id());
    }

}
