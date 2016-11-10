<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contact_id',
        'login',
        'email',
        'password',
        'remember_token',
        'validated',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function contact()
    {
        return $this->hasOne('App\Contact', 'id', 'contact_id');
    }

    static public function findLogin($login)
    {
        $User = User::where("login",$login)->first();
        return (count($User)>0)?$User->email:NULL;
    }

    public function validate($token)
    {
        if($this->attributes['remember_token'] == $token){
            $this->attributes['validated'] = 1;
            $this->save();
            return 1;
        }
        return 0;
    }
}
