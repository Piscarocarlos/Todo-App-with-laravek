<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestControler;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/contact-us', [ContactController::class, 'showContactPage'])->name('contact');
Route::post('send-contact-form', [ContactController::class, 'sendContact'])->name('send_contact');

Route::get('todos', [TodoController::class, 'index'])->name('todos');
Route::get('todos/create', [TodoController::class, 'create'])->name('todos.create');
Route::post('todos/store', [TodoController::class, 'store'])->name('todos.store');

Route::get('todos/edit/{id}', [TodoController::class, 'edit'])->name('todos.edit');
Route::put('todos/update/{id}', [TodoController::class, 'update'])->name('todos.update');

Route::delete('todos/delete/{id}', [TodoController::class, 'delete'])->name('todos.delete');


Route::resource("test", TestControler::class);
