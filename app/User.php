<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Notifications\FansApiPasswordReset as ResetPasswordNotification;

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
        'username',
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

    static public function findUsername($username)
    {
        $User = User::where("username", $username)->first();
        return (count($User) > 0) ? $User->email : NULL;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function fan()
    {
        return $this->belongsTo('App\Fan', 'id', 'user_id');
    }

    public function contact()
    {
        return $this->hasOne('App\Contact', 'id', 'contact_id');
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
