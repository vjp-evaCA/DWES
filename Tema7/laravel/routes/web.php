<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/users', function () {
    return view('usuarios');
}) -> name('usuarios');

Route::view('datos','usuarios');

Route::get('cliente/{id}', function($id) {
    return ('Cliente con el id: ' . $id);
});

Route::get('cliente', function() {
    return ('Cliente con el id: Ninguno');
});

Route::view('blog', 'blog') -> name('noticias');
Route::view('fotos', 'fotos') -> name('galeria');