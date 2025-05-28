<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntranetController;

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

// 1) (Optionnel) Commenter ou supprimer la route par défaut Laravel
// Route::get('/', function () {
//     return view('welcome');
// });

// 2) Rediriger la racine vers le formulaire de login fourni par Breeze
Route::get('/', function () {
    return redirect()->route('login');
});

use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    // … autres routes

    Route::get('/profile', [ProfileController::class, 'edit'])
         ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
         ->name('profile.update');
});

// 3) Routes d’authentification (Login, Register, Password Reset…)
require __DIR__ . '/auth.php';

// 4) Routes internes protégées par le middleware "auth"
Route::middleware(['auth'])->group(function () {
    // Dashboard (par défaut)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Page principale de l’intranet
    Route::get('/intranet', [IntranetController::class, 'index'])
         ->name('intranet');

    // → Vous pouvez ajouter ici d’autres routes internes, par exemple :
    // Route::resource('posts', PostController::class);
    // Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');
});
