<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SliderController;
use App\Models\Review;

Route::get('/', function () {
    $reviews = Review::latest()->get();
    return view('home.index', compact('reviews'));
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::post('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('/verify', [AdminController::class, 'ShowVerification'])->name('custom.verification.form');
Route::post('/verify', [AdminController::class, 'VerificationVerify'])->name('custom.verification.verify');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/profile/store', [AdminController::class, 'ProfileStore'])->name('profile.store');

    Route::post('/profile/change-pass', [AdminController::class, 'ChangePassword'])->name('profile.change_pass');
});

Route::middleware('auth')->group(function () {
    Route::controller(ReviewController::class)->group(
        function () {
            Route::get('/all/review', 'AllReview')->name('all.review');
            Route::get('/add/review', 'Addreview')->name('add.review');
            Route::post('/store/review', 'store')->name('store.review');
            Route::get('/edit/review/{id}', 'EditReview')->name('edit.review');
            Route::post('/update/review/{id}', 'UpdateReview')->name('update.review');
            Route::get('/delete/review/{id}', 'DeleteReview')->name('delete.review');
        }
    );


    Route::controller(SliderController::class)->group(
        function () {
            Route::get('/get/slider', 'GetSlider')->name('get.slider');
            Route::post('/update/slider/{id}', 'UpdateSlider')->name('update.slider');
            Route::post('/edit-slider/{id}', 'ElementUpdate');
            Route::post('/edit-feature/{id}', 'FeatureUpdate');
            Route::post('/edit-answers/{id}', 'AnswersUpdate');
            Route::post('/edit-reviews/{id}', 'ReviewsUpdate');
        }
    );


    Route::controller(HomeController::class)->group(
        function () {
            Route::get('/all/feature', 'AllFeatures')->name('all.features');
            Route::get('/add/feature', 'AddFeatures')->name('add.feature');
            Route::post('/store/feature', 'store')->name('store.feature');
            Route::get('/edit/feature/{id}', 'EditFeature')->name('edit.feature');
            Route::post('/update/feature/{id}', 'UpdateFeature')->name('update.feature');
            Route::get('/delete/feature/{id}', 'DeleteFeature')->name('delete.feature');
        }
    );



    Route::controller(HomeController::class)->group(
        function () {
            Route::get('/get/clarifi', 'GetClarifi')->name('get.clarifi');
            Route::post('/update/clarifi/{id}', 'UpdateClarifi')->name('update.clarifi');
        }
    );
});
