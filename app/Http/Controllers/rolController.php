<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class rolController extends Controller
{
    public function principal()
    {
        $roles = Role::all();
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
        $role = new Role();
        $role->nombre = $request->nombre;
        $role->save();

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

    public function borrar($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('rol.principal');
    }

    public function activar($id)
    {
        $role = Role::withTrashed()->find($id);
        $role->restore();

        return redirect()->route('rol.principal');
    }

    public function desactivar($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('rol.principal');
    }
}
