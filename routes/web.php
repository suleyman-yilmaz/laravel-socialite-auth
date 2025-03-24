<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

/**
 * Google and Facebook Login
 */
Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/redirection/{provider}', 'authProviderRedirect')->name('auth.redirection');

    Route::get('auth/{provider}/callback', 'socialAuthentication')->name('auth.callback');
});

require __DIR__ . '/auth.php';
