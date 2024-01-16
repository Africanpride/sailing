<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', [FrontViewController::class, 'home'])->name('home');
Route::get('pdf_invoice', [FrontViewController::class, 'pdf_invoice']);
Route::get('terms', [FrontViewController::class, 'terms']);
Route::get('help', [FrontViewController::class, 'help']);
Route::get('topics', [FrontViewController::class, 'topics']);
Route::get('donate', [FrontViewController::class, 'donate']);
Route::get('privacy', [FrontViewController::class, 'privacy']);
Route::get('dmca', [FrontViewController::class, 'dmca']);
Route::get('about', [FrontViewController::class, 'about']);
Route::get('documentation', [FrontViewController::class, 'documentation']);
Route::get('contact', [FrontViewController::class, 'contact']);
Route::get('our-process', [FrontViewController::class, 'ourProcess']);
Route::get('institutes', [FrontViewController::class, 'institutes']);
Route::get('news', [FrontViewController::class, 'news'])->name('news');

Route::post('contact', ContactController::class)->name('contact-form');
// Route::resource('newsroom', NewsroomController::class);
// Route::get('/news/{newsroom:slug}', [NewsroomController::class, 'show'])->name('news.show');

Route::resource('donation', DonationController::class);

// payment & Social Logins
Route::get('auth/google', [SocialController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\SocialController::class, 'handleGoogleCallback']);

