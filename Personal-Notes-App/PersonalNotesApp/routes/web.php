<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if(session("user_name")){
        return redirect("/home");
    }
    return view('welcome');
});
Route::get('/home',"App\Http\Controllers\NoteController@displayNote")->name('home');

Route::get('/auth', "App\Http\Controllers\UserController@auth");
Route::get('/register-page', function () {
    return view("register");
});

Route::get('/add-note', function () {
    return view("addNote");
});

Route::get('/register', "App\Http\Controllers\UserController@register");
Route::get('logout', "App\Http\Controllers\UserController@logout");

Route::post('/addnote', "App\Http\Controllers\NoteController@addNote");
Route::post('/update/{id}', "App\Http\Controllers\NoteController@updateNote");
Route::get('/editnote/{id}', "App\Http\Controllers\NoteController@editNote");
Route::get('/search', "App\Http\Controllers\NoteController@searchNote");
Route::get('/deletenote/{id}', "App\Http\Controllers\NoteController@deleteNote");
Route::get('/filtered/{name}', "App\Http\Controllers\NoteController@searchNoteByTag");

