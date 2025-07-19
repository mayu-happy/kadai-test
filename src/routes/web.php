<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ContactController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [ContactController::class, 'index'])->name('contacts.index'); // 入力画面
Route::get('/thanks/{id}', [ContactController::class, 'thanks'])->name('contacts.thanks');
Route::get('/list', [ContactController::class, 'list'])->name('contacts.list');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store'); // 
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index'); // 入力画面
Route::match(['get', 'post'], '/contacts/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/home', function () {
    return redirect()->route('contacts.index');
})->name('home');
Route::get('/thanks-test', function () {
    return view('contacts.thanks_test');
})->name('contacts.thanks_test');
Route::get('/contacts/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
Route::get('/admin', [ContactController::class, 'admin'])->name('contacts.admin');
Route::resource('contacts', ContactController::class);
