<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\TranslationEditorController;

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
    return ['Laravel' => app()->version()];
});
//v1
//Route::get('/translations/{locale}/{file}', [TranslationController::class, 'edit']);
//Route::post('/translations/{locale}/{file}', [TranslationController::class, 'update']);
//Route::get('/translations', [TranslationController::class, 'index']);

//v2

Route::get('/translations', [TranslationEditorController::class, 'index']);
Route::get('/translations/{locale}/{file}', [TranslationEditorController::class, 'edit']);
Route::post('/translations/{locale}/{file}', [TranslationEditorController::class, 'update']);


require __DIR__.'/auth.php';
