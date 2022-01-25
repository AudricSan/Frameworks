<?php

use Illuminate\Support\Facades\Route;
//notiffier le routeur qu'il nous faut le controlleur
use App\Http\Controllers\CarController;
use App\Http\Controllers\SellerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vue', function () {
    return view('vue1');
});

Route::get('/myprofile', function () {
    return view('vue2', ['nom'=>'RACQUEZ', 'prenom'=>'Ronald', 'age'=>20]);
});

Route::get('/profiles', function () {
    $user = [
        ['nom'=>'RACQUEZ', 'prenom' => 'Ronald', 'Age' => 20],
        ['nom'=>'TRUC', 'prenom'=>'Mush', 'age'=>22],
        ['nom'=>'BAZARD', 'prenom'=>'Brol', 'age'=>22]
    ];

    return view('vue3', ['users' => $user]);
});

Route::get('/cars',[CarController::class, 'index']);
//Va appeler carController->index

Route::get('/sellers',[SellerController::class, 'index']);

Route::get('/cars/form',function () {
    return view('cars.formulaire');
});

Route::post('/cars/insert',[CarController::class, 'insert']);

Route::get('/sellers/form',function () {
    return view('sellers.formSeller');
});

Route::post('/sellers/insert',[SellerController::class, 'insert']);