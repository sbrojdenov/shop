<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Order extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'email', 'telephone','adress','town','comment','quantity'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function product(){
        return $this->belongsToMany('App\Product');
    }
}
