<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
Route::get('/email', [App\Http\Controllers\EmailController::class, 'create']);
Route::post('/email', [App\Http\Controllers\EmailController::class, 'sendEmail'])->name('send.email');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');


Route::get('/contact/send','App\Http\Controllers\ContactController@index')->name('contact.send');
// Routes du panier
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

// Routes accessibles uniquement aux utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});

// Routes d'authentification
Auth::routes();

// Routes publiques accessibles à tous les utilisateurs
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
Route::get('/skoda', 'App\Http\Controllers\SkodaController@index')->name("skoda.index");
Route::get('/skoda/{id}', 'App\Http\Controllers\SkodaController@show')->name("skoda.show");
Route::get('/seat', 'App\Http\Controllers\SeatController@index')->name("seat.index");
Route::get('/seat/{id}', 'App\Http\Controllers\SeatController@show')->name("seat.show");
Route::get('/cupra', 'App\Http\Controllers\CupraController@index')->name("cupra.index");
Route::get('/cupra/{id}', 'App\Http\Controllers\CupraController@show')->name("cupra.show");
Route::get('/audi', 'App\Http\Controllers\AudiController@index')->name("audi.index");
Route::get('/audi/{id}', 'App\Http\Controllers\AudiController@show')->name("audi.show");
Route::get('/volkswagen', 'App\Http\Controllers\VolkswagenController@index')->name("volkswagen.index");
Route::get('/volkswagen/{id}', 'App\Http\Controllers\VolkswagenController@show')->name("volkswagen.show");

// Routes admin
Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    
    // Routes admin pour les produits
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");

    // Routes admin pour Skoda
    Route::get('/admin/skoda', 'App\Http\Controllers\Admin\AdminSkodaController@index')->name("admin.skoda.index");
    Route::post('/admin/skoda/store', 'App\Http\Controllers\Admin\AdminSkodaController@store')->name("admin.skoda.store");
    Route::delete('/admin/skoda/{id}/delete', 'App\Http\Controllers\Admin\AdminSkodaController@delete')->name("admin.skoda.delete");
    Route::get('/admin/skoda/{id}/edit', 'App\Http\Controllers\Admin\AdminSkodaController@edit')->name("admin.skoda.edit");
    Route::put('/admin/skoda/{id}/update', 'App\Http\Controllers\Admin\AdminSkodaController@update')->name("admin.skoda.update");

    // Routes admin pour Seat
    Route::get('/admin/seat', 'App\Http\Controllers\Admin\AdminSeatController@index')->name("admin.seat.index");
    Route::post('/admin/seat/store', 'App\Http\Controllers\Admin\AdminSeatController@store')->name("admin.seat.store");
    Route::delete('/admin/seat/{id}/delete', 'App\Http\Controllers\Admin\AdminSeatController@delete')->name("admin.seat.delete");
    Route::get('/admin/seat/{id}/edit', 'App\Http\Controllers\Admin\AdminSeatController@edit')->name("admin.seat.edit");
    Route::put('/admin/seat/{id}/update', 'App\Http\Controllers\Admin\AdminSeatController@update')->name("admin.seat.update");

    // Routes admin pour Cupra
    Route::get('/admin/cupra', 'App\Http\Controllers\Admin\AdminCupraController@index')->name("admin.cupra.index");
    Route::post('/admin/cupra/store', 'App\Http\Controllers\Admin\AdminCupraController@store')->name("admin.cupra.store");
    Route::delete('/admin/cupra/{id}/delete', 'App\Http\Controllers\Admin\AdminCupraController@delete')->name("admin.cupra.delete");
    Route::get('/admin/cupra/{id}/edit', 'App\Http\Controllers\Admin\AdminCupraController@edit')->name("admin.cupra.edit");
    Route::put('/admin/cupra/{id}/update', 'App\Http\Controllers\Admin\AdminCupraController@update')->name("admin.cupra.update");

    // Routes admin pour Audi
    Route::get('/admin/audi', 'App\Http\Controllers\Admin\AdminAudiController@index')->name("admin.audi.index");
    Route::post('/admin/audi/store', 'App\Http\Controllers\Admin\AdminAudiController@store')->name("admin.audi.store");
    Route::delete('/admin/audi/{id}/delete', 'App\Http\Controllers\Admin\AdminAudiController@delete')->name("admin.audi.delete");
    Route::get('/admin/audi/{id}/edit', 'App\Http\Controllers\Admin\AdminAudiController@edit')->name("admin.audi.edit");
    Route::put('/admin/audi/{id}/update', 'App\Http\Controllers\Admin\AdminAudiController@update')->name("admin.audi.update");

    // Routes admin pour Volkswagen
    Route::get('/admin/volkswagen', 'App\Http\Controllers\Admin\AdminVolkswagenController@index')->name("admin.volkswagen.index");
    Route::post('/admin/volkswagen/store', 'App\Http\Controllers\Admin\AdminVolkswagenController@store')->name("admin.volkswagen.store");
    Route::delete('/admin/volkswagen/{id}/delete', 'App\Http\Controllers\Admin\AdminVolkswagenController@delete')->name("admin.volkswagen.delete");
    Route::get('/admin/volkswagen/{id}/edit', 'App\Http\Controllers\Admin\AdminVolkswagenController@edit')->name("admin.volkswagen.edit");
    Route::put('/admin/volkswagen/{id}/update', 'App\Http\Controllers\Admin\AdminVolkswagenController@update')->name("admin.volkswagen.update");
});
