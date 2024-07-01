<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    // Define los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
    ];

    // Si estás usando SoftDeletes
    protected $dates = ['deleted_at'];
}
