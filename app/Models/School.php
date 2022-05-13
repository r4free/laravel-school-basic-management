<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name','address'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function addManager(array $data) : User
    {
        $data['role_id'] = 2;
        return $this->users()->create($data);
    }

}