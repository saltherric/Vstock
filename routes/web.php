<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
