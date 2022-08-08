<?php

namespace App\Models;

use App\Models\Plantilla;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curso extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function plantillas(){
        return $this->belongsToMany(Plantilla::class);
    }
}
