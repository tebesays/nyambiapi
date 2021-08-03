<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIUsersController;
use App\Http\Controllers\APIPekerjaan;
use App\Http\Controllers\APIAlamat;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'], function () {
    // Route::post('/login', [APIUsersController::class, 'login']);
    // Route::post('/register', 'App\Http\Controllers\APIUsersController@register');
    // Route::get('/logout', [APIUsersController::class, 'logout'])->middleware('auth:api');
    // Route::get('/logout', 'App\Http\Controllers\UsersController@logout')->middleware('auth:api');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::post('/loginku', [APIUsersController::class, 'loginaku']);
Route::post('/registku', 'App\Http\Controllers\APIUsersController@registaku');

/*
|--------------------------------------------------------------------------
| Pekerjaan KURIR Routes
|--------------------------------------------------------------------------
*/

Route::post('/pekerjaan/tambah', [APIPekerjaan::class, 'AddPekerjaan'] );
Route::post('/pekerjaan/show', [APIPekerjaan::class, 'ShowPekerjaanKurir'] );
Route::post('/pekerjaan/show/history', [APIPekerjaan::class, 'ShowHistoryKurir'] );
Route::post('/pekerjaan/detail', [APIPekerjaan::class, 'ShowDetailPekerjaanKurir'] );
Route::put('/pekerjaan/terima', [APIPekerjaan::class, 'TerimaPekerjaan'] );
Route::put('/pekerjaan/konfirmasi', [APIPekerjaan::class, 'KonfirmasiSampai'] );

/*
|--------------------------------------------------------------------------
| Pekerjaan PENGIRIM Routes
|--------------------------------------------------------------------------
*/
Route::post('/pekerjaan/show/pengirim', [APIPekerjaan::class, 'ShowPekerjaanPengirim'] );


/*
|--------------------------------------------------------------------------
| Alamat Routes
|--------------------------------------------------------------------------
*/

Route::post('/alamat/tambah', [APIAlamat::class, 'addAlamatPenerima']);
Route::post('/alamat/cek', [APIAlamat::class, 'getAlamatPenerima']);



// Route::post('/login', [APIUsersController::class, 'login']);
// Route::post('/register', 'App\Http\Controllers\APIUsersController@register');
// Route::get('/logout', [APIUsersController::class, 'logout'])->middleware('auth:api');

// Route::get('/profil/{id}', [APIUsersController::class, 'index'] );
// Route::get('/history/{id}', [APIDonasiController::class, 'HistoryDonasi'] );

});
