<?php

use App\Livewire\Admin\UserProfile;
use App\Models\Quiz;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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


Route::get('/admin/quizzes/{quiz}/questions', function (Quiz $quiz) {
    return view('m_quiz_questions', compact('quiz'));
})->name('admin.quiz.questions');

Route::get('/admin/quizzes', function () {
    return view('m_quiz');
})->name('admin.quiz.manager');
