<?php

use App\Models\Events;
use App\Models\User;
use Illuminate\Http\Request;
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

Route::get('events', function () {
    return Events::all();
});

Route::get('event/{id}', function ($id) {
    return Events::where('id', $id)->first();
});

Route::get('users', function () {
    return User::all();
});

Route::get('user/{id}', function ($id) {
    return User::where('id', $id)->first();
});

Route::get('events/{category}', function ($category) {

    return Events::where('category', $category)->get();
});
