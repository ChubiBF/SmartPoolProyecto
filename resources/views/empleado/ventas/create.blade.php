@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Venta</title>
    <link rel="stylesheet" href="{{ asset('css/styles1.css') }}">
</head>
<div class="container">
    <h1>Registrar nueva venta</h1>

    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="ID_Cliente">Cliente</label>
            <select name="ID_Cliente" id="ID_Cliente" class="form-control" required>
                <option value="">Seleccione un cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->ID_Cliente }}">
                        {{ $cliente->usuario->Nombre }} {{ $cliente->usuario->Apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ID_Empleado">Empleado</label>
            <select name="ID_Empleado" id="ID_Empleado" class="form-control" required>
                <option value="">Seleccione un empleado</option>
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->ID_empleado }}">
                        {{ $empleado->usuario->Nombre }} {{ $empleado->usuario->Apellido }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="ID_Producto">Producto</label>
            <select name="ID_Producto" id="ID_Producto" class="form-control" required>
                <option value="">Seleccione un producto</option>
                @foreach ($productos as $producto)
                    <option value="{{ $producto->ID_Producto }}">{{ $producto->Nombre_Producto }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Cantidad">Cantidad</label>
            <input type="number" name="Cantidad" id="Cantidad" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Registrar Venta</button>
    </form>
</div>
@endsection
