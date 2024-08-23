<?php
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TestController::class,'printGreat'])->name('index');

// we can use ->name to give route a simple name to use in links
Route::get('/',[TestController::class,'index'])->name('index');
Route::get('/show/{post}/', [TestController::class,'show'])->name('show');
Route::get('/create', [TestController::class,'create'])->name('create');
Route::post('/', [TestController::class,'store'])->name('store');
Route::get('/edit/{post}', [TestController::class,'edit'])->name('edit');
Route::post('/update/{post}', [TestController::class,'update'])->name('update');
Route::delete('/delete/{post}', [TestController::class,'destroy'])->name('destroy');


