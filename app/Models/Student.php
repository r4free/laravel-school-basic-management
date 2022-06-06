<?php

namespace App\Models;

use App\Scopes\SchoolScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends User
{
    protected $table = 'users';

    const ROLE_ID = 1;
    
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            $builder->where('role_id', 1);
        });

        static::creating(function($model){
            $model->role_id = self::ROLE_ID;
            if(\Auth::check())
                $model->school_id = \Auth::user()->school_id;
        });

    }

    protected static function booted()
    {
        static::addGlobalScope(new SchoolScope);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class,'user_group','group_id','user_id')
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

