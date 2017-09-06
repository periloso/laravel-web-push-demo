<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
//        'password', 'remember_token',
    ];

    /**
     * Returns true if this is the logged in user.
     * @return bool
     */
    public function getIsMeAttribute()
    {
        try {
            return \Auth::user()->id === $this->id;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Returns true if this is NOT the logged in user.
     * @return bool
     */
    public function getIsNotMeAttribute()
    {
        try {
            return \Auth::user()->id !== $this->id;
        } catch (\Exception $e) {
            return true;
        }
    }
}
