<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('generate-shorten-link', [ShortLinkController::class, 'index'])->name('shorten.link.index');
    Route::post('generate-shorten-link', [ShortLinkController::class, 'store'])->name('generate-shorten-link.post');
    Route::get('{code}', [ShortLinkController::class, 'shortenLink'])->name('shorten.link');


    Route::get('/shorten-link/{id}/edit',[ShortLinkController::class, 'edit'])->name('shorten.link.edit');
    Route::put('/shorten-link/{id}',[ShortLinkController::class, 'update'])->name('shorten.link.update');
    Route::delete('/shorten-link{id}',[ShortLinkController::class, 'destroy'])->name('shorten.link.delete');
    });