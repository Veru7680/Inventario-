<?php

namespace App\Http\Controllers;

use App\Models\Categoria; // Asegúrate de importar el modelo Categoria
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function principal()
    {
        // Pagina los registros de Categorias
        $categorias = Categoria::paginate(4); // Puedes ajustar el número de elementos por página

        // Devuelve la vista con los registros paginados
        return view('categorias.principal', ['categorias' => $categorias]);
    }


    public function crear()
    {
        // Devuelve la vista para crear una categoría
        return view('categorias.crear');
    }

    public function mostrar($id)
    {
        // Obtén la categoría por su id
        $categoria = Categoria::find($id);
        // Devuelve la vista para mostrar la categoría
        return view('categorias.mostrar', compact('categoria'));
    }
}
