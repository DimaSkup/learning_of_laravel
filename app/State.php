<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function events()
    {
        return $this->hasMany('App\Event')
                    ->orderBy('created_at', 'DESC')
                    ->where('activated', true);
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function favorites()
    {
        return $this->hasManyThrough('App\Event', 'App\User');
    }

    protected $fillable = [
        'name',
        'abbreviation',
        'user_id'
    ];
}
