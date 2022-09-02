<?php

use App\Http\Controllers\BackEnd\Admin\AdminHomeController;
use App\Http\Controllers\BackEnd\Admin\TaxHolderController;
use App\Http\Controllers\BackEnd\SuperAdmin\AreaController;
use App\Http\Controllers\BackEnd\SuperAdmin\UnionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'Admin'], function () {

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('adminhome');

        Route::group(['prefix' => 'TaxHolder'], function () {
            Route::get('/', [TaxHolderController::class, 'index'])->name('taxholders');
            Route::get('/loadall', [TaxHolderController::class, 'LoadAll'])->name('taxholder.loadall');
            Route::post('/store', [TaxHolderController::class, 'store'])->name('taxholder.store');
            Route::get('/show', [TaxHolderController::class, 'show'])->name('taxholder.show');
            Route::post('/update', [TaxHolderController::class, 'update'])->name('taxholder.update');
            Route::get('/dataGet', [TaxHolderController::class, 'dataGet'])->name('taxholder.dataGet');
        });
        Route::post('/update', [UnionController::class, 'Adminupdate'])->name('union.adminupdate');
        Route::group(['prefix' => 'Admin-Area'], function () {
            Route::get('/getlist/{id}', [AreaController::class, 'GetList'])->name('admin.area.getlist');
        });

    });
    Auth::routes(['register' => false]);
});
