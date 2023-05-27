<?php

use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Route::get("/comment", [CommentController::class, "index"])->name("comment.index");
// Route::post("/comment", [CommentController::class, "store"])->name("comment.store");
// Route::get("/comment/{comment}", [CommentController::class, "show"])->name("comment.show");
// Route::put("/comment/{comment}", [CommentController::class, "update"])->name("comment.update");
// Route::delete("/comment/{comment}", [CommentController::class, "destroy"])->name("comment.destroy");

Route::apiResource("comment", CommentController::class);
Route::apiResource("employee", EmployeeController::class);
