<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
        return view('usuarios', [
            'texto' => 'HAHAHAH',
            'checagem' => false,
            'usuarios' => ['usuario1', 'usuario2', 'usuario3']
        ]);
    }
}
