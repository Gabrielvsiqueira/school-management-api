<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = [
        'name',
        'year'
    ];

    public function students(){
        return $this->hasMany(Student::class);
    }
}
