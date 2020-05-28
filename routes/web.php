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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('questions', 'QuestionsController');
    
    Route::resource('faculty', 'FacultiesController');

    Route::resource('department', 'DepartmentsController');
    
    Route::get('/questions/faculty/{faculty}', 'QuestionsController@faculty')->name('facultyQuestion');
    
    Route::get('/questions/dept/{department}', 'QuestionsController@department')->name('departmentQuestion');
});
