<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Builder};
class Group extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','school_id','grade_id', 'shift'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder)
        {
            $builder
            ->when(\Auth::check(),function($builder) {
                $builder->where('school_id', \Auth::user()->school_id);
            });
        });

        static::creating(function($model) {
            if(\Auth::check())
                $model->school_id = \Auth::user()->school_id;
        });

    }
    
}
