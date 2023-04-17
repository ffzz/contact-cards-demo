<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// -  POST /contacts  保存新创建的联系人卡片
Route::post('/contacts', [ContactController::class, 'store']);

// -  PUT /contacts/{id}  更新指定ID的联系人卡片
Route::put('/contacts/{id}', [ContactController::class, 'update']);

// -  DELETE /contacts/{id}  删除指定ID的联系人卡片
Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);
