<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CycleController;
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

Route::get('/a', function () {
    return view('welcome');
});

Route::get('/', [CycleController::class, 'index'])->name('home');
Route::get('/cycle/{id}', [CycleController::class, 'show']);

Route::post('/chekout', [CartController::class, 'checkout'])->name('chekout');
Route::resource('cart',CartController::class);

// ->only([
//     'index', 'store','destroy'
// ]);

Route::post('/logout', [CycleController::class,  'logout'])
                ->middleware('auth')
                ->name('logout');

require __DIR__.'/auth.php';
