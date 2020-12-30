<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
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

Route::post('/restaurant-login', [RestaurantController::class, 'login_restaurant']);

Route::post('/login-user', [UserController::class, 'login_user']);

Route::get('/verify-user', function() {

    $verifiedUser = session('sessionUser');

    return $verifiedUser;

});