<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public function getFullnameAttribute()
    {
        $this->firstname = "KOKOS";
        return $this->firstname . " " . $this->lastname;
    }

    public function getFirstnameAttribute()
    {
        return "kek_" . $this->firstname;
    }

    public function getLastnameAttribute()
    {
        return "kek_" . $this->lastname;
    }


    public function profile(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Profile');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event')
                ->withPivot('comment')
                ->withTimestamps();
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'state_id',
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

    private $firstname;
    private $lastname;
}
