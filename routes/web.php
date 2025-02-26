<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Route::group(['prefix' => 'mail', 'as' => 'mail.'], function () {
    Route::get('', [MailController::class, 'index'])->name('index');
    Route::get('create', [MailController::class, 'create'])->name('create');
    Route::post('send', [MailController::class, 'sendMail'])->name('send');
});
