<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','school_id','grade_id'];

    public function grade()
    {
        $this->belongsTo(Grade::class);
    }
}
