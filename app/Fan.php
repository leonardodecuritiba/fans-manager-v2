<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'club_id',
        'name',
        'cpf',
        'sex',
        'birthday'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function club()
    {
        return $this->hasOne('App\Club', 'id', 'club_id');
    }
    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d/m/Y',$value)->format('Y-m-d');
    }
    public function validate($token)
    {
        return $this->user->validate($token);
    }
}
