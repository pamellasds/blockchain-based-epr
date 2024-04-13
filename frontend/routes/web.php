<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InternalRegisterController;

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

//rotas de cadastro
Route::get('/register-ps', [RegisterController::class, 'registerPS'])->name('register-ps');
Route::get('/register-is', [RegisterController::class, 'registerIs'])->name('register-is');
Route::get('/register-lm', [RegisterController::class, 'registerLm'])->name('register-lm');

//rota de envio de cadastros
Route::post('/send-register', [RegisterController::class, 'sendRegister'])->name('send-register');
Route::post('/send-register-ps', [RegisterController::class, 'sendRegisterPs'])->name('send-register-ps');
Route::post('/send-register-is', [RegisterController::class, 'sendRegisterIs'])->name('send-register-is');
Route::post('/send-register-lm', [RegisterController::class, 'sendRegisterLm'])->name('send-register-lm');



Route::get('/home', 'HomeController@index')->name('home');

//Feedback
Route::get('feedback', [UserController::class, 'feedback'])->name('feedback');
Route::post('register-feedback', [UserController::class, 'registerFeedback'])->name('register-feedback');

// Gerenciamento de Registros
Route::get('register-anamnese', [InternalRegisterController::class, 'registerAnamnese'])->name('register-anamnese');
Route::post('send-register-anamnese', [InternalRegisterController::class, 'sendRegisterAnamnese'])->name('send-register-anamnese');

Route::get('register-observation', [InternalRegisterController::class, 'registerObservation'])->name('register-observation');
Route::post('send-register-observation', [InternalRegisterController::class, 'sendRegisterObservation'])->name('send-register-observation');


Route::get('register-medication', [InternalRegisterController::class, 'registerMedication'])->name('register-medication');
Route::post('send-register-medication', [InternalRegisterController::class, 'sendRegisterMedication'])->name('send-register-medication');


Route::get('register-diagnostic', [InternalRegisterController::class, 'registerDiagnostic'])->name('register-diagnostic');
Route::post('send-register-diagnostic', [InternalRegisterController::class, 'sendRegisterDiagnostic'])->name('send-register-diagnostic');

//Lista de Registros de um Paciente
Route::get('registers-patients', [InternalRegisterController::class, 'registersPatients'])->name('registers-patients');
Route::get('registers-patient-especific', [InternalRegisterController::class, 'registersPatientEspecific'])->name('registers-patient-especific');
Route::get('register-diagnostic', [InternalRegisterController::class, 'registerDiagnostic'])->name('register-diagnostic');


//Lista de Registros de um PS
Route::get('registers', [InternalRegisterController::class, 'registers'])->name('registers');

//Lista de Pacientes
Route::get('patients', [InternalRegisterController::class, 'patients'])->name('patients');


//OLD 

// Gerenciamento de Usuario
Route::get('search', [UserController::class, 'search'])->name('search');
Route::get('user', [UserController::class, 'user'])->name('user');
Route::post('edit-user', [UserController::class, 'editUser'])->name('edit-user');
Route::post('get-search', [UserController::class, 'getSearch'])->name('get-search');
Route::post('get-search-all', [UserController::class, 'getSearchAll'])->name('get-search-all');
Route::get('no-access', [UserController::class, 'noAccess'])->name('no-access');
Route::get('perfil', [UserController::class, 'perfil'])->name('perfil');
Route::post('edit-perfil', [UserController::class, 'editPerfil'])->name('edit-perfil');

Route::post('get-rcm-data', [UserController::class, 'getRcmData'])->name('get-rcm-data');
Route::post('get-rcm-spec-data', [UserController::class, 'getRcmSpecData'])->name('get-rcm-data');
Route::post('get-se-data', [UserController::class, 'getSeData'])->name('get-se-data');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
