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

        parent::creating(function($model){
            $model->school_id = auth()->user()->school_id;
        });

    }
}
