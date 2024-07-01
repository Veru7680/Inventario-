<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class rolController extends Controller
{
    public function principal()
    {
        $roles = Role::withTrashed()->paginate(5); // Por ejemplo, 10 roles por página
        return view('roles.principal', ['roles' => $roles]);

       
    }
    

    public function crear()
    {
        return view('roles.crear');
    }

    public function mostrar($id)
    {
        $role = Role::find($id);
        return view('roles.mostrar', compact('role'));
    }

   public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
    ]);

    $rol = new Role();
    $rol->nombre = $request->nombre;
    $rol->save();

    return redirect()->route('rol.principal');
}

    public function editar(Role $role)
    {
        return view('roles.editar', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $role->nombre = $request->nombre;
        $role->save();

        return redirect()->route('rol.principal');
    }

    public function activar($id)
{
    $role = Role::withTrashed()->findOrFail($id); // Buscar con registros eliminados
    $role->restore(); // Restaurar el registro eliminado lógicamente
    return redirect()->route('rol.principal');
}

public function borrar($id)
{
    $role = Role::withTrashed()->findOrFail($id); // Buscar con registros eliminados
    $role->forceDelete(); // Eliminar permanentemente el registro
    return redirect()->route('rol.principal');
}

public function desactivar($id)
{
    $role = Role::findOrFail($id); // Buscar el registro
    $role->delete(); // Eliminar lógicamente el registro
    return redirect()->route('rol.principal');
}

}
