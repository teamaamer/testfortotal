<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AccountsController;
use App\Http\Controllers\Dashboard\CareersController;
use App\Http\Controllers\Dashboard\CommentsController;
use App\Http\Controllers\Dashboard\ContactRequestController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\DatatablesController;
use App\Http\Controllers\Dashboard\DocumentsController;
use App\Http\Controllers\Dashboard\CoursesController;
use App\Http\Controllers\Dashboard\DevicesController;
use App\Http\Controllers\Dashboard\JobApplications;
use App\Http\Controllers\Dashboard\NewsletterSubscriptionController;
use App\Models\ContactRequest;
use App\Models\Course;
use App\Models\Device;

Route::get('/', function () {
    return view('welcome-modern');
});

Route::get('/courses', function () {

    $query = Course::query();
    $courses = $query->paginate(10)->withQueryString();

    return view('courses')->with(compact('courses'));
})->name('courses');

Route::get('tradein', function () {

    $devices = Device::where('status', 'active')->latest()
        ->paginate(10);
    return view('trade_in')->with(compact('devices'));
})->name('tradein');

Route::get('maintenance_request', function () {

        $devices = Device::where('status', 'active')->get();

    return view('maintenance')->with(compact('devices'));
})->name('maintenance_request');

Route::get('/devices/{device}', function (Device $device) {

    return view('device')->with(compact('device'));
})->name('devices.show');

Route::get('/courses/{course}', function (Course $course) {

    $comments = $course->comments()
        ->latest()
        ->paginate(5);

    return view('course')->with(compact('course', 'comments'));
})->name('courses.show');

Route::get('/goprofessional', function () {

    $query = Course::query();
    $courses = $query->paginate(10)->withQueryString();

    return view('goprofessional');
})->name('goprofessional');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/blocked', function () {
    return view('dashboard.blocked');
})->name('blocked');


Route::group(['middleware' => ['auth', 'check.account.status'],  'prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('datatables/getAccountDocuments/{id}', [DatatablesController::class, 'getAccountDocuments']);
    Route::get('datatables/getCareerAppliedStudents/{id}', [DatatablesController::class, 'getCareerAppliedStudents']);
    Route::get('accounts/{account}/documents/create', [DocumentsController::class, 'create'])->name('exercises.create');
    Route::resource('documents', DocumentsController::class);

    Route::middleware('role:admin')->group(function () {

        Route::resource('accounts', AccountsController::class)->except(['show', 'edit', 'update']);
        Route::get('datatables/getAccounts', [DatatablesController::class, 'getAccounts']);
        Route::resource('contactRequests', ContactRequestController::class);
        Route::resource('subscribtions', NewsletterSubscriptionController::class);
        
        Route::get('datatables/getContactRequests', [DatatablesController::class, 'getContactRequests']);
        Route::get('datatables/getSubscribtions', [DatatablesController::class, 'getSubscribtions']);
    });

    Route::middleware('role:center')->group(function () {

        Route::resource('jobApplications', JobApplications::class);
        Route::get('datatables/getJobApplications', [DatatablesController::class, 'getJobApplications']);
    });

    Route::get('accounts/{account}', [AccountsController::class, 'show'])
        ->name('accounts.show');

    Route::get('accounts/{account}/edit', [AccountsController::class, 'edit'])
        ->name('accounts.edit');


    Route::put('accounts/{account}', [AccountsController::class, 'update'])
        ->name('accounts.update');

    Route::middleware('role:student')->group(function () {

        Route::post('/courses/{course}/like', [CoursesController::class, 'toggleLike'])->name('courses.like');
        Route::post('/courses/{course}/comments', [CommentsController::class, 'store'])->name('courses.comments.store');
        Route::post('/careers/{career}/apply', [CareersController::class, 'apply'])
            ->name('careers.apply');
    });

    Route::get('datatables/getDevices', [DatatablesController::class, 'getDevices']);


    Route::resource('careers', CareersController::class);
    Route::resource('devices', DevicesController::class);


    Route::get('contact_us', function () {
        return view('dashboard.contactus.index');
    });

    Route::get('maintenance', function () {
        $devices = Device::where('status', 'active')->get();
        return view('dashboard.maintenance.index')->with(compact('devices'));
    });

    Route::get('tradein', function () {
        $devices = Device::where('status', 'active')->get();
        return view('dashboard.tradein.index')->with(compact('devices'));
    });



    Route::get('academies', [CoursesController::class, 'allAcademies'])->name('courses.allAcademies');
    Route::get('academies/{id}', [CoursesController::class, 'academy'])->name('academis.show');

    Route::get('/courses/{course}/comments/load', [CommentsController::class, 'load'])->name('courses.comments.load');
    Route::get('/courses/{course}/comments/publicload', [CommentsController::class, 'publicload'])->name('courses.comments.publicload');

});

Route::middleware(['auth', 'check.account.status'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {

        Route::resource('courses', CoursesController::class);
    });


Route::middleware(['auth', 'check.account.status'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {

        Route::resource('courses', CoursesController::class);
    });


     Route::post('dashboard/tradein/send', [ContactUsController::class, 'tradein'])->name('contact.tradein');
    Route::post('/maintenance/send', [ContactUsController::class, 'maintenance'])->name('contact.maintenance');


Route::post('/contact/send', [ContactUsController::class, 'send'])->name('contact.send');

Route::post('/newsletter/subscribe', [NewsletterSubscriptionController::class, 'store'])
    ->name('newsletter.subscribe');

    Route::post('/ajax-register', [RegisteredUserController::class, 'ajaxRegister'])
    ->name('ajax.register');

Route::get('/blog', function () {
    return view('blog');
});


require __DIR__ . '/auth.php';
