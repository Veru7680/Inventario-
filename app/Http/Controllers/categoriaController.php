<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function principal()
    {
        $categorias = Categoria::withTrashed()->paginate(4); // Puedes ajustar el número de elementos por página
        return view('categorias.principal', ['categorias' => $categorias]);

    }

    public function crear()
    {
        return view('categorias.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Categoria::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('categoria.principal')->with('success', 'Categoría creada exitosamente.');
    }

    public function mostrar($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.mostrar', compact('categoria'));
    }

    public function editar($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.editar', ['categoria' => $categoria]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('categoria.principal')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function borrar($id)
    {
        $categoria = Categoria::withTrashed()->find($id);
        $categoria->forceDelete();
        return redirect()->route('categoria.principal');
    }

    public function desactivar($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria) {
            $categoria->delete();
        }
        return redirect()->route('categoria.principal');
    }

    public function activar($id)
    {
        $categoria = Categoria::withTrashed()->find($id);
        if ($categoria) {
            $categoria->restore();
        }
        return redirect()->route('categoria.principal');
    }
}
