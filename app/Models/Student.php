<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends User
{
    protected $table = 'users';
    
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->where('role_id', 1);
        });
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class,'user_group')
        ->orderByPivot('created_at','desc');
    }

    public function getGroupAttribute()
    {
        return $this->groups->first();
    }

    public function getGradeAttribute()
    {
        $this->group->grade;
    }

}

