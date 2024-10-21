<?php

namespace App\Http\Controllers;

use App\Models\Piscina;
use Illuminate\Http\Request;

class PiscinaController extends Controller
{
    public function index()
    {
        $piscinas = Piscina::all();
        return view('piscinas.index', compact('piscinas'));
    }

    public function store(Request $request)
    {
        $piscina = Piscina::create($request->all());
        return response()->json($piscina);
    }

    public function show($id)
    {
        $piscina = Piscina::with('reservas')->findOrFail($id);
        return view('piscinas.show', compact('piscina'));
    }

    public function update(Request $request, $id)
    {
        $piscina = Piscina::findOrFail($id);
        $piscina->update($request->all());
        return response()->json($piscina);
    }

    public function destroy($id)
    {
        $piscina = Piscina::findOrFail($id);
        $piscina->delete();
        return response()->json(['success' => true]);
    }
}