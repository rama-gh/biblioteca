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

Route::get('/', function () {
    return view('menu');
});

Route::get('usuarios', function () {
    return view ('usuarios');
});

Route::get('footer', function () {
    return view('footer');
});

Route::get('header', function () {
    return view('header');
});

Route::get('login', function () {
    return view('login');
});

Route::get('menu', function () {
    return view('menu');
});

//Rutas Libro

//Route::post('insert', 'LibroController@create')->name('libro.crear');   

Route::resource('libros','LibroController');




//Rutas autor
Route::resource('autores','AutorController');

//Rutas usuarios
Route::resource('usuarios','UsuarioController');//con este comando creo todas las rutas necesarias para accdeer al controlador de usuarios

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
