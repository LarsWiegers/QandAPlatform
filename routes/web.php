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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/questions', 'QuestionsController@index')->name("questions_home");
Route::get('/question/{id}/{title}', 'QuestionsController@specific')->name("question_specific");
Route::get('/question/{id}', 'QuestionsController@specific')->name("question_specific");

Route::get('/add-a-question', 'QuestionsController@add_a_question')->name("add-a-question");
Route::post('/add-a-question', 'QuestionsController@Add')->name("add-a-question");
Route::post('/add-a-answer', 'QuestionsController@AddAnswer')->name("add-a-answer");