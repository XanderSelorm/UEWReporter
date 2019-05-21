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

//Backend Admin Manage Pages
Route::prefix('manage')->middleware('role:superadministrator|administrator|editor|author|contributor')->group( function(){
    Route::get('/', 'ManageController@index');
    Route::get('/dashboard', 'DashboardController@index')->name('manage.dashboard');
    Route::resource('/posts', 'PostsController');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/users', 'UsersController');
    Route::resource('/permissions', 'PermissionsController', ['except' => 'destroy']);
    Route::resource('/roles', 'RolesController', ['except' => 'destroy']);
    Route::resource('/categories', 'CategoriesController');
});

//Frontend User Pages
Route::get('/home', 'PagesController@index');
Route::get('/', 'PagesController@index');
Route::get('/notifications', 'PagesController@notifications');
Route::get('/register', 'PagesController@registration');
Route::get('/login', 'PagesController@login');
Route::get('/profile/{id}', 'PagesController@showProfile')->name('profile');
Route::get('/profile/{id}/update', 'PagesController@updateProfile')->name('profile.update');
Route::resource('/posts', 'SinglePostController');

//Collections
Route::get('/posts/tags/{tag}', 'TagsController@index');
Route::get('/posts/categories/{id}', 'CollectionsController@categoryPosts');

//Create Permission Pages
Route::get('/partials/basicPermission', 'PagesController@basicPermission');
Route::get('/partials/crudPermission', 'PagesController@crudPermission');




Auth::routes();
