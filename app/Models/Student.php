<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'date_of_birth',
        'turma_id'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function turma(){
        return $this->belongsTo(ClassModel::class);
    }
}
