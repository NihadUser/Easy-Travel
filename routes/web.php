<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\AdminBlogController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminPlaceController;
use App\Http\Controllers\admin\AdminTourController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\RequestController;
use App\Http\Controllers\client\BlogController;
use App\Http\Controllers\client\CommentsController;
use App\Http\Controllers\client\DetailsController;
use App\Http\Controllers\client\ErrorHandling;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\PaymentController;
use App\Http\Controllers\client\SearchController;
use App\Http\Controllers\client\SelectionController;
use App\Http\Controllers\client\TourController;
use App\Http\Controllers\client\UserController;
use App\Http\Controllers\TourPlaceAddController;
use Illuminate\Support\Facades\Route;
// use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Exceptions\Handler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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
Route::group(['as' => 'about.', 'about'], function () {
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
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'is_admin'], function () {
    Route::group(['as' => 'users.', 'prefix' => 'user'], function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
        Route::get('/guide-info/{id}', [AdminUserController::class, 'guideInfo'])->name('guideInfo');
        Route::get('/editRole/{id}', [AdminUserController::class, 'editRole'])->name('editRole');
        Route::post('/edit/{id}', [AdminUserController::class, 'edit'])->name('edit');
        Route::get('/block/{id}', [AdminUserController::class, 'block'])->name('block');
    });
    Route::group(['as' => 'bookings.', 'prefix' => 'bookings'], function () {
        Route::get('/', [AdminController::class, 'bookings'])->name('bookings');
    });
    Route::group(['as' => 'tours.', 'prefix' => 'tours'], function () {
        Route::get('/', [AdminTourController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [AdminTourController::class, 'editPage'])->name('editPage');
        Route::post('/editTour/{id}', [AdminTourController::class, 'edit'])->name('edit');
    });
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::group(['as' => 'places.', 'prefix' => 'places'], function () {
        Route::get('/', [AdminPlaceController::class, 'places'])->name('adminPlace');
        Route::post('/add', [AdminPlaceController::class, 'addPlace'])->name('add');
        Route::get('/delete-{id}', [AdminPlaceController::class, 'deletePlace'])->name('deletePlace');
        Route::get('/edit-{id}', [AdminPlaceController::class, 'editPlaces'])->name('editPlace');
        Route::post('/editPlace/{id}', [AdminPlaceController::class, 'editedPlace'])->name('editedPlace');
        Route::get("/{id}/images", [AdminPlaceController::class, 'allImages'])->name('images');
        Route::post("/image/add/{id}", [AdminPlaceController::class, 'imageAdd'])->name('image.add');
        Route::get('/deleteImage/{id}', [AdminPlaceController::class, 'deleteImage'])->name('deleteImage');
    });
    Route::group(['as' => 'properties.', 'prefix' => 'properties'], function () {
        Route::get('/', [PropertyController::class, 'property'])->name('property');
        Route::post("/propetyInsert", [PropertyController::class, "propetyInsert"])->name('insert');
        Route::get("/propetyDelete_{id}", [PropertyController::class, "propetyDelete"])->name('delete');
        Route::get("/edit-{id}", [PropertyController::class, 'edit'])->name('edit');
        Route::post("/upload-{id}", [PropertyController::class, 'upload'])->name('upload');
        Route::group(['as' => 'images.', 'prefix' => 'images'], function () {
            Route::get('/{id}', [PropertyController::class, 'image'])->name('image');
            Route::post("/insert{id}", [PropertyController::class, 'insert'])->name("insert");
            Route::get("/delete/{id}", [PropertyController::class, 'deleteImage'])->name('deleteImage');
        });
    });
    Route::group(['as' => 'requests.', 'prefix' => "requests"], function () {
        Route::get("/", [RequestController::class, 'index'])->name('request');
        Route::get("/approve-host/{id}", [RequestController::class, 'approve'])->name('approve');
        Route::get('/aprrove/{id}', [RequestController::class, 'approve2'])->name('approve2');
        Route::get('/aprroveTour/{id}', [RequestController::class, 'tourApprove'])->name('tourApprove');
        Route::get('/deleteTour/{id}', [RequestController::class, 'tourDelete'])->name('tourDelete');
        Route::get('/delete/{id}', [RequestController::class, 'delete'])->name('delete');
        Route::get('/tour-details/{id}', [RequestController::class, 'tourDetails'])->name("tourDetails");
    });
    Route::group(['as' => 'blogs.', 'prefix' => 'blogs'], function () {
        Route::get('/', [AdminBlogController::class, 'index'])->name('blogs');
        Route::post("/", [AdminBlogController::class, 'blogAdd'])->name('blogAdd');
        Route::get("/edit/{id}", [AdminBlogController::class, 'editBlog'])->name('editBlog');
        Route::post("/insert/{id}", [AdminBlogController::class, 'blogEdit'])->name('blogEdit');
        Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
            Route::get('/', [AdminBlogController::class, 'category'])->name('category');
            Route::post('/', [AdminBlogController::class, 'categoryAdd'])->name('categoryAdd');
            Route::get('/delete/{id}', [AdminBlogController::class, 'categoryDelete'])->name('categoryDelete');
        });
        Route::group(['as' => 'comments.', 'prefix' => 'comments'], function () {
            Route::get('/{id}', [AdminBlogController::class, 'comments'])->name('comments');
        });
    });
});
Auth::routes();