<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
//use Mcamara\LaravelLocalization\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['auth', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::get('/dashboard', function () {
            return view('layouts.backend.index');
        })->name('dashboard');

    Route::resource('portfolios',PortfolioController::class);
    });


// Route::get('/', function () {
//     return view('layouts.backend.index');
// });



require __DIR__.'/auth.php';
