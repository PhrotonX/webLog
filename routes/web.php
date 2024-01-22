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

use App\Models\User;

Route::get('/', [HomeController::class, 'index']);

Route::get('/pages/{type?}/{title?}', [PageController::class,  'loadPage'])->name('pages.navigate');

Route::name('submit')->middleware('check.age')->group(function(){
    Route::get('submit/create/{age?}', function(){
        //create.blade.php form submission function here...
        echo "/submit/create";
    })->name('create');
});

/*Route::get('/user/blogs/{blogTitle?}')*/
 
/* RESOURCES */
Route::resource('user', 'App\Http\Controllers\UserController');
Route::resource('post', 'App\Http\Controllers\PostController', ['parameters' => ['user' => 'admin', 'user' => 'member']]);
Route::resource('article', 'App\Http\Controllers\ArticleController', ['only'=>['create', 'destroy', 'update', 'edit', 'store']]);

//@NOTE: Sample only! remove later.
//===================================================================================
//Route::get('user/create/{age}', 'App\Http\Controllers\UserController@create');

/* Single Invocation: */ //Route::get('/pages/{type}', 'PageController');

Route::get('/root/insert', function(){
    DB::insert('INSERT INTO accounts(username, email, password_hash, age)
    VALUES(?,?,?,?)', ['Admin', 'admin@root.com', 'password', 18]);
});

Route::get('root/delete/{id}', function($id){
    $deleted = DB::delete("DELETE FROM ACCOUNTS WHERE ID=?", [$id]);
    return $deleted;
});

Route::get('root/read', function(){
    /*$user = User::where('id', 2)->value('username');
        echo $user;*/

    $users = User::all();
    foreach($users as $user){
        echo $user->id . "\t-\t" . $user->username . "<br>";
    }
});

Route::get('root/save', function(){
    $user = new User;
    $user->username = "Sample";
    $user->email = "sample@email.com";
    $user->password_hash = "sample";
    $user->age = 17;
    $user->save();
});

Route::get('test/{age?}', [PageController::class, 'loadTest'])->middleware('check.age');

Route::resource('root', 'App\Http\Controllers\RootController');
//====================================================================================

require __DIR__.'/auth.php';
