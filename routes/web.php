<?php

use App\Models\User;
use App\Models\Edition;
use App\Models\Invoice;
use App\Models\Institute;
use App\Models\Application;
use App\Models\Publication;
use Illuminate\Support\Number;
use App\Mail\ApplicationApproved;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\InvoiceReceiptController;
use App\Http\Controllers\DisplayInstituteController;
use App\Notifications\ApplicationApprovedNotification;
use App\Notifications\ApplicationApprovedEmailNotification;

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

// Route::post('/pay', [PaymentController::class, 'redirectToGateway'])
//     ->name('pay')
//     ->middleware('auth', 'preventduplicatetransaction');

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
Route::resource('announcements', AnnouncementController::class);

Route::post('contact', ContactController::class)->name('contact-form');

// Route::resource('newsroom', NewsroomController::class);
// Route::get('/news/{newsroom:slug}', [NewsroomController::class, 'show'])->name('news.show');

// display a particular institute using slug as parameter for the flrontend
Route::resource('institutes', InstituteController::class);
Route::resource('publications', PublicationController::class);

// payment & Social Logins
Route::get('auth/google', [SocialController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\SocialController::class, 'handleGoogleCallback']);




// ADMINISTRATION ROUTES WITH "ADMIN" PREFIX
Route::middleware([
    'auth:sanctum',
    'verified',
    config('jetstream.auth_session'),
    'verified',
    'mustBeAdmin',
])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin-dashboard');


    // Route::get('/create-edition', function() {
    //     // dd("hello world");
    //     $institutes = Institute::all();
    //     return view('admin.edition.create', compact('institutes'));
    // })->name('create-edition');
    Route::resource('donations', DonationController::class);
    Route::resource('editions', EditionController::class);
    Route::resource('transactions', TransactionController::class);


    Route::get('/myInstitutes', function () {
        $institutes = Institute::all();
        return view('admin.myInstitutes.index', compact('institutes'));
    })->name('myInstitutes');

    Route::get('/editions', function () {

        return view('admin.myInstitutes.editions');
    })->name('editions');

    Route::get('/analytics', function () {
        return view('admin.analytics');
    })->name('analytics');
});



// ADMINISTRATION ROUTES
Route::middleware([
    'auth:sanctum',
    'verified',
    config('jetstream.auth_session'),
    'verified',
    'mustBeAdmin',
])->group(function () {

    Route::get('participants', function () {
        return view('admin.participants.index');
    })->name('participants');

    // Applications with Paid, Unpaid and panding statuses.
    Route::get('applications', function () {

        $pendingApplications = Application::where('status', 'pending')->paginate(10);
        $paidApplications = Application::where('paid_for', true)->paginate(10);
        $unpaidApplications = Application::where('status', 'approved')->where('paid_for', false)->paginate(10);
        $rejectedApplications = Application::where('status', 'rejected')->where('paid_for', false)->paginate(10);

        return view('admin.applications.index', compact('pendingApplications', 'paidApplications', 'unpaidApplications', 'rejectedApplications'));
    })->name('applications');

    Route::get('staff', function () {
        $users = User::staff()->paginate(8);
        return view('staff.index');
    })->name('staff');
    // Route::get('staff', function () {
    //     $users = User::staff()->paginate(8);
    //     return view('staff.index', compact('users'));
    // })->name('staff');

    Route::get('admin/publications-list', function () {
        $publications = Publication::paginate(10);

        return view('admin.publications-list', compact('publications'));
    })->name('publications-list');

    Route::get('/roles/manage-roles', function () {
        $users = User::all();
        $admins = User::role(['admin', 'super_admin'])->get();

        return view('admin/roles/manage-roles', compact('users', 'admins'));
    })->name('roles');

    Route::get('logs', function () {
        return view('admin.logs');
    })->name('logs');


    Route::get('table', function () {
        $logs = DB::table('authentication_log')
            ->select(
                'authentication_log.authenticatable_id',
                'ip_address',
                'login_at',
                'login_successful',
                'users.email',
                'users.firstName',
                'users.lastName',
                'users.profile_photo_path'
            )
            ->join('users', 'users.id', '=', 'authentication_log.authenticatable_id')
            ->paginate(7);

        return view('tableModule', compact('logs'));
    })->name('table');
});




// REQUIRES USER AUTHENTICATION
Route::middleware([
    'auth:sanctum',
    'verified',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('receipt/{invoice_number}', InvoiceReceiptController::class)->name('receipt');



    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('my-applications', function () {
        $applications = Application::where('user_id', auth()->user()->id)->with('edition', 'invoice')->paginate(10);
        return view('my-applications', compact('applications'));
    })->name('my-applications');

    // User profile
    Route::get('/profile', function () {
        return view('profile.show');
    });
});

Route::get('documentation', function () {
    $institutes = Institute::all();
    return view('documentation', compact('institutes'));
});
Route::get('tabs', function () {
    // $mindset = Institute::find(2)->with('editions')->get();
    $fdi = Edition::first();
    // dd($fdi->banner);
    return view('tabs', compact('fdi'));
})->middleware('auth');

Route::get('/note', function () {

    $lastInvoiceNumber = Invoice::where('invoice_number', "000020240213-TLGIMXUD")->with('application')->first();

    // Load the 'edition' relationship separately
    $lastInvoiceNumber->load('edition:acronym');

    dd($lastInvoiceNumber);
});
Route::get('/landing', function () {

return view('landing');
});
Route::get('/dash', function () {

return view('dash');
});

