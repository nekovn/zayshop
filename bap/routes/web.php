<?php

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
//////////////////////////////
// システム設定
// middleware:sau khi login
//////////////////////////////

//Route::get('/', function () {
//    return view('user.index.js');
//});


//Route::middleware(['admin:admin'])->group(function () {
Route::get('admin/js/app.config.js', 'AppConfigController@index');
//    Route::get('js/app-config-js', 'AppConfigController@index.js');
//});
//
//Route::middleware(['admin:client'])->group(function () {
//    Route::get('js/app-config-client.js', 'AppConfigController@index.js');
//});

//////////////////////////////
// 会員機能のルーティング定義 (Folder: Member)
//////////////////////////////

Route::group(['namespace' => 'Client', 'domain' => config('app.members_domain')], function () {
    //ホームページ
    Route::get('/', 'ClientHomeController@home')->name('client.home');
    Route::get('/alert', function () {
        return view('client.alert');
    })->name('client.alert');
    Route::get('/single-detail', 'ClientSingleDetailController@singleDetail')->name('client.single-detail');
    Route::get('/detail', 'ClientDetailController@detail')->name('client.detail');
    Route::get('/share-house', 'ClientShareHouseController@shareHouse')->name('client.share-house');
    Route::get('/contact', 'ClientContactController@contact')->name('client.contact');
    Route::post('/sendmail', 'ClientContactController@sendmail')->name('client.sendmail');
    Route::get('/about', 'ClientAboutController@about')->name('client.about');


    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('client.login');
        Route::post('/login', 'LoginController@login')->name('client.login.submit');


        //パスワード 再発行
        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('client.password.email');
        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('client.password.request');
        Route::post('/password/reset', 'ResetPasswordController@reset')->name('client.password.reset.submit');
        Route::get('/password/reset/{token}/{email}', 'ResetPasswordController@showResetForm')->name('client.password.reset');

    });

    Route::get('/reserve', 'ClientReserveController@reserve')->name('client.reserve');
    Route::group(['prefix' => 'members'], function () {
        //マイページトップ
        Route::get('info', 'MembersController@info')->name('members.info');
        Route::get('account', 'MembersController@account')->name('members.account');
        Route::get('avatar', 'MembersController@avatar')->name('members.avatar');
        Route::get('room', 'MembersController@room')->name('members.room');
        Route::get('pay', 'MembersController@pay')->name('members.pay');
        Route::get('history', 'MembersController@history')->name('members.history');
        Route::get('notify', 'MembersController@notify')->name('members.notify');
        Route::get('utility', 'MembersController@utility')->name('members.utility');
        Route::get('policy', 'MembersController@policy')->name('members.policy');
        // 会員情報変更
        Route::get('edit', 'MembersController@edit')->name('members.edit');
        Route::get('update', 'MembersController@update')->name('members.update');

    });


    // 認証後
    Route::middleware(['admin:client'])->group(function () {
        //会員ページ
        Route::group(['prefix' => 'members'], function () {
            //マイページトップ
            Route::get('home', 'MembersController@home')->name('members.home');
            // 会員情報変更
            Route::get('edit', 'MembersController@edit')->name('members.edit');
            Route::get('update', 'MembersController@update')->name('members.update');
        });

    });
});

