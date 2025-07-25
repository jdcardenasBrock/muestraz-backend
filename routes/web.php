<?php

use App\Livewire\Admin\UserProfile;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Auth\PolicyTermController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'root']);
Route::get('/', function(){
        return view('webpage.index');
});

Route::resource('policy_term',PolicyTermController::class);
