<?php

    namespace App\Models;

    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Laravel\Sanctum\HasApiTokens;

    class Teacher extends Authenticatable
    {
        use HasApiTokens, HasFactory;

        protected $fillable = [
            'name',
            'email',
            'password',
            'department',
        ];

        protected $hidden = [
            'password',
            'remember_token',
        ];

        public function turmas(){
            return $this->belongsToMany(Turma::class);
        }
    }
