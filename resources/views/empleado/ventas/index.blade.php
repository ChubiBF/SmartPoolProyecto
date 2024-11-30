@extends('layouts.app')

@section('content')
<head>
    <!-- Otros enlaces de CSS -->
    <link rel="stylesheet" href="{{ asset('css/indexs.css') }}">
</head>

<div class="container">
    <h1>Lista de Ventas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para crear una nueva venta -->
    <div class="mb-3 text-right">
        <a href="{{ route('ventas.create') }}" class="btn btn-success">Registrar Nueva Venta</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>Fecha Venta</th>
                <th>Cliente</th>
                <th>Empleado</th>
                <th>Detalles</th>
                <th>Acciones</th> <!-- Nueva columna para los botones de editar y eliminar -->
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->ID_Venta }}</td>
                    <td>{{ $venta->Fecha_venta }}</td>
                    <td>{{ $venta->cliente->usuario->Nombre }} {{ $venta->cliente->usuario->Apellido }}</td>
                    <td>{{ $venta->empleado->usuario->Nombre }} {{ $venta->empleado->usuario->Apellido }}</td>
                    <td>
                        @foreach ($venta->detalles as $detalle)
                            Producto: {{ $detalle->producto->Nombre_Producto }} - Cantidad: {{ $detalle->Cantidad }}<br>
                        @endforeach
                    </td>
                    <td>
    <!-- Botón para editar la venta -->
<a href="{{ route('ventas.edit', $venta->ID_Venta) }}" class="btn btn-warning">Editar</a>
    <!-- Botón para eliminar la venta -->
    <form action="{{ route('ventas.destroy', $venta->ID_Venta) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta venta?')">Eliminar</button>
</form>

</td>


                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
