<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'dni', 'Nombres', 'ApellPaterno', 'ApellMaterno','tipo','estado','montoPagado'
    ];
}
