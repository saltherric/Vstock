<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

//category
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('category/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/save', [CategoryController::class, 'save'])->name('category.save');
Route::get('category/edit/{id}', [ CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');

// Resource route
Route::resource('role', RoleController::class)->except(['show', 'destroy']);
Route::get('role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');