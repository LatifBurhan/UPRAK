<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\DashboardController;

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

Route::get('/',[DashboardController::class, 'index']);

Route::post('/admin',[DashboardController::class, 'login'])->name('login');


route::middleware(['guest'])->group(function() {
    Route::get('/login', []);
});

route::middleware(['auth'])->group(function() {
    route::post('/post/komentar', [KomentarController::class, 'post'])->name('post.komentar');

    route::get('komentar/{id}', [KomentarController::class, 'index'])->name('komentar');
});
