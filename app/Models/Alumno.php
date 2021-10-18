<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id','Nombres', 'ApellPaterno', 'ApellMaterno', 'dni', 'genero', 'nivel', 'seccion', 'celular','estado','montoPagado', 'b1', 'b2', 'b3', 'b4'
    ];
}
