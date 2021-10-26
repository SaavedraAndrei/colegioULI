<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id','Nombres', 'ApellPaterno', 'ApellMaterno', 'dni', 'genero', 'nivel', 'seccion', 'celular','estado','montoPagado', 'p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9', 'p10'
    ];
}
