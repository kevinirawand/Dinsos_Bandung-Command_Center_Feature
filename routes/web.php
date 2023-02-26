<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\commandController;
use App\Http\Controllers\BltBBMController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DtksController;
use App\Http\Controllers\DataPkhController;
use App\Http\Controllers\DataUmkmController;
use App\Http\Controllers\BltMinyakGorengController;
use App\Http\Controllers\DataPbiDaerahController;
use App\Http\Controllers\DataPpksController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\contohController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Search;

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

Route::get('/loginadmin', function () {
    return view('auth.login');
});
Route::get('/command-center/landing-Page', function () {
    return view('command.command'); 
})->name('command_center');
// Route::get('/command-center/landing_Page', function () {
//     return view('command.command'); 
// })->name('command_center.command');
Route::get('/', [LandingPageController::class, 'index'])->name('wow.data');
Route::post('post/data', [LandingPageController::class, 'data'])->name('post.data');
// Route::post('allposts', 'LandingPageController@data' )->name('allposts');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' =>['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('Command_Center', commandController::class);
    Route::resource('users', UserController::class);
    Route::resource('Dtks', DtksController::class);
    Route::resource('Data-Blt-BBM', BltBBMController::class);
    Route::resource('Data-Umkm', DataUmkmController::class);
    Route::resource('Data-Pkh', DataPkhController::class);
    Route::resource('pengaduan-Menu', PengaduanController::class);
    Route::resource('permohonan', PermohonanController::class);
    Route::resource('Data-Pbi-Daerah', DataPbiDaerahController::class);
    

    
    //Route::resource('/search', contohController::class);
    Route::get('/search', [contohController::class,'index'])->name('search.index');
    Route::get('/search/show/{dataDTKS}', [contohController::class,'show'])->name('search.show');
    Route::get('/search/filter', [contohController::class,'filter'])->name('search.filter');
    // Route::get('/search/{$dataDTKS}', [TopController::class,'show'])->name('products.show');
    
    Route::resource('Data-PPKS', DataPpksController::class);
    Route::get('/Google-Site', function () {
        return view('google-site.index');
    });
    
    Route::resource('Bansos', BltMinyakGorengController::class);
    // Route::get('/getEmployees', [DtksController::class, 'getEmployees'])->name('getEmployees');
    Route::get('dtks/list', [DtksController::class, 'data'])->name('dtks.list');
    Route::controller(DtksController::class)->group(function(){
        Route::get('data-export-Dtks', 'ExportData')->name('data-export-Dtks');
        Route::post('data-import-Dtks', 'ImportMaatwebsite')->name('data-import-Dtks');
        // Route::post('allposts', 'allPosts' )->name('allposts');
    });
    Route::controller(DataUmkmController::class)->group(function(){
        Route::get('data-export-umkm', 'ExportData')->name('data-export-umkm');
        Route::post('data-import-umkm', 'importcsv')->name('data-import-umkm');
      
    });
    Route::controller(DataPkhController::class)->group(function(){
        Route::get('data-export-Pkh', 'ExportData')->name('data-export-Pkh');
        Route::post('data-import-Pkh', 'importcsv')->name('data-import-Pkh');
        // Route::post('allposts', 'allPosts' )->name('allposts');
    });
    Route::controller(BltMinyakGorengController::class)->group(function(){
        Route::get('data-export-Minyak', 'ExportData')->name('data-export-Minyak');
        Route::post('data-import-Minyak', 'importcsv')->name('data-import-Minyak');
        // Route::post('allposts', 'allPosts' )->name('allposts');
    });
    Route::controller(BltBBMController::class)->group(function(){
        Route::get('data-export-BBM', 'ExportData')->name('data-export-BBM');
        Route::post('data-import-BBM', 'importcsv')->name('data-import-BBM');
        // Route::post('allposts', 'allPosts' )->name('allposts');
    });
    Route::controller(DataPbiDaerahController::class)->group(function(){
        Route::get('data-export-PBI', 'ExportData')->name('data-export-PBI');
        Route::post('data-import-PBI', 'importcsv')->name('data-import-PBI');
        // Route::post('allposts', 'allPosts' )->name('allposts');
    });
    Route::controller(PengaduanController::class)->group(function(){
        Route::get('download/{id}', 'download')->name('download');
        Route::get('/Pengaduan/export_excel', 'export_excel');
        Route::post('/Pengaduan/import', 'import')->name('import_pengaduan');
        // Route::post('allposts', 'allPosts' )->name('allposts');
    });
    Route::get('/Permohonan/export_excel_permohonan', [PermohonanController::class, 'export_excel_permohonan']);
    Route::post('/Permohonan/import', [PermohonanController::class, 'import'])->name('import_permohonan');
    // Route::controller(PermohonanController::class)->group(function(){
    //     // Route::get('download/{id}', 'download')->name('download');
    //     Route::get('/permohonan/export_excel_permohonan', 'export_excel_permohonan');
    //     // Route::post('allposts', 'allPosts' )->name('allposts');
    // });
});
