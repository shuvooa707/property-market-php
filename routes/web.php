<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
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

Route::get("/login", [AuthController::class, "loginPage"])->name("login");
Route::post("/login", [AuthController::class, "login"])->name("login.post");
Route::get("/register", [AuthController::class, "registerPage"])->name("register.page");
Route::post("/register", [AuthController::class, "register"])->name("register.post");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");

Route::get("/", [PropertyController::class, "index"])->name("home");
Route::get("/property/{id}", [PropertyController::class, "show"])->where("id", "\d+")->name("property.show");
Route::get("/property/scroll-more", [PropertyController::class, "scrollMore"])->name("property.scroll-more");
Route::get("/property/search", [PropertyController::class, "search"]);
Route::get("/property/category/{id}", [PropertyController::class, "byCategory"]);



Route::get("/about", [HomeController::class, "about"])->name("about");
Route::get("/contact", [HomeController::class, "contact"])->name("contact");



include_once "admin.php";