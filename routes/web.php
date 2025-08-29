<?php

use App\Http\Controllers\Mike;
use App\Livewire\Admin\UserProfile;
use App\Models\Quiz;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\PolicyTermController;
use App\Livewire\Admin\ProductDetailManager;
use App\Models\Product;

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

//Ruta para listar Terminos y Politicas
Route::get('m_policyterm', [App\Http\Controllers\PolicyTermController::class, 'index']);

//Ruta para cargar Terminos y Politicas
Route::post('m_policyterm', [App\Http\Controllers\PolicyTermController::class, 'store'])->name('policy.store');

//Ruta para actualizar Terminos y Politicas
Route::put('m_policyterm/{policy}', [App\Http\Controllers\PolicyTermController::class, 'update'])->name('policy.update');

//Ruta para Terminos y Politicas
Route::get('policyterm_u', [App\Http\Controllers\PolicyTermController::class, 'store']);

//Ruta para Como Funciona
Route::get('howwork', function(){return view('webpage.howwork');} );

//Ruta para Home Usuario
Route::get('index_u', function(){return view('webpage.index_u'); } );


Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'root']);
Route::get('/', function(){
        return view('webpage.index_u');
});
Route::middleware(['auth', 'verified'])->group(function () {

Route::get('account_u', [App\Http\Controllers\HomeController::class, 'account_u'])->name('account_u');
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


Route::get('/admin/productdetail/create', function () {
    return view('m_productdetail');
})->name('admin.productdetail.create');

// Editar producto
Route::get('/admin/productdetail/{product}/edit', function (App\Models\Product $product) {
    return view('m_productdetail', compact('product'));
})->name('admin.productdetail.edit');
