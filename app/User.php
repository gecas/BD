<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $reditectTo = '/';
    
    protected $fillable = [
        'name','lastname', 'email', 'password', 'phone', 'address', 'billing_id', 'card-number',
        'ccv', 'gender'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function order()
    {
        return $this->hasMany('App\Order');
    }
}
