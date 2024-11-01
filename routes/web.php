<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\Auth\ForgotPasswordController;
//-------------------------------------- RUTAS AUTENTICACION SESION --------------------------------------
Route::middleware(['web'])->group(function () {
    // Rutas de autenticación
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    //tempo
    Route::get('/crear-empleado-temporal', [AuthController::class, 'crearEmpleadoConHash']);



});

//-------------------------------------- RUTAS PROTEGIDAS AUTH, DASHBOARDS  --------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/cliente', function () {
        return view('home');
    })->name('dashboard.cliente');

    Route::get('/dashboard/empleado', function () {
        return view('dashboards.empleado');
    })->name('dashboard.empleado');
});


//-------------------------------------- RUTAS EMPLEADO --------------------------------------
Route::middleware(['auth', 'role:empleado'])->group(function () {
    /******************************** RUTAS RESERVAS ********************************/
    Route::get('/empleado/reservas', [ReservaController::class, 'index'])->name('empleado.reservas');
    Route::post('/empleado/reservas', [ReservaController::class, 'store'])->name('empleado.reservas.store');
    Route::put('/empleado/reservas/{id}', [ReservaController::class, 'update'])->name('empleado.reservas.update');
    Route::delete('/empleado/reservas/{id}', [ReservaController::class, 'destroy'])->name('empleado.reservas.destroy');
     /******************************** RUTAS VENTAS ********************************/
     Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
     Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
     Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
     
     Route::get('/ventas/{venta}/edit', [VentaController::class, 'edit'])->name('ventas.edit');
     Route::put('/ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update');
     
     Route::delete('/ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy');

});
Route::get('/reservas', [ReservaController::class, 'clienteIndex'])->name('cliente.reservas.index');
    
Route::middleware(['auth'])->group(function () {
    // Rutas principales de reservas
  
    // Ruta para crear nueva reserva
    Route::get('/reservas/crear', [ReservaController::class, 'create'])->name('cliente.reservas.create');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('cliente.reservas.store');
    
    // Ruta para verificar disponibilidad
    Route::get('/reservas/disponibilidad', [ReservaController::class, 'disponibilidad'])
        ->name('cliente.reservas.disponibilidad');
});

//-------------------------------------- RUTAS VERIFICACION 2 PASOS --------------------------------------
use App\Http\Controllers\Auth\TwoFactorController;

Route::middleware(['auth'])->group(function () {
    // Rutas de verificación en dos pasos
    Route::get('/two-factor', [TwoFactorController::class, 'show'])
        ->name('two-factor.show');
    
    Route::post('/two-factor/verify', [TwoFactorController::class, 'verify'])
        ->name('two-factor.verify');
    
    Route::post('/two-factor/resend', [TwoFactorController::class, 'resend'])
        ->name('two-factor.resend');
});

//-------------------------------------- RUTAS RECUPERAR CONTRASENA ASFD --------------------------------------
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])
    ->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
    ->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])
    ->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])
    ->name('password.update');

//-------------------------------------- RUTAS VENTAS --------------------------------------
// Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
// Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
// Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');

// Route::get('/ventas/{venta}/edit', [VentaController::class, 'edit'])->name('ventas.edit');
// Route::put('/ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update');

// Route::delete('/ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy');





//-------------------------------------- RUTAS INDEX - VISTA CLIENTE --------------------------------------
use App\Http\Controllers\HomeController;

// Ruta para la página principal
Route::get('/', [HomeController::class, 'index']);

// Ruta para la página de contacto
Route::get('/contacto', [HomeController::class, 'showContact']);

// Ruta para la página de servicios
Route::get('/servicios', [HomeController::class, 'showService']);

// Ruta para la página de servicios
Route::get('/piscina', [HomeController::class, 'showPool']);

// Ruta para la página de snacks
Route::get('/snack', [HomeController::class, 'showSnack']);

// Ruta para la página de souvenirs
Route::get('/souvenirs', [HomeController::class, 'showSouvenir']);






