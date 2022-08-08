<?php

namespace App\Models;

use App\Models\Curso;
use App\Models\Inicio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plantilla extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    public function cursos(){
        return $this->belongsToMany(Curso::class);
    }

    public function inicios(){
        return $this->hasMany(Inicio::class);
    }
}
