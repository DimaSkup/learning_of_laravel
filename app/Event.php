<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Event extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $dates = [
        'created_at',
        'updated_at',
        'started_at',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getNameAttribute($value)
    {
        $ignore = ['a', 'and', 'at', 'but', 'for', 'in', 'the', 'to', 'with'];

        $name = explode(' ', $value);

        $modifiedName = [];

        foreach ($name as $word)
        {
            $word = strtolower($word);

            if (!in_array($word, $ignore))
            {
                $modifiedName[] = ucfirst($word);
            }
            else
            {
                $modifiedName[] = $word;
            }
        }

        return join(' ', $modifiedName);
    }

    public function occuringToday()
    {
        return $this->started_at->isToday();
    }

    public function scopeEnabled($query)
    {
        return $query->where('enabled', 1);
    }

    public function scopeIdRange($query, $idFrom, $idTo)
    {
        return $query->whereBetween('id', [$idFrom, $idTo]);
    }


    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    /*
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('enabled', function (Builder $builder) {
            $builder->where('enabled', '=', 1);
        });
    }
    */
}
