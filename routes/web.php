<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Profile;
use App\Http\Livewire\Auth\SuntingProfile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')
        ->name('home');

    Route::get('/sales-purchases/chart-data', 'HomeController@salesPurchasesChart')
        ->name('sales-purchases.chart');

    Route::get('/current-month/chart-data', 'HomeController@currentMonthChart')
        ->name('current-month.chart');

    Route::get('/payment-flow/chart-data', 'HomeController@paymentChart')
        ->name('payment-flow.chart');

    Route::group(['auth'], function () {
        Route::get('keluar', function () {
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect()->route('login');
        })->name('auth.keluar');
        Route::get('profile', [Profile::class, '__invoke'])->name('profile.auth');
        Route::get('sunting', [SuntingProfile::class, '__invoke'])->name('sunting-profile');
    });
});
