<?php

use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
use App\Mail\FirstEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'users' => UserController::class,
    'restaurants' => RestaurantController::class,
    'menu-items' => MenuItemController::class,
    'orders' => OrderController::class
]);

Route::get('/menu/{id}', [MenuItemController::class, 'get_restaurant_menu']);

Route::post('/restaurants-image/{rid}', [RestaurantController::class, 'upload_image']);

Route::patch('/confirm-order/{oid}', [OrderController::class, 'update']);

Route::get('/show-all-orders/{rid}', [OrderController::class, 'show_all_orders_for_restaurant']);

Route::get('/flush', [UserController::class, 'flush']);

Route::post('/img', function(Request $request) {

    $path = $request->file('photo')->store('photos');

    return $path;

});

Route::patch('/update-user-address', [UserController::class, 'update_address']);

Route::get('/send-first-email', function() {

    Mail::to('tom.osterlund1@gmail.com')->send(new FirstEmail);

        if(Mail::failures() != 0) {
            return "<p> Success! Your E-mail has been sent.</p>";
        }

        else {
            return "<p> Failed! Your E-mail has not sent.</p>";
        }

});
