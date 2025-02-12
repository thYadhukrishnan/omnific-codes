<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/view',[LoginController::class,'viewLogin'])->name( 'viewLogin');
Route::post('login',[LoginController::class,'login'])->name('login');

Route::get('register',[LoginController::class,'register'])->name('register');
Route::middleware('admin')->group(function(){
    Route::get('admin-home',[AdminController::class,'adminHome'])->name('adminHome');

    Route::get('edit-user',[AdminController::class,'editUser'])->name('editUser');
    Route::get('delete-user',[AdminController::class,'deleteUser'])->name('deleteUser');
    Route::post('user-edit-save',[AdminController::class,'userEditSave'])->name('userEditSave');

});

Route::post('registerUser',[LoginController::class,'registerUser'])->name('registerUser');
Route::get('logout',[LoginController::class,'logout'])->name('logout');


Route::middleware('user')->group(function(){
    Route::get('user-home',[UserController::class,'userHome'])->name('userHome');
    Route::post('self-edit',[UserController::class,'selfEdit'])->name('selfEdit');
});