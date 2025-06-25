<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Index;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\Logout;
use App\Livewire\Donate;
use App\Livewire\Leaderboards;
use App\Livewire\AccountSettings;
use App\Livewire\TransactionHistory;
use App\Livewire\Admin;
use App\Livewire\Errors\Forbidden;
use App\Http\Controllers\PayPalController;

Route::middleware(['last.activity'])->group(function () {
    Route::get('/', Index::class)->name('home');
    Route::get('/donate', Donate::class)->name('donate');
    Route::get('/leaderboards', Leaderboards::class)->name('leaderboards');

    // ERRORS
    Route::get('/403', Forbidden::class)->name('errors.403');
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware(['auth', 'last.activity'])->group(function () {
    Route::get('/logout', Logout::class)->name('logout');
    Route::get('/paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
    Route::get('/paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');
    Route::get('/account-settings', AccountSettings::class)->name('account-settings');
    Route::get('/transaction-history', TransactionHistory::class)->name('account-settings');

    // ADMIN
    Route::get('/admin', Admin::class)->name('admin-home');
});