@extends('layouts.app')

@section('content')
<head>
    <!-- Otros enlaces de CSS -->
    <link rel="stylesheet" href="{{ asset('css/edir.css') }}">
</head>
<div class="container">
    <h1>Editar Venta</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('ventas.update', $venta->ID_Venta) }}" id="formEditarVenta">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="ID_Cliente">Cliente:</label>
            <select name="ID_Cliente" id="ID_Cliente" class="form-control @error('ID_Cliente') is-invalid @enderror" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->ID_Cliente }}" {{ (old('ID_Cliente', $venta->ID_Cliente) == $cliente->ID_Cliente) ? 'selected' : '' }}>
                        {{ $cliente->usuario->Nombre }} {{ $cliente->usuario->Apellido }}
                    </option>
                @endforeach
            </select>
            @error('ID_Cliente')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
    <label for="ID_Empleado">Empleado:</label>
    <select name="ID_Empleado" id="ID_Empleado" class="form-control @error('ID_Empleado') is-invalid @enderror" required>
        <option value="">Seleccione un empleado</option>
        @foreach($empleados as $empleado)
            <option value="{{ $empleado->ID_empleado }}" 
                    {{ (old('ID_Empleado', $venta->ID_Empleado) == $empleado->ID_empleado) ? 'selected' : '' }}>
                {{ $empleado->usuario->Nombre }} {{ $empleado->usuario->Apellido }}
                (ID: {{ $empleado->ID_empleado }})
            </option>
        @endforeach
    </select>
    @error('ID_Empleado')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

        <div class="form-group mb-3">
            <label for="ID_Producto">Producto:</label>
            <select name="ID_Producto" id="ID_Producto" class="form-control @error('ID_Producto') is-invalid @enderror" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->ID_Producto }}" {{ (old('ID_Producto', $detalleVenta->ID_Producto) == $producto->ID_Producto) ? 'selected' : '' }}>
                        {{ $producto->Nombre_Producto }} - Precio: {{ $producto->Precio_Unitario }}
                    </option>
                @endforeach
            </select>
            @error('ID_Producto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="Cantidad">Cantidad:</label>
            <input type="number" name="Cantidad" id="Cantidad" 
                   class="form-control @error('Cantidad') is-invalid @enderror" 
                   value="{{ old('Cantidad', $detalleVenta->Cantidad) }}" 
                   required min="1">
            @error('Cantidad')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<script>
document.getElementById('formEditarVenta').addEventListener('submit', function(e) {
    console.log('Formulario enviado');
    console.log('Datos:', {
        cliente: document.getElementById('ID_Cliente').value,
        empleado: document.getElementById('ID_Empleado').value,
        producto: document.getElementById('ID_Producto').value,
        cantidad: document.getElementById('Cantidad').value
    });
});
</script>
<!-- Agregar esto al final del formulario para debug 
<div class="d-none">
    Debug info:
    <pre>
    Venta ID: {{ $venta->ID_Venta }}
    Empleado actual ID: {{ $venta->ID_Empleado }}
    Old Empleado ID: {{ old('ID_Empleado') }}
    </pre>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formEditarVenta');
    form.addEventListener('submit', function(e) {
        console.log('Datos del formulario antes de enviar:', {
            empleado_id: document.getElementById('ID_Empleado').value,
            empleado_select: document.getElementById('ID_Empleado').options[document.getElementById('ID_Empleado').selectedIndex].text
        });
    });
});
</script> -->
@endsection