<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Partner\Postcode;
use App\Models\Partner\District;
use Illuminate\Support\Facades\DB;
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
// Route::get('/select-rooms', function () {
//     return view('frontend.select-rooms');
// });
// Route::get('/select-rooms/{id}', 'App\Http\Controllers\SelectRoomController@get_poolvilla');
//login partner route

Route::group(['middleware' => 'Language'], function () {
    $lang_db = \App\LanguageModel::where('status', "on")->get();
    foreach ($lang_db as $lang) {
        Route::prefix($lang->set)->group(function () {
        Route::get('signin_hotel', 'App\Http\Controllers\PartnerController@get_signin_hotel')->name('partner_login');
        });
        }
});

Route::group(['middleware' => ['auth:partner']], function () {
    route::get('/tourist_attraction',[FrontendController::class,'get_tourist_attraction']);
    Route::get('hotel', 'App\Http\Controllers\PartnerController@get_hotel');
    Route::get('partner/identity_verification', 'App\Http\Controllers\PartnerController@get_identity_verification');
    Route::POST('partner/verification','App\Http\Controllers\PartnerController@save_verification');
    Route::get('list_property2', 'App\Http\Controllers\PartnerController@get_list2');

    Route::get('Partner/Poolvilla/Index', 'App\Http\Controllers\PoolvillaController@index');
    Route::get('Partner/Poolvilla/{id}/Edit', 'App\Http\Controllers\PoolvillaController@Edit1');
    Route::get('Partner/Poolvilla/Create', 'App\Http\Controllers\PoolvillaController@form1');
    Route::POST('Partner/Poolvilla/Form1/save','App\Http\Controllers\PoolvillaController@save_form1');
    Route::get('Partner/Poolvilla/{id}/MoreAbout', 'App\Http\Controllers\PoolvillaController@form2');
    Route::POST('Partner/Poolvilla/Form2/save','App\Http\Controllers\PoolvillaController@save_form2');
    Route::get('Partner/Poolvilla/{id}/Rule', 'App\Http\Controllers\PoolvillaController@form3');
    Route::POST('Partner/Poolvilla/Form3/save','App\Http\Controllers\PoolvillaController@save_form3');
    Route::get('Partner/Poolvilla/{id}/Images', 'App\Http\Controllers\PoolvillaController@index2');
    Route::POST('Partner/Poolvilla/Image/Update','App\Http\Controllers\PoolvillaController@Update_image_poolvilla');
    Route::get('/Partner/Poolvilla/Image/Delete/{id}/{image_id}', 'App\Http\Controllers\PoolvillaController@delete_image_poolvilla');
    Route::POST('poolvilla/delete','App\Http\Controllers\PoolvillaController@delete');
    
    //room
    Route::get('Partner/Poolvilla/{id}/Rooms', 'App\Http\Controllers\RoomController@index');
    Route::get('Partner/Poolvilla/{id}/CreateRoom', 'App\Http\Controllers\RoomController@form1');
    Route::POST('Partner/Room/Form1/save','App\Http\Controllers\RoomController@save_form1');
    Route::get('Partner/Room/{id}/Edit', 'App\Http\Controllers\RoomController@edit1');
    Route::get('Partner/Room/{id}/Images', 'App\Http\Controllers\RoomController@index2');
    Route::POST('Partner/Room/Image/Update','App\Http\Controllers\RoomController@Update_image_room');
    Route::get('/Partner/Room/Image/Delete/{id}/{image_id}', 'App\Http\Controllers\RoomController@delete_image_room');
    Route::POST('room/delete','App\Http\Controllers\RoomController@delete');
    //inbox
    Route::get('Partner/Inbox', 'App\Http\Controllers\InboxController@index');
    Route::get('Partner/Inbox/Create', 'App\Http\Controllers\InboxController@form1');
    Route::POST('Partner/Inbox/New', 'App\Http\Controllers\InboxController@save_form1');
    Route::get('Partner/Inbox/{id}', 'App\Http\Controllers\InboxController@form2');
    Route::POST('Partner/Message/Reply', 'App\Http\Controllers\InboxController@save_form2');

    //review
    Route::get('Partner/Reviews', 'App\Http\Controllers\ReviewController@index');
    Route::POST('Review/Report', 'App\Http\Controllers\ReviewController@report');

    //Ajax change status
    Route::POST('change_status_poolvilla','App\Http\Controllers\PoolvillaController@change_status');
    Route::POST('change_status_room','App\Http\Controllers\RoomController@change_status');

    //my profile
    Route::get('Partner/EditMyProfile', 'App\Http\Controllers\MyProfileController@get_form');
    Route::get('Partner/ChagePassword', 'App\Http\Controllers\MyProfileController@get_form2');
    Route::POST('Partner/update/myprofile', 'App\Http\Controllers\MyProfileController@update_profile');
    Route::POST('Partner/MyProfile/UpdatePassword', 'App\Http\Controllers\MyProfileController@update_password');

    // discount price
    Route::get('/Partner/Room/{id}/Discount', 'App\Http\Controllers\DiscountController@index');
    Route::get('/Partner/Room/{id}/DiscountCreate', 'App\Http\Controllers\DiscountController@form1');
    Route::POST('Partner/Discout/Form1/save', 'App\Http\Controllers\DiscountController@save_form1');
    Route::get('/Partner/Room/{id}/DiscountEdit', 'App\Http\Controllers\DiscountController@edit1');
    Route::get('Partner/Room/Discount/Delete/{id}/{discount_id}', 'App\Http\Controllers\DiscountController@delete');

    //dashboard
    Route::get('/Partner/Dashboard/{year}', 'App\Http\Controllers\DashboardPartnerController@index');
    Route::get('/Partner/Dashboard', 'App\Http\Controllers\DashboardPartnerController@set_year');

    //reservation
    Route::get('/Partner/Reservation/{startdate}/{enddate}/{check}/{type}/{status}', 'App\Http\Controllers\ReservationPartnerController@index');
    Route::get('/Partner/Reservation', 'App\Http\Controllers\ReservationPartnerController@set_search');
    Route::POST('/Partner/Cancle/Reserve', 'App\Http\Controllers\ReservationPartnerController@cancle_reserve');

    //Finace
    Route::get('/Partner/Finace', 'App\Http\Controllers\FinaceController@get_index');
});
// no login route
Route::get('/TermsOfPartner', 'App\Http\Controllers\PartnerController@get_termspartner');
Route::get('Partner/logout','App\Http\Controllers\PartnerController@logout');
//frontend
// Route::POST('/loging','App\Http\Controllers\LoginController@loging');
// route::get('/tourist_attraction',[FrontendController::class,'get_tourist_attraction']);
Route::get('/kornset', function () {
    $district= District::all();
    foreach($district as $d){

        $sub= Postcode::where('district_code',$d->code)->first();
        if(isset($sub)){
            $zip_code=$sub->zip_code;        
            
        
            DB::update("update district set zip_code = '$zip_code' where code = '$d->code'");
        
        }
      
    }
    echo "ดำเนินการเสร็จสิ้น";
});
Route::POST('partner/loging','App\Http\Controllers\PartnerController@partner_loging');
Route::POST('partner/editing_profile','App\Http\Controllers\PartnerController@partner_editing_profile');
Route::POST('partner/edit_contact','App\Http\Controllers\PartnerController@partner_edit_contact');
Route::POST('partner/change_password','App\Http\Controllers\PartnerController@partner_change_password');
Route::POST('partner/register','App\Http\Controllers\PartnerController@partner_register');
Route::POST('partner/save_draft','App\Http\Controllers\PartnerController@save_draft');
Route::POST('partner/update_draft','App\Http\Controllers\PartnerController@update_draft');
Route::POST('partner/city','App\Http\Controllers\PartnerController@set_city');
Route::get('partner/draft/{id}','App\Http\Controllers\PartnerController@get_draft');
Route::POST('create/poolvilla','App\Http\Controllers\PartnerController@create_poolvilla');
Route::POST('save/draft/bedroom','App\Http\Controllers\PartnerController@save_bedroom');
Route::get('partner/draft/list_property4/{id}','App\Http\Controllers\PartnerController@get_list4');
Route::get('hotel_property','App\Http\Controllers\PartnerController@get_hotel_property');
Route::get('partner/add_bedroom/{id}','App\Http\Controllers\PartnerController@get_bedroom');
Route::get('partner/draft/list_property3/{id1}/{id2}','App\Http\Controllers\PartnerController@get_draft');
Route::POST('update/draft/bedroom','App\Http\Controllers\PartnerController@update_bedroom');
Route::get('partner/draft/edit_list_property3/{id1}/{id2}','App\Http\Controllers\PartnerController@get_edit_draft');
Route::POST('partner/delete/room','App\Http\Controllers\PartnerController@delete_room');
Route::get('/list_property4/{id}', 'App\Http\Controllers\PartnerController@get_list_property4');
Route::POST('partner/save/list4','App\Http\Controllers\PartnerController@save_list4');
Route::get('partner/list_property5/{id}', 'App\Http\Controllers\PartnerController@get_list_property5');
Route::POST('partner/save/breakfast','App\Http\Controllers\PartnerController@save_breakfast');
Route::get('partner/list_property5-2/{id}', 'App\Http\Controllers\PartnerController@get_list_property52');
Route::POST('partner/save/parking','App\Http\Controllers\PartnerController@save_parking');
Route::get('partner/list_property6/{id}', 'App\Http\Controllers\PartnerController@get_list_property6');
Route::POST('partner/save/languages','App\Http\Controllers\PartnerController@save_languages');
Route::get('partner/list_property7/{id}', 'App\Http\Controllers\PartnerController@get_list_property7');
Route::POST('partner/save/allow','App\Http\Controllers\PartnerController@save_allow');
Route::get('partner/list_property8/{id}', 'App\Http\Controllers\PartnerController@get_list_property8');
Route::get('partner/list_property10/{id}', 'App\Http\Controllers\PartnerController@get_list_property10');
Route::POST('partner/save/image_poolvilla','App\Http\Controllers\PartnerController@save_image_poolvilla');
Route::get('partner/list_property8/{id}', 'App\Http\Controllers\PartnerController@get_list_property8');
Route::get('verify/{code}', 'App\Http\Controllers\PartnerController@verify_partner');

