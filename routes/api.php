<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\TaskController;

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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::prefix('tasks')->group(function() {
    Route::post('/store', [TaskController::class, 'store'])->name('tasks.store');

    Route::post('/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');

    Route::delete('/destroy/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    Route::get('/{id}', [TaskController::class, 'index'])->name('tasks.index');
});
