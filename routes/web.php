<?php

use Illuminate\Support\Facades\Route;
use App\Entry;


Route::get('/', function () {
    $entries = Entry::with('user')->orderBy('created_at','DESC')->paginate(2);
    return view('welcome', compact('entries'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('entries','EntryController');