Route::POST('save/price','App\Http\Controllers\PartnerController@save_price');

Route::get('/confirm_mail', function () {
    return view('email.confirm-email');
});
// Route::get('/cxr', function () {
//     dd('ok');
//     // return view('frontend.hotel_account_change_password');
// });

Route::get('/hotel_account_change_password', function () {
    return view('frontend.hotel_account_change_password');
});
Route::get('/hotel_account_manage', function () {
    return view('frontend.hotel_account_manage');
});
Route::get('/hotel_account_finance', function () {
    return view('frontend.hotel_account_finance');
});
Route::get('/hotel_account_manage_edit_profile', function () {
    return view('frontend.hotel_account_manage_edit_profile');
});
Route::get('/hotel_account_manage_edit_contact', function () {
    return view('frontend.hotel_account_manage_edit_contact');
});
Route::get('/hotel_account_finance', function () {
    return view('frontend.hotel_account_finance');
});
Route::get('/register_hotel', function () {
    return view('frontend.register_hotel');
});
Route::get('/list_property1', function () {
    return view('frontend.list_property1');
});
Route::get('/list_property1_cf_villa', function () {
    return view('frontend.list_property1_cf_villa');
});
Route::get('/list_property1_cf_villas', function () {
    return view('frontend.list_property1_cf_villas');
});

Route::get('/list_property3', function () {
    return view('frontend.list_property3');
});


Route::get('/list_property5-2', function () {
    return view('frontend.list_property5-2');
});
Route::get('/list_property6', function () {
    return view('frontend.list_property6');
});
Route::get('/list_property7', function () {
    return view('frontend.list_property7');
});

Route::get('/list_property9', function () {
    return view('frontend.list_property9');
});
Route::get('/list_property10', function () {
    return view('frontend.list_property10');
});
Route::get('/list_property11', function () {
    return view('frontend.list_property11');
});
Route::get('/edit_property11-1', function () {
    return view('frontend.edit_property11-1');
});
Route::get('/edit_property11-2', function () {
    return view('frontend.edit_property11-2');
});
Route::get('/edit_property11-3', function () {
    return view('frontend.edit_property11-3');
});
Route::get('/edit_property11-4', function () {
    return view('frontend.edit_property11-4');
});
Route::get('/list_property12', function () {
    return view('frontend.list_property12');
});
Route::get('/list_property13', function () {
    return view('frontend.list_property13');
});
Route::get('/list_property_confirm', function () {
    return view('frontend.list_property_confirm');
});