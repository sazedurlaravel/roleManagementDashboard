<?php

use App\Models\User;
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

Route::get('/', function () {
    return view('backend.layouts.dashboard');
});

// Route::get('/test',function(){
//     $data['users'] = User::orderBy('id','DESC')->get();
//     return view('backend.users.index',$data);
// return view('backend.users.index');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Role Management route
Route::resource('roles', App\Http\controllers\RoleController::class);
Route::resource('users', App\Http\controllers\UserController::class);
