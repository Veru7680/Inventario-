<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function principal()
    {
        $roles = Role::withTrashed()->paginate(4); // Puedes ajustar el número de elementos por página
        return view('roles.principal', ['roles' => $roles]);
    }

    public function crear()
    {
        return view('roles.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Role::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('rol.principal')->with('success', 'Rol creado exitosamente.');
    }

    public function mostrar($id)
    {
        $role = Role::find($id);
        return view('roles.mostrar', compact('role'));
    }

    

    public function editar($id)
{
    $role = Role::findOrFail($id);
    return view('roles.editar', compact('role'));
}




    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $rol = Role::findOrFail($id);
        $rol->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('rol.principal')->with('success', 'Rol actualizado exitosamente.');
    }

    public function borrar($id)
    {
        $rol = Role::withTrashed()->find($id);
        if ($rol) {
            $rol->forceDelete();
        }
        return redirect()->route('rol.principal');
    }

    public function desactivar($id)
    {
        $rol = Role::find($id);
        if ($rol) {
            $rol->delete();
        }
        return redirect()->route('rol.principal');
    }

    public function activar($id)
    {
        $rol = Role::withTrashed()->find($id);
        if ($rol) {
            $rol->restore();
        }
        return redirect()->route('rol.principal');
    }
}
