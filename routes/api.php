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
    $event = Events::with('created_by')->find($id);;
    return $event;
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

Route::post('event/create', function (Request $request) {
    $input = $request->input();
    $validated = $request->validate([
        'title' => 'string',
        'category' => 'string',
        'date' => 'date',
        "created_by" => 'numeric'
    ]);

    $event = new Events();
    $event->title = $validated['title'];
    $event->category = $validated['category'];
    $event->date = $validated['date'];
    $event->created_by = $validated['created_by'];
    return $event->save();
});


Route::get("user/{id}/events", function ($id) {
    $events = Events::where("created_by", $id)->get();
    return $events;
});
