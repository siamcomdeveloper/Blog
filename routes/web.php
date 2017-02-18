<?php

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

//get = get data to display
//post = from form
//put path = data to update to database
//delete = data to delete to database

Route::get('/', function () {
    return view('welcome');
});

//Transfer data

Route::get('/about', function () {
    $data['name'] = 'Siam Ngan';
    return view('about',$data);
});

