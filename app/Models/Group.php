<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        static::creating(function($model) {
            if(\Auth::check())
                $model->school_id = \Auth::user()->school_id;
        });
    }
    
}
