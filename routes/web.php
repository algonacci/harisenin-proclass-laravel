<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hello", function () {
    return "Hello";
});

Route::get("/user/{name}", function (string $name) {
    return "Hai " . $name;
});

Route::get("/dashboard/{batch}/{kelas}", function (int $batch, string $kelas) {
    return "Selamat datang di batch " . $batch . " kelas " . $kelas;
});

Route::match(["get", "post"], "/eric", function () {
    return "Hai";
});

Route::any("/apa-aja", function () {
    return "Lewat ajaa";
});

Route::get("/welcome", [WelcomeController::class, "welcome"]);
Route::get("/say-my-name", [WelcomeController::class, "sayMyName"]);
Route::get("/home", function () {
    return "home";
})->name("home");
Route::get("/about", function () {
    return "about";
})->name("about");


Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");
