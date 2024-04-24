<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', function () {
//     $rec_location = DB::table("location")->get();
//     // $rec_carousel = Carousel::select('carousel_img','carousel_head','carousel_detail')->whereIn('id',[4,5])->get();
//     $rec_carousel = Carousel::all();
//     // dd($rec_location);
//     return view('page.home', [
//                             'rec_location' => $rec_location ,
//                             'rec_carousel' => $rec_carousel ,
//                             ]);
// });

Route::get('/home',[HomeController::class,'home']);

Route::get('/master', fn () => view('page.backend.master'));

// Route::get('/manage-location',[LocationController::class,'manageLocation']);
// Route::get('/add-location',[LocationController::class,'addLocation']);
// Route::get('/edit-location/{id}',[LocationController::class,'editLocation']);
// Route::post('/insert-location',[LocationController::class,'insertLocation']);
// Route::post('/update-location',[LocationController::class,'updateLocation']);
// Route::get('/delete-location/{id}',[LocationController::class,'deleteLocation']);

Route::controller(LocationController::class)->group(function(){
    Route::get('/manage-location','manageLocation');
    Route::get('/add-location','addLocation');
    Route::get('/edit-location/{id}','editLocation');
    Route::post('/insert-location','insertLocation');
    Route::post('/update-location','updateLocation');
    Route::get('/delete-location/{id}','deleteLocation');
});


// Route::controller(PlacementController::class)
//     ->prefix('placements')
//     ->as('placements.')
//     ->group(function () {
//         Route::get('', 'index')->name('index');
//         Route::get('/bills', 'bills')->name('bills');
//         Route::get('/bills/{bill}/invoice/pdf', 'invoice')->name('pdf.invoice');
//     });



Route::get('/backend', function () {
    return view('page.backend.home-backend');  
});