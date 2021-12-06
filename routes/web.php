<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

App::setLocale('es'); // Aún así mejor cambiar el archivo config.app.php

Route::get('/', function () {

    $nombre = Auth::check() ? Auth::user()->name : 'Invitado';

    return view('welcome', compact('nombre'));
})->name('welcome');

Route::get('/redirect', function () {
    return redirect()->route('welcome');
});

Route::view('about', 'about')->name('about');

// Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
// Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');
// Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
// Route::get('projects/edit/{project}', [ProjectController::class, 'edit'])->name('projects.edit');
// Route::patch('projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
// Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
// Route::delete('projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

// La variable de la ruta debe decirse igual que la del controlador, en otro caso podemos utilizar la función parameters...
Route::resource('projects', ProjectController::class)->parameters(['project' => 'project']);

Route::view('contact', 'contact')->name('contact.index');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

// Para cambiar los verbos ??? en lugar de create -> create y edit -> editar
// Route::resource('projects', ProjectsController::class)->only([]);
// Route::apiResource('projects', ProjectsController::class)->only([]);

// Auth::routes(['register' => false]);
Auth::routes();

