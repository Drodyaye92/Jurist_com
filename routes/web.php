<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware;
Use App\Http\Middleware\AuthUsers;
Use App\Http\Middleware\AuthAmins;
use Illuminate\Contracts\Auth\UserProvider;
Use App\Exceptions\Handler;
Use App\Admin;
Use App\User;
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
})->name('welcome');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');//vue apres  authentification
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');//page d formulaire
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');//page de connection
   // Route::get('/', 'AdminController@index')->name('admin.dashboared');
    Route::get('/', 'AdminController@index');
   //dash avec user
    Route::get('/', 'Auth\AdminLoginController@dashe')->name('dash');
    Route::get('/', 'Auth\AdminLoginController@dash')->name('dash');
    Route::get('/admin', 'Auth\AdminLoginController@admin')->name('admin');
    Route::get('/dashbard', 'AdminController@dasb')->name('dasb');
});


 Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
//pour inscription
 Route::post('/register','InscriptionController@inscription');


Route::get('/chatter', 'ChatController@index')
                            ->name('chatter')
                            ->middleware('auth');

Route::post('/send', 'MessageController@send')
                            ->name('send')
                            ->middleware('auth');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('/profile', 'UserController@update_avatar')->middleware('auth');
Route::resource('chatadmin', 'AdminchatController');
