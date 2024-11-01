<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Empleado;
use Carbon\Carbon;
use App\Models\Usuario;
class VentaController extends Controller
{
    // Mostrar lista de ventas
    public function index()
    {
        $ventas = Venta::with('detalles')->get();
        return view('empleado.ventas.index', compact('ventas'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $clientes = Cliente::with('usuario')->get(); // Obtener clientes con datos del usuario
        $empleados = Empleado::with('usuario')->get(); // Obtener empleados con datos del usuario
        $productos = Producto::all(); // Obtener productos
    
        return view('empleado.ventas.create', compact('clientes', 'empleados', 'productos'));
    }
    
    // Guardar una nueva venta
    public function store(Request $request)
    {
        // Validar los campos de entrada
        $request->validate([
            'ID_Cliente' => 'required|exists:cliente,ID_Cliente',
            'ID_Empleado' => 'required|exists:empleado,ID_empleado',
            'ID_Producto' => 'required|exists:producto,ID_Producto',
            'Cantidad' => 'required|integer|min:1',
        ]);

        // Crear la venta
        $venta = Venta::create([
            'Fecha_venta' => Carbon::now(),
            'ID_Cliente' => $request->ID_Cliente,
            'ID_Empleado' => $request->ID_Empleado,
        ]);

        // Crear el detalle de la venta
        DetalleVenta::create([
            'ID_Venta' => $venta->ID_Venta,
            'ID_Producto' => $request->ID_Producto,
            'Cantidad' => $request->Cantidad,
        ]);

        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente');
    }

    public function edit(Venta $venta)
{
    $clientes = Cliente::with('usuario')->get();
    $empleados = Empleado::with('usuario')->get();
    $productos = Producto::all();
    $detalleVenta = $venta->detalles->first(); // Obtenemos el primer detalle de la venta
    
    return view('empleado.ventas.edit', compact('venta', 'clientes', 'empleados', 'productos', 'detalleVenta'));
}

public function update(Request $request, Venta $venta)
{
    // Primero, veamos qué datos están llegando
    \Log::info('Datos recibidos en update:', [
        'request_all' => $request->all(),
        'ID_Empleado' => $request->ID_Empleado,
        'venta_actual' => $venta->toArray(),
        'empleado_actual' => $venta->empleado ? $venta->empleado->toArray() : null
    ]);

    try {
        // Validación con mensajes más específicos
        $validated = $request->validate([
            'ID_Cliente' => 'required|exists:cliente,ID_Cliente',
            'ID_Empleado' => 'required|exists:empleado,ID_empleado',
            'ID_Producto' => 'required|exists:producto,ID_Producto',
            'Cantidad' => 'required|integer|min:1',
        ], [
            'ID_Empleado.required' => 'El campo empleado es requerido. Valor recibido: ' . $request->ID_Empleado,
            'ID_Empleado.exists' => 'El empleado seleccionado no existe en la base de datos. ID: ' . $request->ID_Empleado,
        ]);

        // Si la validación pasa, continuar con la actualización
        \DB::beginTransaction();

        // Actualizar la venta
        $ventaActualizada = $venta->update([
            'ID_Cliente' => $validated['ID_Cliente'],
            'ID_Empleado' => $validated['ID_Empleado'],
        ]);

        // Actualizar el detalle
        $detalleVenta = $venta->detalles->first();
        if ($detalleVenta) {
            $detalleVenta->update([
                'ID_Producto' => $validated['ID_Producto'],
                'Cantidad' => $validated['Cantidad'],
            ]);
        }

        \DB::commit();
        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente');

    } catch (\Exception $e) {
        \DB::rollBack();
        \Log::error('Error en actualización:', [
            'mensaje' => $e->getMessage(),
            'datos' => $request->all()
        ]);
        return back()->withErrors(['error' => $e->getMessage()])->withInput();
    }
}
public function destroy(Venta $venta)
{
    try {
        // Iniciar transacción
        \DB::beginTransaction();

        // Eliminar los detalles de la venta
        $venta->detalles()->delete();

        // Eliminar la venta
        $venta->delete();

        // Confirmar transacción
        \DB::commit();

        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente');
    } catch (\Exception $e) {
        \DB::rollBack();
        \Log::error('Error al eliminar la venta:', ['mensaje' => $e->getMessage()]);
        return back()->withErrors(['error' => 'Hubo un problema al eliminar la venta'])->withInput();
    }
}

}
