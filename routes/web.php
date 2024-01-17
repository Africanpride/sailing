<?php

use App\Models\Institute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\DisplayInstituteController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\PublicationController;

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
Route::get('about', [FrontViewController::class, 'about'])->name('about');
Route::get('contact', [FrontViewController::class, 'contact'])->name('contact');
Route::get('institutes', [FrontViewController::class, 'institutes'])->name('MyInstitutes');
Route::get('pdf_invoice', [FrontViewController::class, 'pdf_invoice']);
Route::get('privacy', [FrontViewController::class, 'privacy'])->name('privacy');
Route::get('dmca', [FrontViewController::class, 'dmca'])->name('dmca');
Route::get('terms', [FrontViewController::class, 'terms'])->name('terms');
Route::get('help', [FrontViewController::class, 'help'])->name('help');
Route::get('topics', [FrontViewController::class, 'topics'])->name('topics');
Route::get('donate', [FrontViewController::class, 'donate'])->name('donate');
Route::get('documentation', [FrontViewController::class, 'documentation']);
Route::get('our-process', [FrontViewController::class, 'ourProcess']);


Route::post('contact', ContactController::class)->name('contact-form');
// Route::resource('newsroom', NewsroomController::class);
// Route::get('/news/{newsroom:slug}', [NewsroomController::class, 'show'])->name('news.show');

Route::resource('donation', DonationController::class);

// payment & Social Logins
Route::get('auth/google', [SocialController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\SocialController::class, 'handleGoogleCallback']);

// display a particular institute using slug as parameter for the flrontend

Route::resource('institutes', InstituteController::class);
Route::resource('publications', PublicationController::class);

// Route::get('/institutes/{slug}', DisplayInstituteController::class)->name('institute.show');
// Route::get('/institutes/{slug}', DisplayInstituteController::class)->name('institute.show');
// Route::get('institutes', function () {
//     $institutes = Institute::get();
//     $nextInstitute = Institute::where('acronym','fdi')
//         ->first();

//     return view('institutes.index', compact('institutes', 'nextInstitute'));
// })->name('institutes');
