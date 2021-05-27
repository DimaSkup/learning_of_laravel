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

    protected $fillable = [
        'name',
        'abbreviation',
    ];
}
