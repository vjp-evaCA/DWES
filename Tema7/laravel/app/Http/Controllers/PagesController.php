<?php
// PagesController.php

namespace App\Http\Controllers;

use App\Models\Nota;

class PagesController extends Controller
{
    public function inicio()
    {
        return view('welcome');
    }

    public function datos()
    {
        return view('usuarios', ['id' => 56]);
    }

    public function cliente($id = 1)
    {
        return ('Cliente con el id: ' . $id);
    }

    public function nosotros($nombre = null)
    {
        $equipo = [
            'Paco',
            'Enrique',
            'Maria',
            'Veronica'
        ];

        return view('nosotros', @compact('equipo', 'nombre'));
    }


    public function notas()
    {
        $notas = Nota::all();

        return view('notas', compact('notas'));
    }
}
