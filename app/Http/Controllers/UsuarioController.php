<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('rol')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Email' => 'required|email|unique:usuario,Email',
            'Contraseña' => 'required|min:6',
            'Telefono' => 'required',
            'ID_Rol' => 'required|exists:rol,ID_Rol',
        ]);

        $usuario = new Usuario($request->all());
        $usuario->Contraseña = Hash::make($request->Contraseña);
        $usuario->Fecha_registro = now();
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }

    public function show($id)
    {
        $usuario = Usuario::with(['rol', 'cliente', 'empleado'])->findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Email' => 'required|email|unique:usuario,Email,'.$id.',ID_Usuario',
            'Telefono' => 'required',
            'ID_Rol' => 'required|exists:rol,ID_Rol',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->except('Contraseña'));

        if ($request->filled('Contraseña')) {
            $usuario->Contraseña = Hash::make($request->Contraseña);
            $usuario->save();
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente');
    }

    
}