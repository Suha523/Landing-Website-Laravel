<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\UserController;
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

    Route::get('/getPortfolios',[PortfolioController::class,'getData'])->name('portfolios.get');
    Route::get('/get_edit_portfolio',[PortfolioController::class,'get_edit'])->name('portfolios.get_edit');
    Route::post('/updatePortfolio',[PortfolioController::class,'update'])->name('portfolios.myUpdate');
    Route::post('/deletePortfolio',[PortfolioController::class,'destroy'])->name('portfolios.delete');
    Route::get('/exportPortfolio',[PortfolioController::class,'export'])->name('portfolios.export');
    Route::get('/PDFPortfolio',[PortfolioController::class,'generate_pdf'])->name('portfolios.pdf');
    Route::get('getUsers',[UserController::class,'getData'])->name('users.get');
    Route::get('/get_edit_user',[UserController::class,'get_edit'])->name('users.get_edit');
    Route::post('/updateUser',[UserController::class,'update'])->name('users.myUpdate');
    Route::post('/deleteUser',[UserController::class,'destroy'])->name('users.delete');
    Route::get('/exportUser',[UserController::class,'export'])->name('users.export');
    route::get('/PDFUsers',[UserController::class,'generate_pdf'])->name("users.pdf");
    Route::resource('portfolios',PortfolioController::class);
    Route::resource('users',UserController::class);
    });


// Route::get('/', function () {
//     return view('layouts.backend.index');
// });



require __DIR__.'/auth.php';
