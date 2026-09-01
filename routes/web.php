<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\AboutSectionController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\CommentController;
use App\Models\About;

use App\Models\Review;

Route::get('/', function () {
    $reviews = Review::latest()->get();
    return view('home.index', compact('reviews'));
});


Route::get('/team', [FrontendController::class, 'OurTeam'])->name('our.team');
Route::get('/about-us', [FrontendController::class, 'AboutUs'])->name('about.us');
Route::get('/blog', [FrontendController::class, 'BlogPage'])->name('blog.page');
Route::get('/blog/detail/{slug}', [FrontendController::class, 'DetailBlogPost'])->name('detail.blog.post');
Route::get('/blog/category/{id}', [FrontendController::class, 'BlogCategory'])->name('blog.category.l');
Route::get('/contact-us', [FrontendController::class, 'ContactUs'])->name('contact.us');
Route::post('/contact-message', [FrontendController::class, 'SendContactUs'])->name('contact.message');






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


            Route::get('/get/usability', 'GetUsability')->name('get.usability');
            Route::post('/update/usability/{id}', 'UpdateUsability')->name('update.usability');
        }
    );


    Route::controller(HomeController::class)->group(
        function () {
            Route::get('/all/connect', 'AllConnect')->name('all.connect');
            Route::get('/add/connect', 'AddConnect')->name('add.connect');
            Route::post('/store/connect', 'StoreConnect')->name('store.connect');
            Route::get('/delete/connect/{id}', 'DeleteConnect')->name('delete.connect');
            Route::post('/edit-connect/{id}', 'EditConnect');
        }
    );



    Route::controller(HomeController::class)->group(
        function () {
            Route::get('/all/faq', 'AllFaq')->name('all.faq');
            Route::get('/add/faq', 'AddFaq')->name('add.faq');
            Route::post('/store/faq', 'StoreFaq')->name('store.faq');
            Route::get('/delete/faq/{id}', 'DeleteFaq')->name('delete.faq');
            Route::get('/edit/faq/{id}', 'EditFaq')->name('edit.faq');
            Route::post('/update/faq/{id}', 'UpdateFaq')->name('update.faq');
        }
    );


    Route::controller(HomeController::class)->group(
        function () {
            Route::post('/edit-app/{id}', 'EditApp');
            Route::post('/update-app-image/{id}', 'EditAppImage');
        }
    );


    Route::controller(TeamController::class)->group(
        function () {
            Route::get('/all/team', 'AllTeam')->name('all.team');
            Route::get('/add/team', 'AddTeam')->name('add.team');
            Route::get('/edit/team/{id}', 'EditTeam')->name('edit.team');
            Route::get('/delete/team/{id}', 'DeleteTeam')->name('delete.team');
            Route::post('/store/team', 'StoreTeam')->name('store.team');
            Route::post('/update/team/{id}', 'UpdateTeam')->name('update.team');
        }
    );



    Route::controller(TeamController::class)->group(
        function () {
            Route::get('/get/about-us', 'GetAboutUs')->name('get.about');
            Route::post('/update/about-us/{id}', 'UpdateAboutUs')->name('update.about');
        }
    );



    Route::controller(TeamController::class)->group(
        function () {
            Route::post('/edit-record/{id}', 'UpdateRecord')->name('update.record');
        }
    );


    Route::controller(AboutSectionController::class)->group(
        function () {
            Route::post('/edit-record/{id}', [AboutSectionController::class, 'updateRecord']);
        }
    );


    Route::controller(BlogController::class)->group(
        function () {
            Route::get('/blog/category', 'BlogCategory')->name('all.blog.category');
            Route::get('/blog/category/delete/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
            Route::post('/blog/category/store', 'StoreBlogCategory')->name('store.blog.category');
            Route::get('/blog/category/edit/{id}', 'EditBlogCategory')->name('edit.blog.category');
            Route::post('/blog/category/update/{id}', 'UpdateBlogCategory')->name('update.blog.category');
        }
    );

    Route::controller(BlogController::class)->group(
        function () {
            Route::get('/blog/posts', 'AllBlogPost')->name('all.blog.post');
            Route::get('/add/blog/post', 'AddBlogPost')->name('add.blog.post');
            Route::get('/delete/blog/post/{id}', 'DeleteBlogPost')->name('delete.blog.post');
            Route::get('/edit/blog/post/{id}', 'EditBlogPost')->name('edit.blog.post');
            Route::post('/store/blog/post', 'StoreBlogPost')->name('store.blog.post');
            Route::post('/update/blog/post/{id}', 'UpdateBlogPost')->name('update.blog.post');
        }
    );

    Route::post('/comment/store/{blogId}', [CommentController::class, 'StoreComment'])
        ->name('comment.store');

    Route::get('/contacts', [FrontendController::class, 'Contacts'])->name('all.contact.message');
    Route::get('/contact/view/{id}', [FrontendController::class, 'ViewContact'])->name('view.contact.message');
    Route::get('/contact/delete/{id}', [FrontendController::class, 'DelteContact'])->name('delete.contact.message');
});
