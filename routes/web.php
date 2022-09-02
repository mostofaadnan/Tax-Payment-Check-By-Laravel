<?php

use App\Http\Controllers\FrontEnd\AreaViewController;
use App\Http\Controllers\FrontEnd\FrontPageController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\NoticeViewController;
use App\Http\Controllers\FrontEnd\TaxHolderProfileController;
use App\Http\Controllers\FrontEnd\UnionViewController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->name('fronthome');
Route::get('/getStatelist', [HomeController::class, 'StateList'])->name('homestate.getlist');
Route::get('/getDistrictlist/{id}', [HomeController::class, 'DistrictList']);
Route::get('/getUpazilatlist/{id}', [HomeController::class, 'UpazilaList']);
Route::get('/getUnionlist/{id}', [HomeController::class, 'UnionList']);
Route::get('/getArealist/{id}', [HomeController::class, 'AreaList']);
Route::get('/getNoticelist', [HomeController::class, 'GetNoticeList'])->name('homestate.getNoticelist');

Route::group(['prefix' => 'Notice-Details'], function () {
    Route::get('/', [NoticeViewController::class, 'index'])->name('front.notices');
    Route::get('/Details/{id}', [NoticeViewController::class, 'NoticeDetails'])->name('front.notice.details');
});

Route::group(['prefix' => 'Union'], function () {
    Route::get('/', [UnionViewController::class, 'index'])->name('front.unions');
    Route::get('/Details/{id}', [UnionViewController::class, 'UnionDetails'])->name('front.union.details');
    Route::get('/TaxHolderLoadAll/{id}', [UnionViewController::class, 'TaxHolderLoadAll'])->name('front.union.TaxHolderLoadAll');
    Route::get('/pdf/{id}', [UnionViewController::class, 'Pdf'])->name('front.union.pdf');

});
Route::group(['prefix' => 'Area'], function () {
    Route::get('/{id}', [AreaViewController::class, 'index'])->name('front.area.details');
    Route::get('/TaxHolderLoadAllArea/{id}', [AreaViewController::class, 'TaxHolderLoadAllArea']);
    Route::get('/pdf/{id}', [AreaViewController::class, 'Pdf'])->name('front.area.pdf');

});
Route::group(['prefix' => 'Tax-Payer'], function () {
    Route::get('/', [TaxHolderProfileController::class, 'Profile'])->name('front.taxholder.profile');
    Route::get('/pdf', [TaxHolderProfileController::class, 'Pdf'])->name('front.taxpayment.profile.Pdf');
});

Route::group(['prefix' => 'Pages'], function () {
    Route::get('/Contact-Us', [FrontPageController::class, 'contactUs'])->name('front.page.contactus');
    Route::get('/About-Us', [FrontPageController::class, 'AboutUs'])->name('front.page.aboutus');
    Route::post('/Contact-Us', [FrontPageController::class, 'ContactUsStore'])->name('front.page.contactus.store');
});

//Admin
include 'SupperAdmin.php';
include 'Admin.php';
