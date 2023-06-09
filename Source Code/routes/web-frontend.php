<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\LanguageModel;


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
$lang_db = LanguageModel::find(4);
Route::get('/set/lang/{lang}', 'HomeController@setLang');
// clear cache
Route::get('/clc', function() {
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
    Artisan::call('view:clear');   
    // Artisan::call('optimize');
    // Artisan::call('clear-compiled');
    // Artisan::call('view:clear');
    // session()->forget('key');
	return "Cleared!";
});

Route::get('/', function () use ($lang_db) {
    $default = $lang_db->set;  // -----th
    $lang = Session('lang'); // -----en

    if ($lang) {
        $check = \App\LanguageModel::where('set', $lang)->first();
        if ($check->status == "on") {
            $default = $check->set;
        } else {
            $data = \App\LanguageModel::where(['status' => "on", 'default' => "on"])->first();
            $default = $data->set;
        }
        $check = Session::put('lang', $default);
        return redirect("/$default");
        // return redirect()->back();
        // dd($check);
    } else {
        Session::put('lang', $default);
        return redirect("/$default");
        // return redirect()->back();
        // dd('tesrr');
    }
});

Auth::routes();

// Route::get('/change-language/{locale}', function ($locale) {
//     if (!in_array($locale, ['en', 'th'])) {        
//         abort(404);
//     }
//     App::setLocale($locale);
//     // dd($check);
//     // Session
//     session()->put('locale', $locale);
//     session()->get('locale');
//     // dd(session()->get('locale'));
//     return redirect()->back();
// });

// ---------------------------------------- Member Frontend ---------------------------------------- //
Route::group(['middleware' => 'Language'], function () {
    $lang_db = \App\LanguageModel::where('status', "on")->get();
    foreach ($lang_db as $lang) {
        Route::prefix($lang->set)->group(function () {
            Route::get('/signin', function () {
                return view('frontend.signin');
            });
            Route::POST('/loging',[LoginController::class,'loging']);
            Route::get('/logout',[LoginController::class,'logout']);
            Route::post('/signin/Forgotpassword',[LoginController::class,'forgotpassword_mail']);
            Route::get('/signin/Forgotpassword/{id}',[LoginController::class,'forgotpassword']);
            Route::put('/signin/Forgotpassword/update/{id}',[LoginController::class,'forgotpassword_update']);
            Route::get('/register', function () {
                return view('frontend.register');
            });
            Route::post('/register',[FrontendController::class,'register_member']);
            Route::get('/',[FrontendController::class,'get_index']);
            Route::post('/booking-1',[BookingController::class,'get_booking']);
            Route::post('save/booking1',[BookingController::class,'save_booking1']);
            Route::get('/booking-2/{id}',[BookingController::class,'get_booking2']);
            Route::post('save/booking2',[BookingController::class,'save_booking2']);
            Route::get('/booking-3/{id}',[BookingController::class,'get_booking3']);
            Route::get('/category',[FrontendController::class,'get_category']);
            Route::get('/category-travel/search',[FrontendController::class,'get_category_travel']);
            Route::get('/review-hotel/id={id}',[FrontendController::class,'get_review_hotel']);
            // Route::get('/review-hotel', function () {
            //     return view('frontend.review_hotel');
            // });
            Route::get('/select-province/id={id}',[FrontendController::class,'get_select_province']);
            Route::get('/province',[FrontendController::class,'get_province']);
            Route::get('/select-hotel/search',[FrontendController::class,'search']);
            Route::get('/select-rooms/{id}/{check_in}/{check_out}/adult={adult}/kid={kid}/room={room}', 'App\Http\Controllers\SelectRoomController@get_poolvilla');
            Route::get('/promotion/id={id}',[FrontendController::class,'get_promotion']);
            route::get('/tourist-attraction',[FrontendController::class,'get_tourist_attraction']);
            Route::get('/tourist_attraction_province/search',[FrontendController::class,'get_touristattraction_province']);
            route::get('/tourist_attraction_detail/id={id}',[FrontendController::class,'get_touristattraction_datail']);
            
            Route::group(['middleware' => ['auth:member']], function () {
                
                Route::get('/mybooking',[FrontendController::class,'get_mybooking']);
                Route::put('/mybooking/updated/{id}',[FrontendController::class,'update_mybooking']);
                Route::put('/mybooking/cancel/{id}',[FrontendController::class,'cancel_mybooking']);
                Route::put('/mybooking/update/{id}',[FrontendController::class,'updated_mybooking']);
                // Route::get('/mybooking/search',[FrontendController::class,'get_mybooking_search']);
                Route::get('/booking_detail/id={id}',[FrontendController::class,'get_booking_detail']);
                Route::get('/profile',[FrontendController::class,'get_profile']);
                Route::put('/profile/id={id}',[FrontendController::class,'updated_profile']);
                Route::put('/profile/updated/id={id}',[FrontendController::class,'updated_password']);
                Route::post('/profile/payment',[FrontendController::class,'store_payment']);
                Route::put('/profile/payment/id={id}',[FrontendController::class,'updated_payment']);
                Route::delete('/profile/payment/delete/id={id}',[FrontendController::class,'destroy']);
                Route::get('/review',[FrontendController::class,'get_review']);
                Route::post('/review/id={id}',[FrontendController::class,'updated_review']);

            });

// ---------------------------------------- End Member Frontend ---------------------------------------- //

            Route::get('/backend/login', function () {
                return view('auth.login');
            });
            Route::POST('backend/loging','App\Http\Controllers\backend\LoginController@loging');
            Route::get('backend/logout','App\Http\Controllers\backend\LoginController@logout')->name('logout');

        });
    }
});