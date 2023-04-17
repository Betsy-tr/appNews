<?php

use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/secure', function () {
    return view('secure');
})->middleware(['auth']); //Securiser la route via le middleware 'auth'

Route::get('/notsecure', function () {
    return view('notsecure');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Route sécurisée pour la gestion des News */
Route::middleware(['auth'])->group(function () {
    //Route pour ajouter une news
    Route::get('/admin/news/add',[AdminNewsController::class,'formAdd'])->name('news.add');
    Route::post('/admin/news/add',[AdminNewsController::class,'add'])->name('news.add');

    //Route pour editer une news
    Route::get('/admin/news/edit/{id}',[AdminNewsController::class,'formEdit'])->name('news.edit'); 
    Route::post('/admin/news/edit/{id}',[AdminNewsController::class,'edit'])->name('news.edit');

    //Route pour lister les news
    Route::get('/admin/news/liste',[AdminNewsController::class,'index'])->name('news.liste');

    //Route pour supprimer une news
    Route::get('/admin/news/delete/{id}',[AdminNewsController::class, 'delete'])->name('news.delete') ;
});

// Route::get('/accueil',[AdminNewsController::class,'index'])->name('accueil');

require __DIR__.'/auth.php';
