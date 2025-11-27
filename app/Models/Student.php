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

    public function turma(){
        return $this->belongsTo(Turma::class);
    }
}
