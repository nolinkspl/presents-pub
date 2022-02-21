<?php

use App\Http\Controllers\Admin\Gift\DeleteAllGifts;
use App\Http\Controllers\Admin\Gift\DownloadGiftImages;
use App\Http\Controllers\Admin\Gift\DownloadGiftReport;
use App\Http\Controllers\Admin\GiftController;
use App\Http\Controllers\Admin\GiftType\GiftTypeDelete;
use App\Http\Controllers\Admin\GiftType\GiftTypeEdit;
use App\Http\Controllers\Admin\GiftType\GiftTypeList;
use App\Http\Controllers\Admin\GiftType\GiftTypeSave;
use App\Http\Controllers\Admin\Invite\DownloadInviteReport;
use App\Http\Controllers\Admin\InviteController;
use App\Http\Controllers\LandingStubController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChooseGiftController;
use App\Http\Controllers\ReceiveGiftController;

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

Route::get('/', function () {
    return view('index');
});

//Route::get('{landing}', LandingStubController::class)->name('get.landing.stub');
//
//Route::get('{landing}/code', ChooseGiftController::class)
//    ->name('get.code-list.invite.param');
//
//Route::get('{landing}/code/{code}', ChooseGiftController::class)
//    ->name('get.code-list.invite.path-param');
//
//Route::get('{landing}/code/{code}/receive-gift', ReceiveGiftController::class . '@index')
//    ->name('receive-gift-index');
//
//Route::post('{landing}/code/{code}/receive-gift', ReceiveGiftController::class . '@handle')
//    ->name('receive-gift');

Route::get('code', ChooseGiftController::class)
    ->name('get.code-list.invite.param');

Route::get('code/{code}', ChooseGiftController::class)
    ->name('get.code-list.invite.path-param');

Route::get('code/{code}/receive-gift', ReceiveGiftController::class . '@index')
    ->name('receive-gift-index');

Route::post('code/{code}/receive-gift', ReceiveGiftController::class . '@handle')
    ->name('receive-gift');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function() {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('gift-types', GiftTypeList::class)
            ->name('admin-gift-types-list');

        Route::get('gift-types/edit', GiftTypeEdit::class)
            ->name('admin-gift-type-edit')
            ->middleware('role');

        Route::post('gift-types/save', GiftTypeSave::class)
            ->name('admin-gift-type-save')
            ->middleware('role');

        Route::delete('gift-types/delete', GiftTypeDelete::class)
            ->name('admin-gift-type-delete')
            ->middleware('role');

        Route::get('invites', InviteController::class . '@list')
            ->name('admin-invite-list');

        Route::get('invites/form', function () {return view('admin.invite.form');})
            ->name('admin-invite-form')
            ->middleware('role');

        Route::post('invites/add', InviteController::class . '@addInvites')
            ->name('admin-invite-form-post')
            ->middleware('role');

        Route::get('invites/delete', InviteController::class . '@delete')
            ->name('admin-invite-delete')
            ->middleware('role');

        Route::get('download-invites-excel', DownloadInviteReport::class)
            ->name('download-invites-excel');

        Route::get('gifts', GiftController::class . '@list')
            ->name('admin-gift-list');

        Route::get('gifts/add', GiftController::class . '@form')
            ->name('admin-gift-form')
            ->middleware('role');

        Route::post('gifts/form', GiftController::class . '@addGifts')
            ->name('admin-gift-form-post')
            ->middleware('role');

        Route::post('gifts/download-images', DownloadGiftImages::class)
            ->name('download-gift-images')
            ->middleware('role');

        Route::get('gift/delete', GiftController::class . '@delete')
            ->name('admin-gift-delete')
            ->middleware('role');

        Route::get('gift/delete-all', DeleteAllGifts::class)
            ->name('admin-gift-delete-all')
            ->middleware('role');

        Route::get('gift-stats', GiftController::class . '@stats')
            ->name('admin-gift-stats');

        Route::get('download-gifts-excel', DownloadGiftReport::class)
            ->name('download-gifts-excel');
    });
});


require __DIR__.'/auth.php';
