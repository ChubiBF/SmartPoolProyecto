<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::middleware(['web'])->group(function () {
    // Rutas de autenticación
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //tempo
    Route::get('/crear-empleado-temporal', [AuthController::class, 'crearEmpleadoConHash']);


    // Rutas protegidas
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard/cliente', function () {
            return view('dashboards.cliente');
        })->name('dashboard.cliente');

        Route::get('/dashboard/empleado', function () {
            return view('dashboards.empleado');
        })->name('dashboard.empleado');
    });

    // Ruta raíz
    Route::get('/', function () {
        return view('welcome');
    });
});