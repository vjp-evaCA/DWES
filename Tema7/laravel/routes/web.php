<?php
// web.php (v2.0) ▒▒▒▒ Refactorizado

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ PagesController::class, 'inicio' ]);
Route::get('datos', [ PagesController::class, 'datos' ]);
Route::get('cliente/{id?}', [ PagesController::class, 'cliente' ]) -> where('id', '[0-9]+');
Route::get('nosotros/{nosotros?}', [ PagesController::class, 'nosotros']) -> name('nosotros');
Route::get('notas', [ PagesController::class, 'notas' ]);