<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PengaduanController;
// use App\Http\Controllers\PermohonanController;
// use App\Http\Controllers\commandController;
// use App\Http\Controllers\BltBBMController;
// use App\Http\Controllers\RoleController;
// use App\Http\Controllers\UserController;
// // use App\Http\Controllers\DtksController;
// use App\Http\Controllers\DataPkhController;
// use App\Http\Controllers\DataUmkmController;
// use App\Http\Controllers\BltMinyakGorengController;
// use App\Http\Controllers\DataPbiDaerahController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\DtksController;
use Illuminate\Support\Facades\Auth;
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
Route::middleware('auth:api')->get('/user', function(Request $request) {
    return $request->user();
});
// API route for register new user
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [LoginController::class, 'register']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/refresh', [LoginController::class, 'refresh']);
    Route::get('/user-profile', [LoginController::class, 'userProfile']);    
});
// Route::group(['middleware' => ['auth:api, web'] ], function(){
//     Route::post('/login', [LoginController::class, 'login']);
//     Route::post('/register', [LoginController::class, 'register']);
//     Route::post('/logout', [LoginController::class, 'logout']);
//     Route::post('/refresh', [LoginController::class, 'refresh']);
//     Route::get('/user-profile', [LoginController::class, 'userProfile']);   
// });
// Route::group(['middleware' => ['api'], 'prefix' => 'auth'], function() {
//     Route::post('/login', [LoginController::class, 'login']);
//     Route::post('/register', [LoginController::class, 'register']);
//     Route::post('/logout', [LoginController::class, 'logout']);
//     Route::post('/refresh', [LoginController::class, 'refresh']);
//     Route::get('/user-profile', [LoginController::class, 'userProfile']);   
//   });
Route::controller(DtksController::class)->group(function(){
    Route::get('data_Dtks', 'index');
    Route::get('data_Dtks/{cari}', 'search');
    // Route::post('data-import-Dtks', 'ImportMaatwebsite')->name('data-import-Dtks');
    // Route::post('allposts', 'allPosts' )->name('allposts');
});
// Route::apiresource('Dtks', DtksController::class);
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' =>['auth']], function() {
    // Route::apiresource('roles', RoleController::class);
    // Route::apiresource('Command_Center', commandController::class);
    // Route::apiresource('users', UserController::class);
    // // Route::apiresource('Dtks', DtksController::class);
    // Route::apiresource('Data-Blt-BBM', BltBBMController::class);
    // Route::apiresource('Data-Umkm', DataUmkmController::class);
    // Route::apiresource('Data-Pkh', DataPkhController::class);
    // Route::apiresource('pengaduan-Menu', PengaduanController::class);
    // Route::apiresource('permohonan', PermohonanController::class);
    // Route::apiresource('Data-Pbi-Daerah', DataPbiDaerahController::class);
    // Route::get('/Google-Site', function () {
    //     return view('google-site.index');
    // });
    
    // Route::apiresource('Bansos', BltMinyakGorengController::class);
    // Route::get('/getEmployees', [DtksController::class, 'getEmployees'])->name('getEmployees');
    // Route::get('dtks/list', [DtksController::class, 'data'])->name('dtks.list');
 
    // Route::controller(DataUmkmController::class)->group(function(){
    //     Route::get('data-export-umkm', 'ExportData')->name('data-export-umkm');
    //     Route::post('data-import-umkm', 'importcsv')->name('data-import-umkm');
    //     // Route::post('allposts', 'allPosts' )->name('allposts');
    // });
    // Route::controller(DataPkhController::class)->group(function(){
    //     Route::get('data-export-Pkh', 'ExportData')->name('data-export-Pkh');
    //     Route::post('data-import-Pkh', 'importcsv')->name('data-import-Pkh');
    //     // Route::post('allposts', 'allPosts' )->name('allposts');
    // });
    // Route::controller(BltMinyakGorengController::class)->group(function(){
    //     Route::get('data-export-Minyak', 'ExportData')->name('data-export-Minyak');
    //     Route::post('data-import-Minyak', 'importcsv')->name('data-import-Minyak');
    //     // Route::post('allposts', 'allPosts' )->name('allposts');
    // });
    // Route::controller(BltBBMController::class)->group(function(){
    //     Route::get('data-export-BBM', 'ExportData')->name('data-export-BBM');
    //     Route::post('data-import-BBM', 'importcsv')->name('data-import-BBM');
    //     // Route::post('allposts', 'allPosts' )->name('allposts');
    // });
    // Route::controller(DataPbiDaerahController::class)->group(function(){
    //     Route::get('data-export-PBI', 'ExportData')->name('data-export-PBI');
    //     Route::post('data-import-PBI', 'importcsv')->name('data-import-PBI');
    //     // Route::post('allposts', 'allPosts' )->name('allposts');
    // });
    
// });