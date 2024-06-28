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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\User\ValidateEdit;

use App\Models\Post;
use App\Models\User;

Route::get('/', [HomeController::class, 'index']);

//Route::get('/pages/{type?}/{title?}', [PageController::class,  'loadPage'])->name('pages.navigate');

Route::name('submit')->/*middleware('check.age')->*/group(function(){
    Route::get('submit/create/{age?}', function(){
        //create.blade.php form submission function here...
        echo "/submit/create";
    })->name('create');
});

/*Route::get('/user/blogs/{blogTitle?}')*/


 
/* RESOURCES */
//Route::resource('user', 'App\Http\Controllers\UserController');
Route::resource('post', 'App\Http\Controllers\PostController', ['parameters' => ['user' => 'admin', 'user' => 'member']]);
Route::resource('article', 'App\Http\Controllers\ArticleController', ['only'=>['create', 'destroy', 'update', 'edit', 'store']]);

Route::get('user/login', 'App\Http\Controllers\UserController@showLogin')->name('user.login');
Route::post('user/login/config', 'App\Http\Controllers\UserController@login')->name('user.login_config');
Route::get('user/create', 'App\Http\Controllers\UserController@create')->name('user.create');
Route::post('user/submit', 'App\Http\Controllers\UserController@store')->name('user.submit');
Route::get('user/index', 'App\Http\Controllers\UserController@index')->name('user.index');
Route::get('user/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
Route::post('user/update', 'App\Http\Controllers\UserController@update')->name('user.update')->middleware(ValidateEdit::class);


/* REDIRECTS */
//Route::get('signup', 'App\Http\Controllers\UserController@create');





require __DIR__.'/auth.php';
