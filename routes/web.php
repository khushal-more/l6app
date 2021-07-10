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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/home', function(){
   return 'hello world';
});


/* Required route with dynamic parameter
  Route::get('/welcome/{name}', function($user){
    return 'Welcome '.$user;
});*/

/* Optional route with dynamic parameter
Route::get('/welcome/{name?}', function($user='User'){
    return 'Welcome '.$user;
}); */

//Route::redirect('/', 'home');
//Route::permanentRedirect('/', 'home');

Route::view('/', 'welcome', ['name'=>'Khushal More', 'company'=>'Namo']);

Route::get('welcome', 'WelcomeController@welcome');
Route::resource('posts','PostController');
