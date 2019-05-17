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
/*
Route::get('/', function (){
    return view('welcome');
});

Route::get('/users/{id}/{name}', function ($id, $name){
    return view('welcome');
});
*/

Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author|contributor')->group( function(){
    Route::get('/', 'ManageController@index');
    Route::get('/dashboard', 'DashboardController@index')->name('manage.dashboard');
    Route::resource('/posts', 'PostsController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/users', 'UsersController');
    Route::resource('/permissions', 'PermissionsController', ['except' => 'destroy']);
    Route::resource('/roles', 'RolesController', ['except' => 'destroy']);
});

Route::get('/', 'PagesController@index');
Route::get('/notifications', 'PagesController@notifications');
Route::get('/register', 'PagesController@registration');
Route::get('/login', 'PagesController@login');
Route::get('/profile', 'PagesController@profile');
//Route::get('/content', 'PagesController@myContent');

Route::resource('/posts', 'PostsController');
//Route::get('/posts/index', 'PostsController@index')->name('posts.index');
//Route::get('/posts/{$post->id}', 'PostsController@show');

Route::get('/posts/tags/{tag}', 'TagsController@index');


Route::get('/partials/basicPermission', 'PagesController@basicPermission');
Route::get('/partials/crudPermission', 'PagesController@crudPermission');




Auth::routes();

//Route::get('/dashboard', 'DashboardController@index');
