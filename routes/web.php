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

Route::get('user/login', 'App\Http\Controllers\LoginController@show')->name('user.login');
Route::post('user/login/config', 'App\Http\Controllers\LoginController@login')->name('user.login_config');
 
/* RESOURCES */
Route::resource('user', 'App\Http\Controllers\UserController');
Route::resource('post', 'App\Http\Controllers\PostController', ['parameters' => ['user' => 'admin', 'user' => 'member']]);
Route::resource('article', 'App\Http\Controllers\ArticleController', ['only'=>['create', 'destroy', 'update', 'edit', 'store']]);



Route::post('user/store', 'App\Http\Controllers\UserController@store');

/* REDIRECTS */
//Route::get('signup', 'App\Http\Controllers\UserController@create');





//@NOTE: Sample only! remove later.
//===================================================================================
//Route::get('user/create/{age}', 'App\Http\Controllers\UserController@create');

/* Single Invocation: */ //Route::get('/pages/{type}', 'PageController');

Route::get('/root/insert/admin', function(){
    DB::insert('INSERT INTO accounts(username, email, password_hash, age, type, handle, privacy)
    VALUES(?,?,?,?,?,?,?)', ['Admin', 'admin@root.com', 'password', 18, 'admin', 'admin', 'private']);
    DB::insert('INSERT INTO accounts(username, email, password_hash, age, type, handle, privacy)
    VALUES(?,?,?,?,?,?,?)', ['Owner', 'owner@root.com', 'password', 18, 'owner', 'owner', 'private']);
});

Route::get('/root/insert', function(){
    User::create([
        "username"=>"Sample 7",
        "email"=>"sample7@sample.com",
        "handle"=>"sample7",
        "password_hash"=>"65g454bsd6fhnf4n65fg4n",
        "firstname"=>"Sample 7",
        "type"=>"admin",
        "age"=>67,
        "privacy"=>"public",
    ]);
});

Route::get('root/delete/{id}', function($id){
    $user = User::find($id);
    $user->delete();
});

Route::get('root/destroy/{id}', function($id){
    User::destroy($id);
});

Route::get('root/read', function(){
    /*$user = User::where('id', 2)->value('username');
        echo $user;*/

    $users = User::all();
    foreach($users as $user){
        echo $user->id . "\t-\t" . $user->username . "<br>";
    }
});

Route::get('root/restore/{id}', function($id){
    User::withTrashed()->where('id', $id)->restore();
});

Route::get('root/trash/{id}', function($id){
    $user = User::withTrashed()->where('id', $id)->get();
    return $user;
});

Route::get('root/forcedelete/{id}', function($id){
    User::onlyTrashed()->forceDelete('id', $id);
});

Route::get('root/save', function(){
    $user = new User;
    $user->username = "Sample";
    $user->email = "sample@email.com";
    $user->password_hash = "sample";
    $user->age = 17;
    $user->handle = "sample";
    $user->save();
});

Route::get('root/update', function(){
    User::where("id", 7)->update([
        "username" => "PogiAko",
        "firstname" => "MrPogi",
    ]);
});

Route::get('root/user/{id}', function($id){
    return User::find($id)->post;
});

Route::get('root/post/{id}/user', function($id){
    return Post::find($id)->user->username;
});

Route::get('test/{age?}', [PageController::class, 'loadTest'])->middleware('check.age');

Route::resource('root', 'App\Http\Controllers\RootController');

//====================================================================================

require __DIR__.'/auth.php';
