<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyPresentationController;
use App\Http\Controllers\CompanyPressReleaseController;
use App\Http\Controllers\CompanyJobController;
use App\Http\Controllers\InvoiceController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__ . '/auth.php';


// Company

Route::get('/company', [CompanyController::class, 'index']);
Route::get('/company/create', [CompanyController::class, 'create']);
Route::post('/company/store', [CompanyController::class, 'store']);
Route::get('/company/{id}', [CompanyController::class, 'show'])->where('id', '[0-9]+');
Route::get('/company/edit', [CompanyController::class, 'edit']);
Route::post('/company/update', [CompanyController::class, 'update']);

// companyPresentations
Route::get('/companypresentation', [CompanyPresentationController::class, 'index']);
Route::get('/companypresentation/create', [CompanyPresentationController::class, 'create']);
Route::post('/companypresentation/store', [CompanyPresentationController::class, 'store']);
Route::get('/companypresentation/edit', [CompanyPresentationController::class, 'edit']);
Route::post('/companypresentation/update', [CompanyPresentationController::class, 'update']);

// pressReleases
Route::get('/pressreleases', [CompanyPressreleaseController::class, 'index']);
Route::get('/pressrelease/publishing', [CompanyPressreleaseController::class, 'publishing']);
Route::get('/pressrelease/edit/{id}',[CompanyPressreleaseController::class, 'edit']);
Route::get('/pressrelease/create', [CompanyPressReleaseController::class, 'create']);
Route::get('/pressreleases/{id}', [CompanyPressReleaseController::class, 'show']);
Route::post('/pressrelease/store', [CompanyPressReleaseController::class, 'store']);

// jobs
Route::get('/jobs', [CompanyJobController::class, 'index']);
Route::get('/job/publishing', [CompanyJobController::class, 'create']);
Route::get('/job/create', [CompanyJobController::class, 'create']);
Route::post('/job/store', [CompanyJobController::class, 'store']);
Route::get('/jobs/{id}', [CompanyJobController::class, 'show']);


// projects - that can be put by companies and everyone who have those services can apply
Route::get('/project', [CompanyProjectController::class, 'index']);
Route::get('/project/create', [CompanyProjectController::class, 'create']);
Route::post('/project/store', [CompanyProjectController::class, 'store']);
Route::get('/project/{id}', [CompanyProjectController::class, 'show']);

//invoice
Route::get('/invoice',[InvoiceController::class, 'index']);