<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', 'HomeController@index');
Route::get('/browse-categories', 'HomeController@allCategories');
Route::post('/browse-artisans', 'HomeController@search')->name('home-search');

Auth::routes();

Route::get('/dashboard', 'ProfileController@index')->name('dashboard');
Route::get('/dashboard/profile', 'ProfileController@profile')->name('profile');
Route::post('/dashboard/profile', 'ProfileController@updateProfile')->name('update_profile');
Route::get('/dashboard/manage_skills', 'SkillsController@index')->name('manage_skills');
Route::post('/dashboard/manage_skills', 'SkillsController@edit')->name('edit_skill');
Route::get('/dashboard/add_skills', 'SkillsController@add')->name('add_skills');
Route::post('/dashboard/add_skills', 'SkillsController@create')->name('create_skill');

Route::get('/browse-artisans', 'SearchController@browseArtisans');
Route::get('/view-artisan', 'SearchController@viewArtisan');

Route::post('/save_job', 'JobsController@saveJob');
Route::post('/close_task', 'JobsController@closeTask');
Route::get('/dashboard/manage_tasks', 'JobsController@index');
Route::get('/dashboard/completed_tasks', 'JobsController@completedTasks');

