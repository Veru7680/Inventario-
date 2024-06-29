<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categorias';

    protected $fillable = [
        'nombre',
    ];

    protected $dates = ['deleted_at']; // Asegúrate de que 'deleted_at' esté en el array de fechas

    public function productos()
    {
        return $this->hasMany('App\Models\Producto');
    }
}
