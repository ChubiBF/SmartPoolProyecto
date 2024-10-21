<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['cliente', 'piscina'])->get();
        return view('reservas.index', compact('reservas'));
    }

    public function store(Request $request)
    {
        $reserva = Reserva::create($request->all());
        return response()->json($reserva);
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        $reserva->update($request->all());
        return response()->json($reserva);
    }

    public function destroy($id)
    {
        $reserva = Reserva::find($id);
        $reserva->delete();
        return response()->json(['success' => true]);
    }
}