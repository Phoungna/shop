<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
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

Route::group(['prefix' => 'admin', 'middleware' =>['admin:admin']], function(){
    Route::get('/login',[Admincontroller::class,'loginForm']);
    Route::post('/login', [Admincontroller::class, 'store'])->name('/admin.login');
});
Route::middleware(['auth:sanctum,admin','verified'])->get('/admin/dashboard',function(){
    return view('dashboard');

})->name('dashboard');

Route::middleware(['auth:sanctum,web','verified'])->get('/dashboard',function(){
    return view('dashboard');

})->name('dashboard');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