//Adminログイン (Admin/LoginController)
Route::group(['namespace' => 'Admin','as' => 'admin.', 'prefix' => 'admin'], function () {

    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.submit');
        //2回認証 OTP
        Route::get('verify', 'TwoFactorController@index')->name('verify.index');
        Route::post('verify', 'TwoFactorController@store')->name('verify.store');
        //再発行コードOTP
        Route::get('verify/resend', 'TwoFactorController@resend')->name('verify.resend');
    });

    // 認証後
    Route::middleware(['auth:admin', 'twofactor'])->group(function () {
        Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
        Route::get('/client', 'ClientController@client')->name('client');
        Route::get('/admin', 'AuthController@admin')->name('admin');

        //===========room============
        Route::group(['prefix' => 'room'], function () {
            Route::get('', 'RoomController@room')->name('room');
            Route::post('search', 'RoomController@search')->name('room.search');
            Route::post('get-status', 'RoomController@getStatus')->name('room.get.status');
            Route::post('change-status', 'RoomController@changeStatus')->name('room.change.status');
            Route::post('delete', 'RoomController@delete')->name('room.delete');
            Route::post('open', 'RoomController@open')->name('room.open');
            Route::get('open-create', 'RoomController@openCreate')->name('room.open.create');
            Route::get('open-edit', 'RoomController@openEdit')->name('room.open.edit');
            Route::post('sort', 'RoomController@sort')->name('room.sort');
            Route::post('edit', 'RoomController@edit')->name('room.edit');
            Route::post('create', 'RoomController@create')->name('room.create');
        });

        //===========client============
        Route::group(['prefix' => 'client'], function () {
            Route::get('', 'ClientController@client')->name('client');
            Route::post('search', 'ClientController@search')->name('client.search');
            Route::post('get-status', 'ClientController@getStatus')->name('client.get.status');
            Route::post('change-status', 'ClientController@changeStatus')->name('client.change.status');
            Route::post('delete', 'ClientController@delete')->name('client.delete');
            Route::post('open', 'ClientController@open')->name('client.open');
            Route::get('open-create', 'ClientController@openCreate')->name('client.open.create');
            Route::get('open-edit', 'ClientController@openEdit')->name('client.open.edit');
            Route::post('sort', 'ClientController@sort')->name('client.sort');
            Route::post('edit', 'ClientController@edit')->name('client.edit');
            Route::post('create', 'ClientController@create')->name('client.create');
        });


        Route::get('/invoices', 'InvoicesController@invoices')->name('invoices');
        Route::get('/waiting', 'WaitingController@waiting')->name('waiting');

        //===========contact============
        Route::group(['prefix' => 'contact'], function () {
            Route::get('', 'ContactController@contact')->name('contact');
            Route::post('search', 'ContactController@search')->name('contact.search');
            Route::post('get-status', 'ContactController@getStatus')->name('contact.get.status');
            Route::post('change-status', 'ContactController@changeStatus')->name('contact.change.status');
            Route::post('sort', 'ContactController@sort')->name('contact.sort');
            Route::post('delete', 'ContactController@delete')->name('contact.delete');
            Route::post('open', 'ContactController@open')->name('contact.open');
            Route::post('open-sendmail', 'ContactController@openSendMail')->name('contact.open.sendmail');
            Route::post('sendmail', 'ContactController@sendMail')->name('contact.sendmail');
        });
        //==========log==============
        Route::group(['prefix' => 'log'], function () {
            Route::get('', 'LogController@log')->name('log');
            Route::post('search', 'LogController@search')->name('log.search');
            Route::post('delete', 'LogController@delete')->name('log.delete');
            Route::post('open', 'LogController@open')->name('log.open');
            Route::post('sort', 'LogController@sort')->name('log.sort');
        });
        //==========banner===========
        Route::group(['prefix' => 'banner'], function () {
            Route::get('', 'BannerController@banner')->name('banner');
            Route::post('search', 'BannerController@search')->name('banner.search');
            Route::post('get-status', 'BannerController@getStatus')->name('banner.get.status');
            Route::post('change-status', 'BannerController@changeStatus')->name('banner.change.status');
            Route::post('delete', 'BannerController@delete')->name('banner.delete');
            Route::post('open', 'BannerController@open')->name('banner.open');
            Route::get('open-create', 'BannerController@openCreate')->name('banner.open.create');
            Route::get('open-edit', 'BannerController@openEdit')->name('banner.open.edit');
            Route::post('sort', 'BannerController@sort')->name('banner.sort');
            Route::post('edit', 'BannerController@edit')->name('banner.edit');
            Route::post('create', 'BannerController@create')->name('banner.create');
        });
        Route::get('/notification', 'NotificationController@notification')->name('notification');
        Route::get('/book-room', 'BookRoomController@bookRoom')->name('book-room');
        Route::get('/banner', 'BannerController@banner')->name('banner');
        Route::get('/news', 'NewsController@news')->name('news');
        Route::get('/gold', 'GoldController@gold')->name('gold');
        Route::get('/exchange', 'ExchangeController@exchange')->name('exchange');
    });
});
