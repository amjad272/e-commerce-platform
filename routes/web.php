<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Seller\SellerStoreController;
use App\Http\Controllers\Seller\SellerMainController;
use App\Http\Controllers\Customer\CustomerMainController;
use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\MasterSubcategoryController;

Route::get('/', function () {
    return view('welcome');
});

//  Customer Routes   // ************** //
Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::controller(CustomerMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/order/history', 'history')->name('customer.history');
            Route::get('/setting/payment', 'payment')->name('customer.payment');
            Route::get('/affiliate', 'affiliate')->name('customer.affiliate');
        });
    });
});

//  Admin Routes   // ************** //
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/settings', 'setting')->name('admin.settings');
            Route::get('/manage/users', 'manage_user')->name('admin.manage.user');
            Route::get('/manage/store', 'manage_store')->name('admin.manage.store');
            Route::get('/cart/history', 'cart_history')->name('admin.cart.history');
            Route::get('/order/history', 'order_history')->name('admin.order.history');
        });

        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category/create', 'index')->name('category.create');
            Route::get('/category/manage', 'manage')->name('category.manage');
        });

        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/sub-category/create', 'index')->name('sub-category.create');
            Route::get('/sub-category/manage', 'manage')->name('sub-category.manage');
        });

        Route::controller(ProductController::class)->group(function () {
            Route::get('/product/manage', 'index')->name('product.manage');
            Route::get('/product-review/manage', 'manage_review')->name('product-review.manage');
        });

        Route::controller(ProductAttributeController::class)->group(function () {
            Route::get('/product-attribute/create', 'index')->name('product-attribute.create');
            Route::get('/product-attribute/manage', 'manage')->name('product-attribute.manage');
            Route::post('/product-attribute/store', 'storeattribute')->name('store.attribute');
            Route::delete('/attribute/delete/{id}', 'destroy')->name('delete.attribute');
            Route::get('/attribute/edit/{id}', 'edit')->name('edit.attribute');
            Route::put('/attribute/update/{id}', 'update')->name('update.attribute');
        });

        Route::controller(DiscountController::class)->group(function () {
            Route::get('/discount/create', 'index')->name('discount.create');
            Route::get('/discount/manage', 'manage')->name('discount.manage');

        });

        Route::controller(MasterCategoryController::class)->group(function () {
            Route::post('/category/store', 'store')->name('store.cat');
            Route::delete('/category/delete/{id}', 'destroy')->name('delete.cat');
            Route::get('/category/{id}', 'edit')->name('edit.cat');
            Route::put('/category/update/{id}', 'update')->name('update.cat');
        });
        Route::controller(MasterSubcategoryController::class)->group(function () {
            Route::post('/subcategory/store', 'storesubcat')->name('store.subcat');
            Route::delete('/subcategory/delete/{id}', 'destroy')->name('delete.subcat');
            Route::get('/subcategory/edit/{id}', 'edit')->name('edit.subcat');
            Route::put('/subcategory/update/{id}', 'update')->name('update.subcat');
        });
    });
});

//   Vendor Routes   // ************** //
Route::middleware(['auth', 'verified', 'rolemanager:vendor'])->group(function () {
    Route::prefix('vendor')->group(function () {
        Route::controller(SellerMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('vendor');
            Route::get('/order-history', 'order_history')->name('seller.order-history');
        });

        Route::controller(SellerProductController::class)->group(function () {
            Route::get('/product/create', 'index')->name('seller.product.create');
            Route::get('/product/manage', 'manage')->name('seller.product.manage');
            Route::post('/product/store', 'store')->name('seller.product.store');
        });

        Route::controller(SellerStoreController::class)->group(function () {
            Route::get('/store/create', 'index')->name('seller.store.create');
            Route::get('/store/manage', 'manage')->name('seller.store.manage');
            Route::post('/store/publish', 'store')->name('seller.store.publish');
            Route::get('/store/edit/{id}', 'edit')->name('edit.store');
            Route::put('/store/update/{id}', 'update')->name('update.store');
            Route::delete('/store/delete/{id}', 'destroy')->name('delete.store');
        });
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
