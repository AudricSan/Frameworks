<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/coucou', function () {
    return view('coucou', ['name' => 'Audric']);
});

Route::get('/myprofile', function () {

    $user = [
        [
            'name' => 'Audric',
            'age' => 23
        ],
    
        [
            'name' => 'coucou',
            'age' => 22
        ]
    ];

    return view('myprofile', ["users" => $user]);
});

Route::get('/profile', function () {

    $user = [
        'user1' =>[
            'name' => 'Audric',
            'age' => 23
        ],
    
        'user2' =>[
            'name' => 'coucou',
            'age' => 2
        ]
    ];

    return view('profile', ['users' => $user]);
});