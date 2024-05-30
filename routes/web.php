<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function (){
    Route::get('/home', \App\Livewire\Home::class)->name("home");
    Route::get('/profile', \App\Livewire\Auth\Profile::class)->name("profile");

    Route::get('/menu', \App\Livewire\Menu\Index::class)->name("menu.index");
    Route::get('/customer', \App\Livewire\Customer\Index::class)->name("customer.index");

    Route::get('/transaction', \App\Livewire\Transaction\Index::class)->name("transaction.index");
    Route::get('/transaction/create', \App\Livewire\Transaction\Actions::class)->name("transaction.create");
    Route::get('/transaction/export', \App\Livewire\Transaction\Export::class)->name("transaction.export");
    Route::get('/transaction/{transaction}/edit', \App\Livewire\Transaction\Actions::class)->name("transaction.edit");
    Route::get('/transaction/{transaction}/cetak', \App\Livewire\Transaction\Cetak::class)->name("transaction.cetak");
});

Route::middleware('guest')->group(function (){
    Route::get('/login', \App\Livewire\Auth\Login::class)->name("login");
});