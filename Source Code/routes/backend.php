<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Auth;
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
Route::get('/backend/login', function () {
    return view('auth.login');
});
Route::POST('backend/loging','App\Http\Controllers\Backend\LoginController@loging');
Route::get('backend/logout','App\Http\Controllers\Backend\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth:backend']], function () {
// manage admin
Route::get('/backend/index','App\Http\Controllers\Backend\AdminController@get_index');
Route::get('/backend/admin_profile','App\Http\Controllers\Backend\AdminController@get_index');
Route::get('/backend/admin/add-admin','App\Http\Controllers\Backend\AdminController@get_form');
Route::POST('backend/admin_profile/save','App\Http\Controllers\Backend\AdminController@save_form');
Route::POST('/backend/admin_reset','App\Http\Controllers\Backend\AdminController@reset_password');
Route::get('/backend/admin/update_profile/{p}','App\Http\Controllers\Backend\AdminController@get_form2');

//manage role
Route::get('/backend/role','App\Http\Controllers\Backend\ManageRoleController@get_index');
Route::get('/backend/admin/add-role','App\Http\Controllers\Backend\ManageRoleController@get_form');
Route::POST('backend/role_profile/save','App\Http\Controllers\Backend\ManageRoleController@save_form');
Route::POST('/backend/role_reset','App\Http\Controllers\Backend\ManageRoleController@reset_password');
Route::get('/backend/admin/update_role/{p}','App\Http\Controllers\Backend\ManageRoleController@get_form2');
Route::POST('/backend/role_profile/delete','App\Http\Controllers\Backend\ManageRoleController@delete_role');
//manage member
Route::get('/backend/member_profile','App\Http\Controllers\Backend\ManageMemberController@get_index');
Route::get('/backend/admin/add-member','App\Http\Controllers\Backend\ManageMemberController@get_form');
Route::POST('backend/member_profile/save','App\Http\Controllers\Backend\ManageMemberController@save_form');
Route::POST('/backend/member_reset','App\Http\Controllers\Backend\ManageMemberController@reset_password');
Route::get('/backend/admin/update_member/{p}','App\Http\Controllers\Backend\ManageMemberController@get_form2');
Route::POST('/backend/member_profile/delete','App\Http\Controllers\Backend\ManageMemberController@delete_member');
//manage hotel
Route::get('/backend/Partner','App\Http\Controllers\Backend\PartnerController@get_index');
Route::get('/backend/Partner/Edit/{id}','App\Http\Controllers\Backend\PartnerController@get_edit');
Route::POST('/Backend/Partner/Form1/save','App\Http\Controllers\Backend\PartnerController@update_partner');
Route::get('/backend/admin/add-hotel','App\Http\Controllers\Backend\ManageHotelController@get_form');
Route::POST('backend/hotel_profile/save','App\Http\Controllers\Backend\ManageHotelController@save_form');
Route::POST('/backend/hotel_reset','App\Http\Controllers\Backend\ManageHotelController@reset_password');
Route::get('/backend/admin/update_hotel/{p}','App\Http\Controllers\Backend\ManageHotelController@get_form2');

//profile 
Route::get('/backend/edit_profile','App\Http\Controllers\Backend\ProfileController@get_form');
Route::get('/backend/change_password','App\Http\Controllers\Backend\ProfileController@get_form2');
Route::Post('backend/profile/save','App\Http\Controllers\Backend\ProfileController@update_profile');
Route::Post('backend/password/update','App\Http\Controllers\Backend\ProfileController@update_password');
// hotel detail
Route::get('/backend/admin/hotel/{p}','App\Http\Controllers\Backend\HotelDetailController@get_index');
Route::get('/backend/admin/manage_image_hotel/{p}','App\Http\Controllers\Backend\HotelDetailController@get_index2');
Route::get('/backend/admin/manage_description_hotel/{p}','App\Http\Controllers\Backend\HotelDetailController@get_form');
Route::get('backend/admin/manage_rooms/{p}','App\Http\Controllers\Backend\HotelDetailController@get_index3');
Route::get('backend/admin/add_edit_room/{p}','App\Http\Controllers\Backend\HotelDetailController@get_form2');
Route::post('/backend/hotel/save','App\Http\Controllers\Backend\HotelDetailController@save_hotel');
route::get('backend/admin/add_poolvilla/{p}','App\Http\Controllers\Backend\HotelDetailController@get_add_poolvilla');
Route::post('/backend/image_poolvilla/save','App\Http\Controllers\Backend\HotelDetailController@save_image_poolvilla');
Route::post('/backend/image_poolvilla/delete','App\Http\Controllers\Backend\HotelDetailController@delete_image_poolvilla');
// facilities
Route::get('backend/admin/facilities','App\Http\Controllers\Backend\FacilitiesController@get_index');
Route::get('backend/admin/add_facilities','App\Http\Controllers\Backend\FacilitiesController@get_form');
Route::get('backend/admin/edit_facilities/{p}','App\Http\Controllers\Backend\FacilitiesController@get_form2');
Route::POST('backend/facilities/save','App\Http\Controllers\Backend\FacilitiesController@save_facilities');
Route::POST('backend/facilities/update','App\Http\Controllers\Backend\FacilitiesController@update_facilities');
Route::POST('backend/icon/update','App\Http\Controllers\Backend\FacilitiesController@update_icon');
Route::POST('backend/icon/save','App\Http\Controllers\Backend\FacilitiesController@save_icon');
Route::POST('backend/icon/delete','App\Http\Controllers\Backend\FacilitiesController@delete_icon');
Route::POST('backend/facilities/delete','App\Http\Controllers\Backend\FacilitiesController@delete_facilities');

//banner
Route::get('backend/admin/banner','App\Http\Controllers\Backend\BannerController@get_index');
Route::get('backend/banner/add','App\Http\Controllers\Backend\BannerController@get_add');
Route::get('backend/banner/edit/{id}','App\Http\Controllers\Backend\BannerController@get_edit');
Route::POST('backend/banner/save','App\Http\Controllers\Backend\BannerController@save_banner');
Route::POST('backend/banner/update','App\Http\Controllers\Backend\BannerController@update_banner');
Route::POST('backend/banner/delete','App\Http\Controllers\Backend\BannerController@delete_banner');

//discount rooms
Route::get('backend/admin/banner/discount-rooms/{id}','App\Http\Controllers\Backend\DiscountRoomsController@get_index');
Route::get('backend/banner/discount-rooms/getRoom/{id}','App\Http\Controllers\Backend\DiscountRoomsController@getRoom');
Route::get('backend/banner/discount-rooms/getDiscount/{id}','App\Http\Controllers\Backend\DiscountRoomsController@getDiscount');
Route::get('backend/banner/discount-rooms/add/{id}','App\Http\Controllers\Backend\DiscountRoomsController@get_add');
Route::get('backend/banner/discount-rooms/edit/{id}/{id_roomdetails}','App\Http\Controllers\Backend\DiscountRoomsController@get_edit');
Route::POST('backend/banner/discount-rooms/save/{id}','App\Http\Controllers\Backend\DiscountRoomsController@save_discount_rooms');
Route::POST('backend/banner/discount-rooms/update/{id}/{id_roomdetails}','App\Http\Controllers\Backend\DiscountRoomsController@update_discount_rooms');
Route::POST('backend/banner/discount-rooms/delete/{id}','App\Http\Controllers\Backend\DiscountRoomsController@delete_discount_rooms');

// pool villa manage page
route::POST('backend/manage_poolvilla_pages','App\Http\Controllers\Backend\ManagePoolVillaPagesController@manage_page');
route::get('backend/admin/more_about_poolvilla/{id}','App\Http\Controllers\Backend\ManagePoolVillaPagesController@get_more_about_poovilla');
route::get('backend/admin/Q&A/{id}','App\Http\Controllers\Backend\ManagePoolVillaPagesController@q_and_a');
route::get('backend/admin/manage_Q&A/{id}','App\Http\Controllers\Backend\ManagePoolVillaPagesController@get_edit_q_and_a');

// rooms manage page
route::POST('backend/manage_rooms_pages','App\Http\Controllers\Backend\ManagePoolVillaPagesController@manage_rooms_page');
route::get('backend/admin/image_room/{id}','App\Http\Controllers\Backend\ManagePoolVillaPagesController@get_image_room');
route::get('backend/admin/discount/{id}','App\Http\Controllers\Backend\ManagePoolVillaPagesController@get_discount');
route::get('backend/admin/reserve_time/{id}','App\Http\Controllers\Backend\ManagePoolVillaPagesController@get_reserve_time');
route::get('backend/admin/reserve/{id}','App\Http\Controllers\Backend\ManagePoolVillaPagesController@get_reserve');
route::get('backend/admin/reserve_report/{id}','App\Http\Controllers\Backend\ManagePoolVillaPagesController@get_reserve_report');
route::get('backend/admin/edit_reserve/{id}','App\Http\Controllers\Backend\ManagePoolVillaPagesController@get_edit_reserve');

//Banking Control
route::get('backend/admin/banking','App\Http\Controllers\Backend\BankController@get_index');
route::get('backend/admin/add_bank','App\Http\Controllers\Backend\BankController@get_form');
route::POST('backend/banking/save','App\Http\Controllers\Backend\BankController@save_form');
route::get('backend/admin/update_bank/{id}','App\Http\Controllers\Backend\BankController@get_form2');

//Banking System Control
route::get('backend/admin/banking_system','App\Http\Controllers\Backend\BankController@get_index_system');
route::get('backend/admin/add_bank_system','App\Http\Controllers\Backend\BankController@get_form_system');
route::POST('backend/banking_system/save','App\Http\Controllers\Backend\BankController@save_form_system');
route::get('backend/admin/update_bank_system/{id}','App\Http\Controllers\Backend\BankController@get_form2_system');

//House
route::POST('backend/house/save','App\Http\Controllers\Backend\HouseDetailController@save_house');
route::get('backend/admin/add_house/{id}','App\Http\Controllers\Backend\HouseDetailController@get_add_house');
route::get('backend/admin/manage_rooms/th/{id}','App\Http\Controllers\Backend\HouseDetailController@get_edit_house_th');
route::get('backend/admin/manage_description_hotel/th/{id}','App\Http\Controllers\Backend\HouseDetailController@get_edit_pool_th');

//discount
route::POST('backend/discount/save','App\Http\Controllers\Backend\ManagePoolVillaPagesController@save_discount');

 //Country
 Route::get('/backend/country','App\Http\Controllers\Backend\CountryController@backend_country');
 Route::get('/backend/country/add','App\Http\Controllers\Backend\CountryController@backend_country_add');
 Route::post('/backend/country/save','App\Http\Controllers\Backend\CountryController@backend_country_save');
 Route::get('/backend/country/edit/{id}','App\Http\Controllers\Backend\CountryController@backend_country_edit');

 //City
 Route::get('/backend/country/city/{id}','App\Http\Controllers\Backend\CountryController@backend_country_city');
 Route::get('/backend/country/city/add/{id}','App\Http\Controllers\Backend\CountryController@backend_country_city_add');
 Route::post('/backend/country/city/save','App\Http\Controllers\Backend\CountryController@backend_country_city_save');
 Route::get('/backend/country/city/edit/{id}','App\Http\Controllers\Backend\CountryController@backend_country_city_edit');
 Route::get('/backend/country/city/delete/{id}','App\Http\Controllers\Backend\CountryController@backend_country_city_delete');
 
 //Enjoy with
 Route::get('/backend/enjoy_with','App\Http\Controllers\Backend\EnjoyController@backend_enjoy_with');
 Route::get('/backend/enjoy_with/add','App\Http\Controllers\Backend\EnjoyController@backend_enjoy_with_add');
 Route::post('/backend/enjoy_with/save','App\Http\Controllers\Backend\EnjoyController@backend_enjoy_with_save');
 Route::get('/backend/country/enjoy_with/edit/{id}','App\Http\Controllers\Backend\EnjoyController@backend_enjoy_with_edit');
 Route::get('/backend/country/enjoy_with/delete/{id}','App\Http\Controllers\Backend\EnjoyController@backend_enjoy_with_delete');
});
