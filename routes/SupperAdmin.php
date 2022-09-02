<?php

use App\Http\Controllers\BackEnd\Admin\TaxHolderController;
use App\Http\Controllers\BackEnd\SuperAdmin\AboutUsController;
use App\Http\Controllers\BackEnd\SuperAdmin\AdminLoginController;
use App\Http\Controllers\BackEnd\SuperAdmin\AdminResetPasswordController;
use App\Http\Controllers\BackEnd\SuperAdmin\AdminUserController;
use App\Http\Controllers\BackEnd\SuperAdmin\AdminUserProfileController;
use App\Http\Controllers\BackEnd\SuperAdmin\AreaController;
use App\Http\Controllers\BackEnd\SuperAdmin\DistrictController;
use App\Http\Controllers\BackEnd\SuperAdmin\menuController;
use App\Http\Controllers\BackEnd\SuperAdmin\NoticeController;
use App\Http\Controllers\BackEnd\SuperAdmin\PageController;
use App\Http\Controllers\BackEnd\SuperAdmin\seitesettingController;
use App\Http\Controllers\BackEnd\SuperAdmin\StateController;
use App\Http\Controllers\BackEnd\SuperAdmin\SuperAdminHomeController;
use App\Http\Controllers\BackEnd\SuperAdmin\UnionController;
use App\Http\Controllers\BackEnd\SuperAdmin\UnionUserController;
use App\Http\Controllers\BackEnd\SuperAdmin\UpazilaController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'SuperAdmin'], function () {
//Login
    Route::get('Adminlogin', [AdminLoginController::class, 'showLoginFrom'])->name('admin.login');
    Route::post('Adminlogin', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('Adminlogout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth:admin', 'verified']], function () {
        //Home
        Route::get('/', [SuperAdminHomeController::class, 'index'])->name('admin.home');
        //admin user
        Route::group(['prefix' => 'Admin'], function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('admins');
            Route::get('/create', [AdminUserController::class, 'create'])->name('admin.create');
            Route::post('/store', [AdminUserController::class, 'store'])->name('admin.store');
            Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.edit');
            Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('admin.update');
            Route::get('/loadall', [AdminUserController::class, 'LoadAll'])->name('admin.loadall');
            Route::post('/delete/{id}', [AdminUserController::class, 'destroy'])->name('admin.delete');

        });

        Route::group(['prefix' => 'Reset-Password'], function () {
            Route::get('/', [AdminResetPasswordController::class, 'index'])->name('admin.reset.password');
            Route::post('reset-password', [AdminResetPasswordController::class, 'updatePassword'])->name('admin.reset.update');
        });

        Route::group(['prefix' => 'UserProfile'], function () {
            Route::get('/profile', [AdminUserProfileController::class, 'Profile'])->name('admin.profile');
            Route::post('/ImageChange', [AdminUserProfileController::class, 'ImageChange'])->name('admin.ImageChange');
        });

        //State Router
        Route::group(['prefix' => 'State'], function () {
            Route::get('/', [StateController::class, 'index'])->name('states');
            Route::get('/loadall', [StateController::class, 'LoadAll'])->name('state.loadall');
            Route::post('/store', [StateController::class, 'store'])->name('state.store');
            Route::post('/delete/{id}', [StateController::class, 'destroy'])->name('state.delete');
            Route::get('/show', [StateController::class, 'show'])->name('state.show');
            Route::post('/update', [StateController::class, 'update'])->name('state.update');
            Route::get('/active/{id}', [StateController::class, 'Active'])->name('state.active');
            Route::get('/inactive/{id}', [StateController::class, 'InActive'])->name('state.inactive');
            Route::get('/getlist', [StateController::class, 'GetList'])->name('state.getlist');
        });

        //District Router
        Route::group(['prefix' => 'District'], function () {
            Route::get('/', [DistrictController::class, 'index'])->name('districts');
            Route::get('/loadall', [DistrictController::class, 'LoadAll'])->name('district.loadall');
            Route::post('/store', [DistrictController::class, 'store'])->name('district.store');
            Route::post('/delete/{id}', [DistrictController::class, 'destroy'])->name('district.delete');
            Route::get('/show', [DistrictController::class, 'show'])->name('district.show');
            Route::post('/update', [DistrictController::class, 'update'])->name('district.update');
            Route::get('/active/{id}', [DistrictController::class, 'Active'])->name('district.active');
            Route::get('/inactive/{id}', [DistrictController::class, 'InActive'])->name('district.inactive');
            Route::get('/getlist/{id}', [DistrictController::class, 'GetList'])->name('district.getlist');
        });

        //District Router
        Route::group(['prefix' => 'Upazila'], function () {
            Route::get('/', [UpazilaController::class, 'index'])->name('upazilas');
            Route::get('/loadall', [UpazilaController::class, 'LoadAll'])->name('upazila.loadall');
            Route::post('/store', [UpazilaController::class, 'store'])->name('upazila.store');
            Route::post('/delete/{id}', [UpazilaController::class, 'destroy'])->name('upazila.delete');
            Route::get('/show', [UpazilaController::class, 'show'])->name('upazila.show');
            Route::post('/update', [UpazilaController::class, 'update'])->name('upazila.update');
            Route::get('/active/{id}', [UpazilaController::class, 'Active'])->name('upazila.active');
            Route::get('/inactive/{id}', [UpazilaController::class, 'InActive'])->name('upazila.inactive');
            Route::get('/getlist/{id}', [UpazilaController::class, 'GetList'])->name('upazila.getlist');
        });

        //Union Router
        Route::group(['prefix' => 'Union'], function () {
            Route::get('/', [UnionController::class, 'index'])->name('unions');
            Route::get('/loadall', [UnionController::class, 'LoadAll'])->name('union.loadall');
            Route::post('/store', [UnionController::class, 'store'])->name('union.store');
            Route::post('/delete/{id}', [UnionController::class, 'destroy'])->name('union.delete');
            Route::get('/show', [UnionController::class, 'show'])->name('union.show');
            Route::post('/update', [UnionController::class, 'update'])->name('union.update');
            Route::get('/active/{id}', [UnionController::class, 'Active'])->name('union.active');
            Route::get('/inactive/{id}', [UnionController::class, 'InActive'])->name('union.inactive');
            Route::get('/getlist/{id}', [UnionController::class, 'GetList'])->name('union.getlist');
        });
        //Area Router
        Route::group(['prefix' => 'Area'], function () {
            Route::get('/', [AreaController::class, 'index'])->name('areas');
            Route::get('/loadall', [AreaController::class, 'LoadAll'])->name('area.loadall');
            Route::post('/store', [AreaController::class, 'store'])->name('area.store');
            Route::post('/delete/{id}', [AreaController::class, 'destroy'])->name('area.delete');
            Route::get('/show', [AreaController::class, 'show'])->name('area.show');
            Route::post('/update', [AreaController::class, 'update'])->name('area.update');
            Route::get('/active/{id}', [AreaController::class, 'Active'])->name('area.active');
            Route::get('/inactive/{id}', [AreaController::class, 'InActive'])->name('area.inactive');
            Route::get('/getlist/{id}', [AreaController::class, 'GetList'])->name('area.getlist');
        });
        Route::group(['prefix' => 'Union-User'], function () {
            Route::get('/', [UnionUserController::class, 'index'])->name('unionusers');
            Route::get('/create', [UnionUserController::class, 'create'])->name('unionuser.create');
            Route::post('/store', [UnionUserController::class, 'store'])->name('unionuser.store');
            Route::get('/edit/{id}', [UnionUserController::class, 'edit'])->name('unionuser.edit');
            Route::post('/update/{id}', [UnionUserController::class, 'update'])->name('unionuser.update');
            Route::get('/loadall', [UnionUserController::class, 'LoadAll'])->name('unionuser.loadall');
            Route::post('/delete/{id}', [UnionUserController::class, 'destroy'])->name('unionuser.delete');
            Route::get('/active/{id}', [UnionUserController::class, 'Active'])->name('unionuser.active');
            Route::get('/inactive/{id}', [UnionUserController::class, 'InActive'])->name('unionuser.inactive');
        });
        Route::group(['prefix' => 'Tax-Holder'], function () {
            Route::get('/', [TaxHolderController::class, 'TaxHolder'])->name('superadmin.taxholders');
            Route::get('/loadall', [TaxHolderController::class, 'SuperAdminLoadAll'])->name('superadmin.taxholder.loadall');
            Route::get('/show', [TaxHolderController::class, 'show'])->name('superadmin.taxholder.show');
            Route::post('/update', [TaxHolderController::class, 'update'])->name('superadmin.taxholder.update');
            Route::post('/delete/{id}', [TaxHolderController::class, 'destroy'])->name('superadmin.taxholder.delete');
        });

        Route::group(['prefix' => 'Page'], function () {
            Route::get('/', [PageController::class, 'index'])->name('pages');
            Route::get('/loadall', [PageController::class, 'LoadAll'])->name('page.loadall');
            Route::get('/create', [PageController::class, 'create'])->name('page.create');
            Route::post('/store', [PageController::class, 'store'])->name('page.store');
            Route::get('/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
            Route::post('/update', [PageController::class, 'update'])->name('page.update');
            Route::delete('/delete/{id}', [PageController::class, 'destroy'])->name('page.delete');
            Route::get('/GetList', [PageController::class, 'GetList'])->name('page.getlist');
        });
        Route::group(['prefix' => 'Notice'], function () {
            Route::get('/', [NoticeController::class, 'index'])->name('notices');
            Route::get('/loadall', [NoticeController::class, 'LoadAll'])->name('notice.loadall');
            Route::get('/create', [NoticeController::class, 'create'])->name('notice.create');
            Route::post('/store', [NoticeController::class, 'store'])->name('notice.store');
            Route::get('/edit/{id}', [NoticeController::class, 'edit'])->name('notice.edit');
            Route::post('/update', [NoticeController::class, 'update'])->name('notice.update');
            Route::delete('/delete/{id}', [NoticeController::class, 'destroy'])->name('notice.delete');

        });
        Route::group(['prefix' => 'About-Us'], function () {
            Route::get('/', [AboutUsController::class, 'index'])->name('aboutuses');
            Route::get('/loadall', [AboutUsController::class, 'LoadAll'])->name('aboutus.loadall');
            Route::get('/create', [AboutUsController::class, 'create'])->name('aboutus.create');
            Route::post('/store', [AboutUsController::class, 'store'])->name('aboutus.store');
            Route::get('/edit/{id}', [AboutUsController::class, 'edit'])->name('aboutus.edit');
            Route::post('/update', [AboutUsController::class, 'update'])->name('aboutus.update');
            Route::delete('/delete/{id}', [AboutUsController::class, 'destroy'])->name('aboutus.delete');
        });

/*         Route::group(['prefix' => 'Post'], function () {
Route::get('/', [postController::class, 'index'])->name('posts');
Route::get('/loadall', [postController::class, 'LoadAll'])->name('post.loadall');
Route::get('/create', [postController::class, 'create'])->name('post.create');
Route::post('/store', [postController::class, 'store'])->name('post.store');
Route::get('/edit/{id}', [postController::class, 'edit'])->name('post.edit');
Route::post('/update', [postController::class, 'update'])->name('post.update');
Route::delete('/delete/{id}', [postController::class, 'destroy'])->name('post.delete');

}); */

        Route::group(['prefix' => 'menu'], function () {
            Route::get('/', [menuController::class, 'index'])->name('menus');
            Route::get('/loadall', [menuController::class, 'LoadAll'])->name('menu.loadall');
            Route::post('/store', [menuController::class, 'store'])->name('menu.store');
            Route::get('/show', [menuController::class, 'show'])->name('menu.show');
            Route::post('/update', [menuController::class, 'update'])->name('menu.update');
            Route::delete('/delete/{id}', [menuController::class, 'destroy'])->name('menu.delete');
        });

        Route::group(['prefix' => 'General-Setting'], function () {
            Route::get('/show', [seitesettingController::class, 'show'])->name('general.show');
            Route::post('/update', [seitesettingController::class, 'update'])->name('general.update');

        });
    });

});
