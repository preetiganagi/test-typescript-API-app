<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});


Route::post('/store',[UserController::class,'store']);
Route::get('/allusers',[UserController::class,'index']);

Route::post('/update-user/{id}',[UserController::class,'EditUserInfo']);
Route::post('/user/delete/{id}',[UserController::class,'deleteUser']);
Route::get('/get-user/{id}',[UserController::class,'getUser']);
// Route::post('/login',[UserController::class,'login']);

Route::get('/tutorials',[TutorialController::class,'index']);

use App\Http\Controllers\RecipeController;

Route::get('/recipes', [RecipeController::class, 'index']);
Route::post('/recipes', [RecipeController::class, 'store']);
Route::get('/recipes/{id}', [RecipeController::class, 'show']);
Route::put('/recipes/{id}', [RecipeController::class, 'update']);
Route::delete('/recipes/{id}', [RecipeController::class, 'destroy']);
Route::put('/recipes/{id}/rate', [RecipeController::class, 'rateRecipe']);
Route::get('/recipes/{id}/comments', [CommentController::class, 'index']);
Route::post('/recipes/{id}/comments', [CommentController::class, 'store']);
