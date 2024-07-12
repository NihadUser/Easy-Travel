<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\{
    AdminBlogController,
    AdminController,
    AdminPlaceController,
    AdminTourController,
    AdminUserController,
    PropertyController,
    RequestController,
    PlaceController,
    PlaceImageController
};

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::group(['as' => 'users.', 'prefix' => 'user'], function () {
    Route::get('/', [AdminUserController::class, 'index'])->name('index');
    Route::get('/guide-info/{id}', [AdminUserController::class, 'guideInfo'])->name('guideInfo');
    Route::get('/editRole/{id}', [AdminUserController::class, 'editRole'])->name('editRole');
    Route::post('/edit/{id}', [AdminUserController::class, 'edit'])->name('edit');
    Route::get('/block/{id}', [AdminUserController::class, 'block'])->name('block');
});
Route::group(['as' => 'bookings.', 'prefix' => 'bookings'], function () {
    Route::get('/', [AdminUserController::class, 'bookings'])->name('bookings');
});
Route::group(['as' => 'tours.', 'prefix' => 'tours'], function () {
    Route::get('/', [AdminTourController::class, 'index'])->name('index');
    Route::get('/edit/{id}', [AdminTourController::class, 'editPage'])->name('editPage');
    Route::post('/editTour/{id}', [AdminTourController::class, 'edit'])->name('edit');
});

// Route::group(['as' => '', 'prefix' => ''], function () {
//     Route::get('/places', [AdminPlaceController::class, 'index'])->name('places.index');
//     Route::post('/places', [AdminPlaceController::class, 'store'])->name('places.store');
//     Route::get('/places/{place}/edit', [AdminPlaceController::class, 'edit'])->name('places.edit');
//     Route::delete('/places/{place}', [AdminPlaceController::class, 'destroy'])->name('places.destroy');
//     Route::put('/places/{place}', [AdminPlaceController::class, 'update'])->name('places.update');
// Route::get("/images", [AdminPlaceController::class, 'index'])->name('images.index');
// Route::post("/images", [AdminPlaceController::class, 'store'])->name('image.store');
// Route::delete('/images/{image}', [AdminPlaceController::class, 'destroy'])->name('images.destroy');
// });


//Route::resources([
//    'places' => PlaceController::class,
//    'place-images' => PlaceImageController::class
//]);
Route::resource('places', PlaceController::class)->except(['show']);
Route::group(['as' => 'places.', 'prefix' => 'places/{id}'], function () {
    Route::resource('images', PlaceImageController::class)->except(['upload', 'edit', 'show']);
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

Route::get('/notfound', function () {
    return view('client.errors.404');
})->name('notfound');
