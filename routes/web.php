<?php

use App\Http\Controllers\Mike;
use App\Livewire\Admin\UserProfile;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\PolicyTermController;

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

//Route::get('mike', Mike::class );
Route::get('mike', [App\Http\Controllers\Mike::class, 'index']);

//Ruta para listar Terminos y Politicas
Route::get('m_policyterm', [App\Http\Controllers\PolicyTermController::class, 'index']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'root']);
Route::get('/', function(){
        return view('webpage.index');
});
Route::middleware(['auth', 'verified'])->group(function () {
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
});

// Ruta donde el usuario hace clic para verificar su correo
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Marca el email como verificado
     $user = $request->user();
    $user->status_account = 'active'; // o true, o 1, como lo tengas
    $user->save();
    return redirect('/home'); // Redirige donde tú quieras
})->middleware(['auth', 'signed'])->name('verification.verify');

// Ruta para mostrar aviso de verificación pendiente
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Ruta para reenviar el correo
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Se ha reenviado el correo de verificación.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

