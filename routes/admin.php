<?php


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "admin", "as" => "admin."], function () {

    Route::get("/login", [AuthController::class, "loginPage"])->name("login");
    Route::post("/login", [AuthController::class, "login"])->name("login.post");
    Route::get("/register", [AuthController::class, "registerPage"])->name("register.page");
    Route::post("/register", [AuthController::class, "register"])->name("register.post");
    Route::post("/logout", [AuthController::class, "logout"])->name("logout");


    Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");

    Route::get("/property", [PropertyController::class, "index"])->name("property.index");
    Route::get("/property/create", [PropertyController::class, "create"])->name("property.create");
    Route::post("/property/store", [PropertyController::class, "store"])->name("property.store");
    Route::get("/property/{id}", [PropertyController::class, "show"])->name("property.show");
    Route::get("/property/edit/{id}", [PropertyController::class, "edit"])->name("property.edit");
    Route::post("/property/update/{id}", [PropertyController::class, "update"])->name("property.update");
    Route::get("/property/destroy", [PropertyController::class, "destroy"])->name("property.destroy");

    Route::get("/category", [CategoryController::class, "index"])->name("category.index");
    Route::get("/category/create", [CategoryController::class, "create"])->name("category.create");
    Route::post("/category/store", [CategoryController::class, "store"])->name("category.store");
    Route::get("/category/edit/{id}", [CategoryController::class, "edit"])->name("category.edit");
    Route::post("/category/update/{id}", [CategoryController::class, "update"])->name("category.update");
    Route::get("/category/destroy", [CategoryController::class, "destroy"])->name("category.destroy");

    Route::get("/company", [CompanyController::class, "index"])->name("company.index");
    Route::get("/company/create", [CompanyController::class, "create"])->name("company.create");
    Route::post("/company/store", [CompanyController::class, "store"])->name("company.store");
    Route::get("/company/edit/{id}", [CompanyController::class, "edit"])->name("company.edit");
    Route::post("/company/update/{id}", [CompanyController::class, "update"])->name("company.update");
    Route::get("/company/destroy", [CompanyController::class, "destroy"])->name("company.destroy");


    Route::get("/reviews", [ReviewController::class, "index"])->name("reviews.index");
    Route::get("/reviews/create", [ReviewController::class, "create"])->name("reviews.create");
    Route::post("/reviews/store", [ReviewController::class, "store"])->name("reviews.store");
    Route::get("/reviews/edit/{id}", [ReviewController::class, "edit"])->name("reviews.edit");
    Route::post("/reviews/update/{id}", [ReviewController::class, "update"])->name("reviews.update");
    Route::get("/reviews/destroy", [ReviewController::class, "destroy"])->name("reviews.destroy");
    Route::get("/reviews/{id}", [ReviewController::class, "show"])->name("reviews.show");


    Route::get("/users", [UserController::class, "index"])->name("users.index");
    Route::get("/users/create", [UserController::class, "create"])->name("users.create");
    Route::post("/users/store", [UserController::class, "store"])->name("users.store");
    Route::get("/users/edit/{id}", [UserController::class, "edit"])->name("users.edit");
    Route::post("/users/update/{id}", [UserController::class, "update"])->name("users.update");
    Route::get("/users/destroy", [UserController::class, "destroy"])->name("users.destroy");
    Route::get("/users/{id}", [UserController::class, "show"])->name("users.show");


});
