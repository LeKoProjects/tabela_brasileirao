<?php

use App\Http\Controllers\TabelaController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TabelaController::class, 'tabela_brasileiro']);
Route::get('/{teamName}', [TabelaController::class, 'showTeam']);
Route::post('/selecionar-time', [TabelaController::class, 'selecionarTime']);
