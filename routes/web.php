<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;

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
    $nombre = null;

    return view('home', compact('nombre'));
})->name('home');

Route::get('/redirect', function () {
    return redirect()->route('home');
});

Route::view('about', 'about')->name('about');
Route::get('portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::view('contact', 'contact')->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');


// Para cambiar los verbos ??? en lugar de create -> create y edit -> editar
// Route::resource('portfolio', PortfolioController::class)->only([]);
// Route::apiResource('portfolio', PortfolioController::class)->only([]);


