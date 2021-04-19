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



//商品一覧画面
Route::get('item', 'App\Http\Controllers\ItemController@itemsList')->name('items.index');
Route::post('item', 'App\Http\Controllers\ItemController@postItemsList');
Route::post('itemDetail','App\Http\Controllers\ItemController@detail');

//mycart画面
Route::get('mycart', function () {
    return redirect('item');
});
//カートに入れるでpostで送られた際のルート
Route::post('mycart', 'App\Http\Controllers\ItemController@postmycart');




//検索された際のpostのルート
Route::get('items.search', 'App\Http\Controllers\ItemController@result');



//購入手続き画面へのルート
Route::post('userInformation', 'App\Http\Controllers\InformationController@userInformation')->name('userInformation');
Route::get('userInformation', function () {
    return redirect('item');
});
//購入情報確認画面
Route::post('checkInformation', 'App\Http\Controllers\InformationController@checkInformation');
Route::get('checkInformation', function () {
    return redirect('item');
});
//購入ボタンが押された時のルート
Route::post('buySuccess', 'App\Http\Controllers\InformationController@buySuccess');
Route::get('buySuccess', function () {
    return redirect('item');
});






//管理者用の商品一覧画面
Route::get('admin', 'App\Http\Controllers\AdminController@itemsList')->name('admin.items');


//管理者画面の登録、削除ボタンのpostのルート
Route::post('admin', 'App\Http\Controllers\AdminController@result');


//管理者画面の登録確認画面へのルート
Route::get('checkRegister', function () {
    return redirect('admin');
});    
Route::post('checkRegister', 'App\Http\Controllers\AdminController@checkRegister')->name('admin.checkRegister');


//管理者画面の削除確認画面へのルート
Route::get('checkDelete', function () {
    return redirect('admin');
});
Route::post('checkDelete', 'App\Http\Controllers\AdminController@checkDelete')->name('admin.checkDelete');

//管理者画面の商品編集画面へのルート
Route::get('edit', function () {
    return redirect('admin');
});
Route::post('edit','App\Http\Controllers\AdminController@edit')->name('admin.edit');
//管理者画面の商品編集確認画面へのルート
Route::get('checkEdit', function () {
    return redirect('admin');
});
Route::post('checkEdit','App\Http\Controllers\AdminController@edit');


//商品が購入された時の管理者側へのルート
Route::get('informations', function () {
    return redirect('admin');
});
Route::post('informations', 'App\Http\Controllers\AdminController@informations');


//購入情報詳細を見る
Route::post('detail', 'App\Http\Controllers\AdminController@details');
Route::get('detail', function () {
    return redirect('admin');
});
