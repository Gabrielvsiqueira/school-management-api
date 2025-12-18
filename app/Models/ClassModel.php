<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $fillable = [
        'name',
        'year'
    ];

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }
}
