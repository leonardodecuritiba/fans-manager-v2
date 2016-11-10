<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'admin_id',
        'name',
        'description'
    ];
    public function admin()
    {
        return $this->hasOne('App\Admin', 'id', 'admin_id');
    }
}

