<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Obter paciente
Route::get('/get-patient', [ApiController::class, 'getPatient'])->name('getPatient');


// Obter profissional
Route::get('/get-profissional', [ApiController::class, 'getProfissional'])->name('getProfissional');

//manipular acessos
Route::post('/auth-access', [ApiController::class, 'autorizarAcesso'])->name('autorizarAcesso');
Route::post('/remove-access', [ApiController::class, 'removerAcesso'])->name('removerAcesso');


Route::get('/teste',function(){
    return 'teste';
});
