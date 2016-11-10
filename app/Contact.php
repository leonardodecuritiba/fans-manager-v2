<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cellphone',
        'zipcode',
        'state',
        'city',
        'address',
        'number',
        'complement'
    ];
}
