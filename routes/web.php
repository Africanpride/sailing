<?php

use App\Models\User;
use App\Models\Institute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\DisplayInstituteController;
use App\Models\Publication;

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

Route::post('/pay', [PaymentController::class, 'redirectToGateway'])
    ->name('pay')
    ->middleware('auth', 'preventduplicatetransaction');

Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback'])
    ->name('payment')
    ->middleware('verifyWebhookIP');



Route::get('banned', function () {
    return view('auth.banned');
})->name('banned')->middleware('auth');




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


Route::resource('donation', DonationController::class);
Route::post('contact', ContactController::class)->name('contact-form');

// Route::resource('newsroom', NewsroomController::class);
// Route::get('/news/{newsroom:slug}', [NewsroomController::class, 'show'])->name('news.show');

Route::resource('institutes', InstituteController::class);
Route::resource('publications', PublicationController::class);

// payment & Social Logins
Route::get('auth/google', [SocialController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\SocialController::class, 'handleGoogleCallback']);

// display a particular institute using slug as parameter for the flrontend


// Route::get('/institutes/{slug}', DisplayInstituteController::class)->name('institute.show');
// Route::get('/institutes/{slug}', DisplayInstituteController::class)->name('institute.show');
// Route::get('institutes', function () {
//     $institutes = Institute::get();
//     $nextInstitute = Institute::where('acronym','fdi')
//         ->first();

//     return view('institutes.index', compact('institutes', 'nextInstitute'));
// })->name('institutes');


// ADMINISTRATION ROUTES

Route::get('admin/publications-list', function () {
    $publications = Publication::paginate(10);

    return view('admin/publications-list', compact('publications'));
})->name('publications-list');

Route::get('/roles/manage-roles', function () {
    $users = User::all();
    $admins = User::role(['admin', 'super_admin'])->get();

    return view('admin/roles/manage-roles', compact('users','admins'));
})->name('roles');

Route::get('logs', function () {
    return view('admin.logs');
})->name('logs');
Route::get('table', function () {
    $logs = DB::table('authentication_log')
    ->select('authentication_log.authenticatable_id', 'ip_address', 'login_at', 'login_successful', 'users.email'
    , 'users.firstName' , 'users.lastName', 'users.profile_photo_path')
    ->join('users', 'users.id', '=', 'authentication_log.authenticatable_id')
    ->paginate(7);

    return view('tableModule', compact('logs'));
})->name('table');





// REQUIRES USER AUTHENTICATION
Route::middleware([
    'auth:sanctum',
    'verified',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // User profile
        Route::get('/profile', function () {
            return view('profile.show');
        });

});

Route::get('documentation', function() {
    return view('documentation');
});
Route::get('tabs', function() {
return view('tabs');
});


