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
    return view('home');
});

// Routing #2
Route::get('/hero', 'HeroController@show');

// Creating Pages
Route::get('/hero/index', 'HeroController@index');

Route::post('/hero/show', 'HeroController@show');

// Forms
Route::get('/hero/{$id}', 'HeroController@create');
Route::post('/hero/{$id}', 'HeroController@store');
Route::get('/hero/{$id}/display', 'heroController@display')



Route::get('/home', 'HomeController@index')->name('home');

// list of questions
Route::get('/questions', 'QuestionController@index');

// create a question
Route::get('/questions/create', 'QuestionController@create');

// edit a question
Route::get('/questions/edit/{id}', 'QuestionController@edit');

// store a question (submit the form)
Route::post('/questions/{id?}', 'QuestionController@store');

// detail of one question
Route::get('/questions/{id}', 'QuestionController@show')->name('show question'); // ->where('id', '\d+')

// list of categories
Route::get('/categories', 'CategoryController@index');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');