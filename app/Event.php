<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Event extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'started_at',
    ];

    public function getNameAttribute($value)
    {
        $ignore = ['a', 'and', 'at', 'but', 'for', 'in', 'the', 'to', 'with'];

        $name = explode(' ', $value);

        $modifiedName = [];

        foreach ($name as $word)
        {
            if (!in_array($word, $ignore))
            {
                $modifiedName[] = ucfirst($word);
            }
            else
            {
                $modifiedName[] = strtolower($word);
            }
        }

        return join(' ', $modifiedName);
    }

    public function occuringToday()
    {
        return $this->started_at->isToday();
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('enabled', function (Builder $builder) {
            $builder->where('enabled', '=', 1);
        });
    }
}
