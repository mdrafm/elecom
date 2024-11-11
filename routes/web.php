<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\Seller\SellerMainController;
use App\Http\Controllers\Seller\SellerStoreCntroller;
use App\Http\Controllers\Seller\SellerProductCntroller;
use App\Http\Controllers\Customer\CustomerMainController;
use App\Http\Controllers\MasterCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//admin routing

Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
           Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard','index')->name('admin');
            Route::get('/manage/user','manage_user')->name('admin.manage.user');
            Route::get('/setting','setting')->name('admin.setting');
            Route::get('/manage/store','manage_store')->name('admin.setting.manage.store');
            Route::get('/cart/history','cart_history')->name('admin.cart.history');
            Route::get('/order/history','order_history')->name('admin.order.history');
        });
        Route::controller(CategoryController::class)->group(function () {

            Route::get('/category/create','index')->name('category.create');
            Route::get('/category/manage','manage')->name('category.manage');
        });
        Route::controller(SubCategoryController::class)->group(function () {

            Route::get('/subcategory/create','index')->name('subcategory.create');
            Route::get('/subcategory/manage','manage')->name('subcategory.manage');
        });
        Route::controller(ProductController::class)->group(function () {

            Route::get('/product/manage','index')->name('product.manage');
            Route::get('/product/review/manage','review_manage')->name('product.review.manage');
        });
        Route::controller(ProductAttributeController::class)->group(function () {

            Route::get('/product_attribute','index')->name('productattribute.create');
            Route::get('/product_attribute/manage','manage')->name('product_attribute.manage');
        });
        Route::controller(ProductDiscountController::class)->group(function () {

            Route::get('/discount','index')->name('discount.create');
            Route::get('/discount/manage','manage')->name('discount.manage');
        });
        Route::controller(ProductDiscountController::class)->group(function () {

            Route::get('/discount','index')->name('discount.create');
            Route::get('/discount/manage','manage')->name('discount.manage');
        });

        Route::controller(MasterCategoryController::class)->group(function () {

            Route::post('/store/category','storecat')->name('store.cat');
            Route::get('/category/{id}','showcat')->name('show.cat');
            Route::put('/category/update/{id}','updatecat')->name('update.cat');
            Route::delete('/category/delete/{id}','deletecat')->name('delete.cat');
           
        });
    });
});
//vendor routing
Route::middleware(['auth', 'verified', 'rolemanager:vendor'])->group(function () {
    Route::prefix('vendor')->group(function () {
           Route::controller(SellerMainController::class)->group(function () {
            Route::get('/dashboard','index')->name('vendor');
            Route::get('/order/history','orderHistory')->name('vendor.order.history');
        });

        Route::controller(SellerStoreCntroller::class)->group(function () {
            Route::get('/store/create','index')->name('vendor.store');
            Route::get('/store/manage','manage')->name('vendor.store.manage');
        });
        Route::controller(SellerProductCntroller::class)->group(function () {
            Route::get('/product/create','index')->name('vendor.product');
            Route::get('/product/manage','manage')->name('vendor.product.manage');
        });

    });
});
//customer routing
Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function () {
    Route::prefix('customer')->group(function () {
           Route::controller(CustomerMainController::class)->group(function () {
            Route::get('/dashboard','index')->name('dashboard');
            Route::get('/order/history','history')->name('customer.history');
            Route::get('/setting/payment','payment')->name('customer.payment');
            Route::get('/affiliate','affiliate')->name('customer.affiliate');
        });

    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
