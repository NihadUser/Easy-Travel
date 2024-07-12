<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\client\BlogController;
use App\Http\Controllers\client\CommentsController;
use App\Http\Controllers\client\DetailsController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\PaymentController;
use App\Http\Controllers\client\SearchController;
use App\Http\Controllers\client\SelectionController;
use App\Http\Controllers\client\TourController;
use App\Http\Controllers\client\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['as' => 'home.', 'prefix' => 'home'], function () {
    Route::get('/place-details/{id}', [DetailsController::class, 'place'])->name('place');
    Route::get('/property-{id}-details', [DetailsController::class, 'property'])->name('property');
    Route::get('/tour-{id}-detalis', [TourController::class, 'tourDetails'])->name('tourDetails');
    Route::get('/join-tour/{id}', [TourController::class, 'tourJoin'])->name('tourJoin');
    Route::group(['as' => 'comments.', 'prefix' => 'comments'], function () {
        Route::post("/place/{id}", [CommentsController::class, 'placeComment'])->name('placeComment');
        Route::post("/property/{id}", [CommentsController::class, 'propertyComment'])->name('propertyComment');
        Route::post("/guide/{id}", [CommentsController::class, 'guideComment'])->name('guideComment');
        Route::post("/blog/{id}", [CommentsController::class, 'blogComment'])->name('blogComment');
    });
    Route::group(['as' => 'search.', 'prefix' => "search"], function () {
        Route::get('/place', [SearchController::class, 'searchMain'])->name('searchMain');
        Route::get('/property', [SearchController::class, 'searchProperty'])->name('searchProperty');
        Route::get('/guide', [SearchController::class, 'searchGuide'])->name('searchGuide');
    });
    Route::get('/guide-{id}-details', [DetailsController::class, 'guide'])->name('guide');
});
Route::group(['as' => 'about.', 'prefix' => 'about'], function () {
    Route::get('/about', [AboutController::class, 'index'])->name('aboutPage');
});
Route::group(['as' => 'payment.', 'prefix' => 'payment'], function () {
    Route::get('/{id}/property', [PaymentController::class, 'index'])->name("index");
    Route::get('/{id}/guide', [PaymentController::class, 'guide'])->name("guide");
    Route::post('/{id}/guidePay', [PaymentController::class, 'guidePay'])->name("guidePay");
    Route::post('/{id}/property/book', [PaymentController::class, 'propertyBook'])->name("propertyBook");
});
Route::group(['as' => 'blogs.', 'prefix' => 'blogs'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('blogs');
    Route::get("/details/{id}", [BlogController::class, 'details'])->name('blogDetails');
    Route::post('/blogCreate', [BlogController::class, 'create'])->name('create');
    Route::get('/search', [BlogController::class, 'search'])->name('search');
});
Route::group(['as' => 'tourPlan.', 'prefix' => 'tourPlan', 'middleware' => 'host'], function () {
    Route::get('/1', [TourController::class, 'index2'])->name('plan1');
    Route::post('/data', [TourController::class, 'data'])->name('data');
    Route::post('/placeAdd/{id}', [TourController::class, 'addPlace'])->name('tourPlacesAdd');
    Route::get('/2', [TourController::class, 'places'])->name('plan2');
    Route::get('/tourApprove/{id}', [TourController::class, 'tourApprove'])->name('tourApprove');
    Route::post('/guideAdd/{id}', [TourController::class, 'guideAdd'])->name('tourGuideAdd');
    Route::get('/tour-plaace-delete/{id}', [TourController::class, 'tourPlaceDelete'])->name('tourPlaceDelete');
    Route::get('/tourRequest/{id}', [TourController::class, 'tourReqeust'])->name('tourReqeust');
    Route::get('/tourError', [TourController::class, 'tourError'])->name('tourError');
});
Route::group(['as' => "user.", 'prefix' => 'user'], function () {
    Route::get('/{id}', [UserController::class, 'index'])->name('page');
    Route::get("/request/{id}", [UserController::class, 'request'])->name('request');
    Route::post('/edit-profile/{id}', [UserController::class, 'editProfile'])->name('editProfile');
    Route::post('/edit-guide/{id}', [UserController::class, 'editGuide'])->name('editGuide');
    Route::post("/to-guide", [UserController::class, 'guide'])->name('guide');
    Route::get('/editBlog/{id}', [UserController::class, 'userBlogEdit'])->name('userBlogEdit');
    Route::get('/edit-page/{id}', [UserController::class, 'editPage'])->name('editPage');
    Route::post('/editedBlog/{id}', [UserController::class, 'editedBlog'])->name('blog.edit');
    Route::get('/delete-blog/{id}', [UserController::class, 'deleteBlog'])->name('deleteBlog');
    Route::get('/host-request/{id}', [UserController::class, 'host'])->name('host');
    Route::get('/tour_edit/{id}', [UserController::class, 'tourEdit'])->name('editTour');
    Route::post('/tourEdit/{id}', [UserController::class, 'tour_edit'])->name('tourEdit');
    Route::get('/tourPage/{id}', [UserController::class, 'tourPage'])->name('userTour');
    Route::get('/deleteTour/{id}', [UserController::class, 'deleteTour'])->name('deleteTour');
});
Route::group(['as' => 'selection.', 'prefix' => 'selection'], function () {
    Route::get('/place-favorites/{id}', [SelectionController::class, 'place'])->name('place');
    Route::get('/placeDelete/{id}', [SelectionController::class, 'deletePlace'])->name('deletePlace');
    Route::get('/property/{id}', [SelectionController::class, 'property'])->name('property');
    Route::get('/propertyDelete/{id}', [SelectionController::class, 'deleteProperty'])->name('deleteProperty');
    Route::get('/guide/{id}', [SelectionController::class, 'guide'])->name('guide');
    Route::get('/guide-delete/{id}', [SelectionController::class, 'guideDelete'])->name('guideDelete');
    Route::get('place', [SelectionController::class, 'placeFav'])->name('placeFav');
    Route::get('property', [SelectionController::class, 'propertyFav'])->name('propertyFav');
    Route::get('guide', [SelectionController::class, 'guideFav'])->name('guideFav');
});



Auth::routes();