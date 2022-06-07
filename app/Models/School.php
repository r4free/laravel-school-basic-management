<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name','address'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function(Builder $builder){
            $builder->when(\Auth::check() && !\Auth::user()->is_super_admin, function($query){
                $query->forCurrentUser();
            });
        });

    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function addManager(array $data) : User
    {
        $data['role_id'] = 2;
        return $this->users()->create($data);
    }

    public function scopeForCurrentUser($query)
    {
        $query->where('id', \Auth::user()->school_id);
    }

}
