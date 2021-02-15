<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'inicioController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

# Category Routes for web.php
Route::resource('categories', 'CategoryController');

# Subcategory Routes for web.php
Route::resource('subcategories', 'SubcategoryController');

# ruta vista menus
Route::get('/menu.index', 'inicioController@menu')->name('menu');
Route::get('/TuMenu', 'inicioController@show')->name('menu.show');

// ruta primer paso 
Route::get('/step', 'inicioController@step')->name('pasos');
