<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IntranetController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\ChatGptController;

Route::middleware(['auth'])->group(function () {
    Route::get('/chat', [ChatGptController::class, 'index'])->name('chat.index');
    Route::post('/chat/ask', [ChatGptController::class, 'ask'])->name('chat.ask');
    Route::get('/intranet', [IntranetController::class, 'index'])->name('intranet.index');
});

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
