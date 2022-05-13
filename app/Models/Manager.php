<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Manager extends User
{
    
    protected $table = 'users';
    
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->where('role_id', 2);
        });
    }

}

