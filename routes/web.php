<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::resource('/',ReembolsoController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //USUÁRIO
    Route::get('/reembolsos', [\App\Http\Controllers\ReembolsoController::class, 'index'])
    ->name('reembolsos.index');

    Route::get('/reembolsos/create', [\App\Http\Controllers\ReembolsoController::class, 'create'])
        ->name('create');

    Route::post('/reembolsos', [\App\Http\Controllers\ReembolsoController::class, 'store'])
        ->name('create.store');

    Route::get('/reembolsos/{id}/edit', [\App\Http\Controllers\ReembolsoController::class, 'edit'])
        ->name('edit');

    Route::put('/reembolsos/{id}', [\App\Http\Controllers\ReembolsoController::class, 'update'])
        ->name('update');

    Route::delete('/reembolsos/{id}', [\App\Http\Controllers\ReembolsoController::class, 'destroy'])
        ->name('destroy');

    Route::get('/reembolsos/{id}', [\App\Http\Controllers\ReembolsoController::class, 'show'])
        ->name('visualizar.show');

    Route::get('/reembolsos/{id}/public/images/reembolsos/1638558465_cupom-fiscal_teste.jpg', [\App\Http\Controllers\ReembolsoController::class, 'show'])
        ->name('visualizar.show');
        

    //ADMINSITRADOR    
    Route::middleware(['can:admin'])->group(function () {
        Route::get('/reembolsos_adm', [\App\Http\Controllers\ReembolsoAdmController::class, 'index'])
            ->name('reembolsos_adm.index');
      });
});


require __DIR__.'/auth.php';
