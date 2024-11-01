<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');  // Vista para la página principal
    }

    public function showContact()
    {
        return view('contacto');  // Vista para la página de contacto
    }

    public function showService()
    {
        return view('servicios');  // Vista para la página de servicio
    }

    public function showPool()
    {
        return view('piscina');  // Vista para la página de piscina
    }

    public function showSnack()
    {
        return view('snack');  // Vista para la página de snack
    }

    public function showSouvenir()
    {
        return view('souvenirs');  // Vista para la página de souvenir
    }
}
