<?php

use Illuminate\Http\Request;
use App\User;

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
// Route::post('login', [
//     // 'as' => '',
//     'uses' => 'Auth\LoginController@login'
//     ]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.home');
Route::get('/plans/{id}', 'AdminController@editPlans')->name('admin.edit.plans');
Route::post('/plans', 'AdminController@storePlans')->name('admin.store.plans');
Route::get('storage/{filename}', function ($filename)
{
    return Image::make(storage_path('app/public/' . $filename))->response();
})->name('images.path');
// Route::get('/admin', ['middleware' => ['auth', 'administrator'],'uses'=>'Controller@adminFunction']);

// Route::resource('user.plans', 'UserController');
Route::get('/userPlansCreate/{id}', 'UserController@createPlans')->name('user.create.plans');
Route::get('/userPlansCreate', 'HomeController@index');

Route::post('/userDeposit/{usersPlanningsId}', 'userController@userDepositCreate', function (Request $request, $usersPlanningsId) {
    //
})->name('user.deposit');

Route::get('/userDeposit/{usersPlanningsId}', 'HomeController@index');

