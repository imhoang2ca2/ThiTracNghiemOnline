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

Route::get('/', function () {
    return view('welcome');
});

// Sửa đường dẫn trang chủ mặc định
  
// Đăng nhập và xử lý đăng nhập
Route::get('/login', 'Auth\LoginController@getLogin')->name('get.login');
Route::get('/', 'HomeController@index')->name('user.home');
Route::get('/course/detail/{id}', 'HomeController@detail')->name('course.detail');
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);

Route::get('/register', 'Auth\RegisterController@register')->name('get.register');
Route::post('post/register', 'Auth\RegisterController@postRegister')->name('post.register');
// Đăng xuất
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LogoutController@getLogout']);

//deatil
Route::group(['middleware' => ['user']], function() {
    Route::get('detail', 'DetailController@getDetail')->name('detail');
    Route::get('vao-thi/{id}', 'DetailController@getDeThi')->name('vaothi');
    Route::post('tra-loi/{made}/{id}', 'DetailController@traLoi')->name('traloide');

    Route::get('danh-sach-lich-thi', 'LichThiController@index')->name('danhsachlichthi');
    Route::get('/tao-lich', 'LichThiController@create')->name('taolich');
    Route::post('/tao-lich', 'LichThiController@store');
    Route::get('/chinh-sua-lich/{id}', 'LichThiController@edit')->name('chinhsualich');
    Route::post('/chinh-sua-lich/{id}', 'LichThiController@update');
    Route::get('xoa-lich/{id}', 'LichThiController@destroy')->name('xoalich');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::group(['namespace' => 'Auth'], function() {
        Route::get('/login', 'LoginController@login')->name('admin.login');
        Route::post('/login', 'LoginController@postLogin');
        Route::get('/logout', 'LoginController@logout')->name('user.logout');
    });

    Route::group(['middleware' =>['admin']], function() {
        Route::get('/home/index', 'HomeController@index')->name('home.index');

        Route::group(['prefix' => 'mon-hoc'], function(){
            Route::get('/','MonHocController@index')->name('mon.hoc.index');

            Route::get('/create','MonHocController@create')->name('mon.hoc.create');
            Route::post('/create','MonHocController@store');

            Route::get('/update/{id}','MonHocController@edit')->name('mon.hoc.update');
            Route::post('/update/{id}','MonHocController@update');

            Route::get('/delete/{id}','MonHocController@destroy')->name('mon.hoc.delete');
        });

        Route::group(['prefix' => 'cau-hoi'], function(){
            Route::get('/','CauHoiController@index')->name('cau.hoi.index');

            Route::get('/create','CauHoiController@create')->name('cau.hoi.create');
            Route::post('/create','CauHoiController@store');

            Route::get('/update/{id}','CauHoiController@edit')->name('cau.hoi.update');
            Route::post('/update/{id}','CauHoiController@update');

            Route::get('/delete/{id}','CauHoiController@destroy')->name('cau.hoi.delete');
        });

        Route::group(['prefix' => 'lich-thi'], function(){
            Route::get('/','LichThiController@index')->name('lich.thi.index');

            Route::get('/create','LichThiController@create')->name('lich.thi.create');
            Route::post('/create','LichThiController@store');

            Route::get('/update/{id}','LichThiController@edit')->name('lich.thi.update');
            Route::post('/update/{id}','LichThiController@update');

            Route::get('/delete/{id}','LichThiController@destroy')->name('lich.thi.delete');
        });
        Route::group(['prefix' => 'hoc-sinh'], function(){
            Route::get('/','HocSinhController@index')->name('hoc.sinh.index');
            Route::get('/create','HocSinhController@create')->name('hoc.sinh.create');
            Route::post('/create','HocSinhController@store');

            Route::get('/update/{id}','HocSinhController@edit')->name('hoc.sinh.update');
            Route::post('/update/{id}','HocSinhController@update');

            Route::get('/delete/{id}','HocSinhController@destroy')->name('hoc.sinh.delete');

        });
        Route::group(['prefix' => 'danh-sach-sinh-vien'], function(){
            Route::get('/{id}','LichThiController@danhSach')->name('danh.sach.sinh.vien');
        });
        Route::get('bai-lam/{id}/{made}','LichThiController@getDeThi')->name('bai.lam');
    });
});