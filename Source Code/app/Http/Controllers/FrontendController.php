<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Banner;
use App\Models\Frontend\ProvinceModel;
use App\Models\Frontend\DistrictModel;
use App\Models\DiscountRoomsModel;
use App\Models\Frontend\RegisterModel;
use App\Models\Frontend\PaymentModel;
use App\Models\Frontend\PoolvillaModel;
use App\Models\Frontend\ImageReviewModel;
use App\Models\Frontend\ReviewModel;
use App\Models\Frontend\EnjoyWithModel;
use App\Models\Partner\Poolvilla;
use App\Models\Partner\ImagePoolvilla;

class FrontendController extends Controller
{
    public function get_index()
    {  
        $province = ProvinceModel::orderBy('p_view', 'DESC')->get();
        $banner = Banner::where('status',1)->get();
        $provinces = ProvinceModel::orderBy('code', 'ASC')->get();
        $attraction = DB::table('db_attraction')->select('db_attraction.*','provinces.*','district.name_en as district_en','district.name_th as district_th')->leftJoin('provinces', 'db_attraction.ref_provinces_id', '=', 'provinces.code')
        ->leftJoin('district', 'db_attraction.ref_district_id', '=', 'district.code')
        ->inRandomOrder()->limit(4)->get();
        $enjoywith = EnjoyWithModel::skip(0)->take(1)->get();
        $enjoywith2 = EnjoyWithModel::skip(1)->take(1)->get();
        $enjoywith3 = EnjoyWithModel::skip(2)->take(1)->get();
        $enjoywith4 = EnjoyWithModel::skip(3)->take(1)->get();
        $enjoywith5 = EnjoyWithModel::skip(4)->take(1)->get();
        $enjoywith6 = EnjoyWithModel::skip(5)->take(1)->get();
        $enjoywith7 = EnjoyWithModel::skip(6)->take(1)->get();
        $enjoywith8 = EnjoyWithModel::skip(7)->take(1)->get();
        $enjoywith9 = EnjoyWithModel::skip(8)->take(1)->get();
        $enjoywith10 = EnjoyWithModel::skip(9)->take(1)->get();
        $EnjoyWith = EnjoyWithModel::inRandomOrder()->limit(6)->get();
        $reviews = ReviewModel::select('db_review.image as review_img','db_review.review','db_poolvilla.name_en as poolvilla_en','db_poolvilla.name_th as poolvilla_th','db_room.name','provinces.name_en as province_en','provinces.name_th as province_th','district.name_en as district_en','district.name_th as district_th')
        ->leftJoin('db_room', 'db_review.ref_room_id', '=', 'db_room.id')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')
        ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')
        ->where('db_review.status',1)->inRandomOrder()->limit(3)->get();
        $pluck3 = $provinces->pluck('name_en')->toArray();
        $mix3 = implode(',',$pluck3);
        $pluck4 = $provinces->pluck('name_th')->toArray();
        $mix4 = implode(',',$pluck4);
        $mixall = $mix3.','.$mix4;
        $re = explode(',',$mixall);
        $result = $re;
        $today=date('d/m/Y');
        $tomorrow = date("d/m/Y", strtotime("+1 day"));
        return view('frontend.index', compact('attraction','province','banner','result','today','tomorrow','enjoywith','enjoywith2','enjoywith3','enjoywith4','enjoywith5','enjoywith6','enjoywith7','enjoywith8','enjoywith9','enjoywith10','EnjoyWith','reviews'));
    }
    
    public function get_select_province(Request $request, $id)
    { 
        $_city = DistrictModel::select('district.code as district_code','provinces.code as provinces_code','district.name_en as district_en','district.name_th as district_th','provinces.name_en as provinces_en','provinces.name_th as provinces_th')
        ->leftJoin('provinces', 'district.province_code', '=', 'provinces.code')
        ->where('district.province_code',$id)->orderBy('district.p_view', 'DESC')->get();
        $provinces = ProvinceModel::orderBy('code', 'ASC')->get();
        $pluck3 = $provinces->pluck('name_en')->toArray();
        $mix3 = implode(',',$pluck3);
        $pluck4 = $provinces->pluck('name_th')->toArray();
        $mix4 = implode(',',$pluck4);
        $mixall = $mix3.','.$mix4;
        $re = explode(',',$mixall);
        $result = $re;
        $today = date('d/m/Y');
        $tomorrow = date("d/m/Y", strtotime("+1 day"));
        $_province = ProvinceModel::find($id);
        ProvinceModel::find($id)->update([
            'p_view' => $_province->p_view + 1,
        ]);
        $poolvilla = DB::table('db_poolvilla')
        ->select('db_poolvilla.*', 'provinces.name_th as province_th', 'provinces.name_en as province_en', 'district.name_th as district_th', 'district.name_en as district_en','db_room.price','db_room.adult','db_room.kids')
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')
        ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')
        ->leftJoin('db_room', 'db_poolvilla.id', '=', 'db_room.poolvilla_id')
        ->where('provinces.code', $id)
        ->get();
        return view('frontend.select-province', compact('result','today','tomorrow','poolvilla'))->with('_province', $_province)->with('_city', $_city);
    }

    public function get_province(Request $request)
    { 
        $_province = ProvinceModel::orderBy('p_view', 'DESC')->get();
        $provinces = ProvinceModel::orderBy('code', 'ASC')->get();
        $pluck3 = $provinces->pluck('name_en')->toArray();
        $mix3 = implode(',',$pluck3);
        $pluck4 = $provinces->pluck('name_th')->toArray();
        $mix4 = implode(',',$pluck4);
        $mixall = $mix3.','.$mix4;
        $re = explode(',',$mixall);
        $result = $re;
        $today = date('d/m/Y');
        $tomorrow = date("d/m/Y", strtotime("+1 day"));
        return view('frontend.province')->with('result', $result)->with('_province', $_province)->with('today', $today)->with('tomorrow', $tomorrow);
    }

    // public function get_select_hotel(Request $request,$id_province,$id)
    // { 
    //     $_city = DistrictModel::find($id);
    //     DistrictModel::find($id)->update([
    //         'p_view' => $_city->p_view + 1,
    //     ]);
    //     $result = PoolvillaModel::orderBy('id', 'DESC')->get();
    //     return view('frontend.select-hotel', compact('result'))->with('_city', $_city);
    // }

    public function get_tourist_attraction()
    {  
        $_province = ProvinceModel::select('provinces.*','district.code as district_code','district.name_en as district_en','district.name_th as district_th')->leftJoin('district', 'provinces.code', '=', 'district.province_code')->orderBy('district.p_view', 'DESC')->limit(3)->get();
        $_provinces = ProvinceModel::select('provinces.*','district.code as district_code','district.name_en as district_en','district.name_th as district_th')->leftJoin('district', 'provinces.code', '=', 'district.province_code')->orderBy('district.p_view', 'DESC')->get();
        $provinces = ProvinceModel::orderBy('code', 'ASC')->get();
        $pluck3 = $provinces->pluck('name_en')->toArray();
        $mix3 = implode(',',$pluck3);
        $pluck4 = $provinces->pluck('name_th')->toArray();
        $mix4 = implode(',',$pluck4);
        $mixall = $mix3.','.$mix4;
        $re = explode(',',$mixall);
        $result = $re;
        return view('frontend.tourist_attraction', compact('result'))->with('_province', $_province)->with('_provinces', $_provinces);
    }

    public function get_touristattraction_province(Request $request)
    {  
        $district_id = $request->id;
        $province = $request->province;
        $district = $request->district;
        $landmarks_from = $request->landmarks;
        if($landmarks_from == 1){
            $landmarks = $landmarks_from;
	 	}else{
            $landmarks = NULL;
		}
        $attractions_from = $request->attractions;
        if($attractions_from == 2){
            $attractions = $attractions_from;
	 	}else{
            $attractions = NULL;
		}
        $restaurant_from = $request->restaurant;
        if($restaurant_from == 3){
            $restaurant = $restaurant_from;
	 	}else{
            $restaurant = NULL;
		}
        $activities_from = $request->activities;
        if($activities_from == 4){
            $activities = $activities_from;
	 	}else{
            $activities = NULL;
		}
        $_district = DistrictModel::where('code', $district_id)->first();
        if(!isset($landmarks) && !isset($attractions) && !isset($restaurant) && !isset($activities)){
            DistrictModel::where('code',$district_id)->update([
                'p_view' => $_district->p_view + 1,
            ]);
            $attraction = DB::table('db_attraction')->select('db_attraction.*','provinces.*','district.name_en as district_en','district.name_th as district_th')->leftJoin('provinces', 'db_attraction.ref_provinces_id', '=', 'provinces.code')
            ->leftJoin('district', 'db_attraction.ref_district_id', '=', 'district.code')
            ->where('ref_district_id', $district_id)
            ->groupby('db_attraction.id')->get();
            return view('frontend.tourist_attraction_province', compact('district_id','province','district','landmarks_from','attractions_from','restaurant_from','activities_from','attraction'))->with('_district', $_district);
        }else{
            $attraction = DB::table('db_attraction')->select('db_attraction.*','provinces.*','district.name_en as district_en','district.name_th as district_th')->leftJoin('provinces', 'db_attraction.ref_provinces_id', '=', 'provinces.code')
            ->leftJoin('district', 'db_attraction.ref_district_id', '=', 'district.code')
            ->where('db_attraction.ref_district_id', $district_id)
            ->where('db_attraction.category', $landmarks)->Orwhere('db_attraction.category', $attractions)->Orwhere('db_attraction.category', $restaurant)
            ->Orwhere('db_attraction.category', $activities)
            ->groupby('db_attraction.id')->get();
            return view('frontend.tourist_attraction_province', compact('district_id','province','district','landmarks_from','attractions_from','restaurant_from','activities_from','attraction'))->with('_district', $_district);
        }
    }

    public function get_touristattraction_datail($id)
    {  
        $attractionDetail = DB::table('db_attraction_image')->select('db_attraction_image.id as attraction_id','db_attraction_image.image','db_attraction.*','provinces.*','district.name_en as district_en','district.name_th as district_th')
        ->leftJoin('db_attraction', 'db_attraction_image.ref_attraction_id', '=', 'db_attraction.id')
        ->leftJoin('provinces', 'db_attraction.ref_provinces_id', '=', 'provinces.code')
        ->leftJoin('district', 'db_attraction.ref_district_id', '=', 'district.code')
        ->where('db_attraction.id', $id)
        ->first();
        $attractionDetails = DB::table('db_attraction_image')->where('ref_attraction_id', $id)->get();
        return view('frontend.tourist_attraction_detail', compact('attractionDetail','attractionDetails'));
    }

    public function get_review()
    {  
        $review = ReviewModel::where('ref_member_id',Auth::guard('member')->user()->id)->get();
        $reviews = ReviewModel::leftJoin('db_room', 'db_review.ref_room_id', '=', 'db_room.id')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')
        ->where('ref_member_id',Auth::guard('member')->user()->id)->where('db_review.status',1)->get();
        $review_c = ReviewModel::where('ref_member_id',Auth::guard('member')->user()->id)->where('status',0)->get();
        $check = count($review_c);
        return view('frontend.review')->with('review', $review)->with('reviews', $reviews)->with('check', $check);
    }

    public function get_review_hotel($id)
    {  
        $provinces = ProvinceModel::orderBy('code', 'ASC')->get();
        $pluck3 = $provinces->pluck('name_en')->toArray();
        $mix3 = implode(',',$pluck3);
        $pluck4 = $provinces->pluck('name_th')->toArray();
        $mix4 = implode(',',$pluck4);
        $mixall = $mix3.','.$mix4;
        $re = explode(',',$mixall);
        $results = $re;
        $today = date('d/m/Y');
        $tomorrow = date("d/m/Y", strtotime("+1 day"));
        $poolvilla = DB::table('db_poolvilla')->select('db_poolvilla.name_en as poolvilla_en','db_poolvilla.name_th as poolvilla_th','db_poolvilla.*','provinces.*')
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')
        ->where('db_poolvilla.id',$id)
        ->first();
        return view('frontend.review_hotel', compact('results','poolvilla','today','tomorrow'));
    }

    public function get_profile()
    {  
        $payment = PaymentModel::where('id_member',Auth::guard('member')->user()->id)->get();
        return view('frontend.profile')->with('payment', $payment);
    }

    public function get_mybooking()
    {  
        $mybooking = DB::table('db_booking')->select('db_booking.id as booking_id','db_booking.*','db_room.id as room_id','db_room.price as room_price','db_room.*','db_poolvilla.id as poolvilla_id','db_poolvilla.*')->leftJoin('db_room', 'db_booking.ref_room_id', '=', 'db_room.id')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')
        ->where('db_booking.ref_member_id',Auth::guard('member')->user()->id)
        ->where('db_booking.status', 'unpaid')->get();
        $mybookings = DB::table('db_booking')->select('db_booking.id as booking_id','db_booking.*','db_room.id as room_id','db_room.price as room_price','db_room.*','db_poolvilla.id as poolvilla_id','db_poolvilla.*')->leftJoin('db_room', 'db_booking.ref_room_id', '=', 'db_room.id')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')
        ->where('db_booking.ref_member_id',Auth::guard('member')->user()->id)
        ->where('db_booking.status', 'paid')->get();
        $Mybookings = DB::table('db_booking')->select('db_booking.id as booking_id','db_booking.*','db_room.id as room_id','db_room.price as room_price','db_room.*','db_poolvilla.id as poolvilla_id','db_poolvilla.*')->leftJoin('db_room', 'db_booking.ref_room_id', '=', 'db_room.id')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')
        ->where('db_booking.ref_member_id',Auth::guard('member')->user()->id)
        ->where('db_booking.status', 'cancle')->get();
        // $room = DB::table('db_booking')->leftJoin('db_room', 'db_booking.ref_room_id', '=', 'db_room.id')
        // ->where('db_booking.ref_member_id', Auth::guard('member')->user()->id)->orderBy('db_room.id', 'ASC')->get();
        // $pluck3 = $room->pluck('name')->toArray();
        // $mix3 = implode(',',$pluck3);
        // $pluck4 = $room->pluck('name_th')->toArray();
        // $mix4 = implode(',',$pluck4);
        // $mixall = $mix3.','.$mix4;
        // $re = explode(',',$mixall);
        // $results = $re;
        return view('frontend.mybooking')->with('mybooking', $mybooking)->with('mybookings', $mybookings)->with('Mybookings', $Mybookings);
    }

    // public function get_mybooking_search(Request $request)
    // { 
        
    //     return view('frontend.mybooking', compact('results'));
    // }

    public function update_mybooking(Request $request, $id)
    { 
        $email = $request->email;
        $member = DB::table('db_member')->where('email', $email)->first();
        $id_boohing = DB::table('db_booking')->where('id', $id)->first();
        $id_image_poolvilla = DB::table('db_booking')->select('db_booking.*','db_image_poolvilla.image')
        ->leftJoin('db_room', 'db_booking.ref_room_id', '=', 'db_room.id')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')
        ->leftJoin('db_image_poolvilla', 'db_poolvilla.id', '=', 'db_image_poolvilla.poolvilla_id')
        ->where('db_booking.id', $id)->first();
        $date = date('Y-m-d');
        $newDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
        $time = date('H:i:s');
        $newTime = \Carbon\Carbon::createFromFormat('H:i:s', $time)->format('H:i:s');
        if($member){
            DB::table('db_booking')->where('id', $id)->update([
                'status' => 'paid',
                'updated_at' => Carbon::now()
            ]);
            ReviewModel::create([
                'ref_member_id' => Auth::guard('member')->user()->id,
                'ref_room_id' => $id_boohing->ref_room_id,
                'ref_booking_id' => $id_boohing->id,
                'image' => $id_image_poolvilla->image,
                'status' => 0,
                'save_date' => $newDate,
                'save_time' => $newTime,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            echo '<script>
            alert("บันทึกข้อมูลเรียบร้อย");
            window.location.href = "' . url(Session::get('lang').'/mybooking') . '" ;
            </script>';  
        }else{
            return redirect(Session::get('lang').'/mybooking');
        }
    }

    public function cancel_mybooking(Request $request, $id)
    { 
        DB::table('db_booking')->where('id', $id)->update([
            'status' => 'cancle',
            'cancle_comment' => $request->cancle_comment,
            'updated_at' => Carbon::now()
        ]);
        echo '<script>
        alert("บันทึกข้อมูลเรียบร้อย");
        window.location.href = "' . url(Session::get('lang').'/mybooking') . '" ;
        </script>';  
    }

    public function updated_mybooking(Request $request, $id)
    { 
        DB::table('db_booking')->where('id', $id)->update([
            'fullname1' => $request->fullname1,
            'fullname2' => $request->fullname2,
            'updated_at' => Carbon::now()
        ]);
        echo '<script>
        alert("บันทึกข้อมูลเรียบร้อย");
        window.location.href = "' . url(Session::get('lang').'/mybooking') . '" ;
        </script>';  
    }

    public function get_booking_detail(Request $request, $id)
    { 
        $mybooking = DB::table('db_booking')
        ->select('db_booking.id as booking_id','db_booking.adult as booking_adult','db_booking.*','db_room.id as room_id','db_room.price as room_price','db_room.adult as room_adult','db_room.*','db_poolvilla.id as poolvilla_id','db_poolvilla.*','provinces.name_th as province_th','provinces.name_en as province_en','district.name_th as district_th','district.name_en as district_en')
        ->leftJoin('db_room', 'db_booking.ref_room_id', '=', 'db_room.id')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')
        ->leftJoin('db_partner_detail', 'db_poolvilla.partner_id', '=', 'db_partner_detail.id')
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')
        ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')
        ->where('db_booking.id', $id)->first();
        return view('frontend.booking_detail', compact('mybooking'));
    }

    public function get_promotion($id)
    { 
        $banner = Banner::where('status',1)->where('id', $id)->first();
        $discountRoom = DiscountRoomsModel::select('db_show_roomdetails_discount.id_roomdetails','db_show_roomdetails_discount.ref_banner_id','db_show_roomdetails_discount.ref_poolvilla_id as roomdiscount_poolvilla_id','db_show_roomdetails_discount.ref_room_id as roomdiscount_room_id','db_show_roomdetails_discount.ref_discount_id as roomdiscount_discount_id','db_show_roomdetails_discount.ref_start_date as roomdiscount_start_date','db_show_roomdetails_discount.ref_end_date as roomdiscount_end_date','db_show_roomdetails_discount.status as roomdiscount_status','db_poolvilla.name_en as poolvilla_en','db_poolvilla.name_th as poolvilla_th','db_poolvilla.star_rating','db_room.*','db_discount.*','provinces.name_th as province_th','provinces.name_en as province_en','district.name_th as district_th','district.name_en as district_en')
        ->leftJoin('db_poolvilla', 'db_show_roomdetails_discount.ref_poolvilla_id', '=', 'db_poolvilla.id')
        ->leftJoin('db_room', 'db_show_roomdetails_discount.ref_room_id', '=', 'db_room.id')
        ->leftJoin('db_discount', 'db_show_roomdetails_discount.ref_discount_id', '=', 'db_discount.id')
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')
        ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')
        ->where('db_show_roomdetails_discount.status', 1)
        ->where('db_show_roomdetails_discount.ref_banner_id', $id)->get();
        return view('frontend.promotion', compact('banner','discountRoom'));
    }

    public function get_category()
    {  
        $enjoywith = EnjoyWithModel::get();
        return view('frontend.category')->with('enjoywith', $enjoywith);
    }

    public function get_category_travel(Request $request)
    {  
        $enjoy_id = $request->id;
        $_enjoywith = EnjoyWithModel::find($enjoy_id);
        $c_from = $request->province;
        if($c_from != ''){
            $province = $c_from;
	 	}else{
            $province = NULL;
		}
        $lower_from = $request->lower;
        if($lower_from != ''){
            $lower = $lower_from;
        }else{
            $lower = NULL;
        }
        $upper_from = $request->upper;
        if($upper_from != ''){
            $upper = $upper_from;
        }else{
            $upper = NULL;
        }
        $sfive_from = $request->sfive;
        if($sfive_from != ''){   
            $sfive = $sfive_from;
        }else{
            $sfive = NULL;
        }
        $sfour_from = $request->sfour;
        if($sfour_from != ''){
            $sfour = $sfour_from;
        }else{
            $sfour = NULL;
        }
        $sthree_from = $request->sthree;
        if($sthree_from != ''){
            $sthree = $sthree_from;
        }else{
            $sthree = NULL;
        }
        $stwo_from = $request->stwo;
        if($stwo_from != ''){
            $stwo = $stwo_from;
        }else{
            $stwo = NULL;
        }
        $sone_from = $request->sone;
        if($sone_from != ''){ 
            $sone = $sone_from;
        }else{
            $sone = NULL;
        }
        $szero_from = $request->szero;
        if($szero_from != ''){
            $szero = $szero_from;
        }else{
            $szero = NULL;
        }
        $paymentone_from = $request->paymentone;
        if($paymentone_from == 1){
            $paymentone = 1;
        }else{
            $paymentone = NULL;
        }
        $paymenttwo_from = $request->paymenttwo;
        if($paymenttwo_from == 1){
            $paymenttwo = 1;
        }else{
            $paymenttwo = NULL;
        }
        $paymentthree_from = $request->paymentthree;
        if($paymentthree_from == 1){
            $paymentthree = 1;
        }else{
            $paymentthree = NULL;
        }
        $paymentfour_from = $request->paymentfour;
        if($paymentfour_from == 1){
            $paymentfour = 1;
        }else{
            $paymentfour = NULL;
        }
        $paymentfive_from = $request->paymentfive;
        if($paymentfive_from == 1){
            $paymentfive = 1;
        }else{
            $paymentfive = NULL;
        }
        $disone_from = $request->disone;
        if($disone_from != ''){   
            $disone = $disone_from;
        }else{
            $disone = NULL;
        }
        $distwo_from = $request->distwo;
        if($distwo_from != ''){
            $distwo = $distwo_from;
        }else{
            $distwo = NULL;
        }
        $disthree_from = $request->disthree;
        if($disthree_from != ''){
            $disthree = $disthree_from;
        }else{
            $disthree = NULL;
        }
        $disfour_from = $request->disfour;
        if($disfour_from != ''){
            $disfour = $disfour_from;
        }else{
            $disfour = NULL;
        }
        $disfive_from = $request->disfive;
        if($disfive_from != ''){ 
            $disfive = $disfive_from;
        }else{
            $disfive = NULL;
        }
        $query= DB::table('db_poolvilla')
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')
        ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')
        ->leftJoin('db_room', 'db_poolvilla.id', '=', 'db_room.poolvilla_id');
        $query->where('db_poolvilla.ref_enjoy_id',$enjoy_id);
        // $query->where('provinces.name_th','like',$request->province.'%')->Orwhere('provinces.name_en','like',$request->province.'%');
        // $query->where('db_room.adult','>=',$request->adult)->where('db_room.kids','>=',$request->kid);
        if(isset($sone) ||isset($stwo)||isset($sthree) ||isset($sfour)||isset($sfive)||isset($szero) ){
             $query->whereIn('db_poolvilla.star_rating',[$sone,$stwo,$sthree,$sfour,$sfive]);
        }
       
      
       
        if(isset($paymentone)){
            $query->where('db_poolvilla.credit',$paymentone);
        }
        if(isset($paymenttwo)){
     
            $query->where('db_poolvilla.paypal',$paymenttwo);
        }
        if(isset($paymentthree)){
            $query ->where('db_poolvilla.bank',$paymentthree);
        }
        if(isset($disone) ||isset($distwo)||isset($disthree) ||isset($disfour)||isset($disfive) ){
            $query->whereIn('db_poolvilla.distance',[$disone,$distwo,$disthree,$disfour,$disfive]);
        }
        if(isset($lower)&& isset($upper)){
            $query->whereBetween('db_room.price',[$lower,$upper]);            
        }      
      
        $query->select('db_poolvilla.*', 'provinces.name_th as province_th', 'provinces.name_en as province_en', 'district.name_th as district_th', 'district.name_en as district_en','db_room.price','db_room.adult','db_room.kids')
        ->groupby('db_room.poolvilla_id') ->groupby('db_poolvilla.id');
        $result=$query->get();
               if(isset($request->province)){
            $_province = ProvinceModel::where('name_en',$request->province)->Orwhere('name_th',$request->province)->first();
            ProvinceModel::where('name_en',$request->province)->Orwhere('name_th',$request->province)->update([
                'p_view' => $_province->p_view + 1,
            ]);
        }
        if(isset($request->district)){
                    $_city = DistrictModel::where('name_en',$request->district)->Orwhere('name_th',$request->district)->first(); 
                    DistrictModel::where('name_en',$request->district)->Orwhere('name_th',$request->district)->update([
                        'p_view' => $_city->p_view + 1,
                    ]);
        }

            $provinces = ProvinceModel::orderBy('code', 'ASC')->get();
            $pluck3 = $provinces->pluck('name_en')->toArray();
            $mix3 = implode(',',$pluck3);
            $pluck4 = $provinces->pluck('name_th')->toArray();
            $mix4 = implode(',',$pluck4);
            $mixall = $mix3.','.$mix4;
            $re = explode(',',$mixall);
            $results = $re;
            $today = date('d/m/Y');
            $tomorrow = date("d/m/Y", strtotime("+1 day"));
            return view('frontend.category_travel', compact('enjoy_id','_enjoywith','result','c_from','lower_from','upper_from','sfive_from','sfour_from','sthree_from','stwo_from','sone_from','szero_from','paymentone_from','paymenttwo_from','paymentthree_from','paymentfour_from','paymentfive_from','disone_from','distwo_from','disthree_from','disfour_from','disfive_from','provinces','results','today','tomorrow'));
        
        
    }

    public function register_member(Request $request)
    {
        $date = date('Y-m-d');
        $newDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
        $time = date('H:i:s');
        $newTime = \Carbon\Carbon::createFromFormat('H:i:s', $time)->format('H:i:s');
        if($request->password_1 == $request->password_2 && $request->password_1 != ""){
            $varible = Hash::make($request->password_1); 
            RegisterModel::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => $varible,
                'status' => 1,
                'save_date' => $newDate,
                'save_time' => $newTime,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        return redirect(Session::get('lang')."/signin");
    }

    public function search(request $request)
    { 
        $c_from = $request->province;
        if($c_from != ''){
            $province = $c_from;
	 	}else{
            $province = NULL;
		}
        $cin_from = $request->ci;
        if($cin_from != ''){
            $ci = $cin_from;
	 	}else{
            $ci = '01-'.date('m-Y');
		}
        $cout_from = $request->co;
        if($cout_from != ''){
            $co = $cout_from;
	 	}else{
            $co = date('t-m-Y',strtotime('01-'.date('m-Y')));
		}
        $a_from = $request->adult;
        if($a_from != ''){
            $adult = $a_from;
	 	}else{
            $adult = 1;
		}
        $k_from = $request->kid;
        if($k_from != ''){
            $kid = $k_from;
	 	}else{
            $kid = 1;
		}
        $r_from = $request->ro;
        if($r_from != ''){
            $ro = $r_from;
	 	}else{
            $ro = 1;
		}
        $lower_from = $request->lower;
        if($lower_from != ''){
            $lower = $lower_from;
        }else{
            $lower = NULL;
        }
        $upper_from = $request->upper;
        if($upper_from != ''){
            $upper = $upper_from;
        }else{
            $upper = NULL;
        }
        $sfive_from = $request->sfive;
        if($sfive_from != ''){   
            $sfive = $sfive_from;
        }else{
            $sfive = NULL;
        }
        $sfour_from = $request->sfour;
        if($sfour_from != ''){
            $sfour = $sfour_from;
        }else{
            $sfour = NULL;
        }
        $sthree_from = $request->sthree;
        if($sthree_from != ''){
            $sthree = $sthree_from;
        }else{
            $sthree = NULL;
        }
        $stwo_from = $request->stwo;
        if($stwo_from != ''){
            $stwo = $stwo_from;
        }else{
            $stwo = NULL;
        }
        $sone_from = $request->sone;
        if($sone_from != ''){ 
            $sone = $sone_from;
        }else{
            $sone = NULL;
        }
        $szero_from = $request->szero;
        if($szero_from != ''){
            $szero = $szero_from;
        }else{
            $szero = NULL;
        }
        $cateone_from = $request->cateone;
        if($cateone_from != ''){
            $cateone = $cateone_from;
        }else{

        }
        $catetwo_from = $request->catetwo;
        if($catetwo_from != ''){
            $catetwo = $catetwo_from;
        }else{

        }
        $catethree_from = $request->catethree;
        if($catethree_from != ''){
            $catethree = $catethree_from;
        }else{

        }
        $catefour_from = $request->catefour;
        if($catefour_from != ''){
            $catefour = $catefour_from;
        }else{

        }
        $paymentone_from = $request->paymentone;
        if($paymentone_from != ''){
            $paymentone = $paymentone_from;
        }else{

        }
        $paymenttwo_from = $request->paymenttwo;
        if($paymenttwo_from != ''){
            $paymenttwo = $paymenttwo_from;
        }else{

        }
        $paymentthree_from = $request->paymentthree;
        if($paymentthree_from != ''){
            $paymentthree = $paymentthree_from;
        }else{

        }
        $paymentfour_from = $request->paymentfour;
        if($paymentfour_from != ''){
            $paymentfour = $paymentfour_from;
        }else{

        }
        $paymentfive_from = $request->paymentfive;
        if($paymentfive_from != ''){
            $paymentfive = $paymentfive_from;
        }else{

        }
        $disone_from = $request->disone;
        if($disone_from != ''){   
            $disone = $disone_from;
        }else{
            $disone = NULL;
        }
        $distwo_from = $request->distwo;
        if($distwo_from != ''){
            $distwo = $distwo_from;
        }else{
            $distwo = NULL;
        }
        $disthree_from = $request->disthree;
        if($disthree_from != ''){
            $disthree = $disthree_from;
        }else{
            $disthree = NULL;
        }
        $disfour_from = $request->disfour;
        if($disfour_from != ''){
            $disfour = $disfour_from;
        }else{
            $disfour = NULL;
        }
        $disfive_from = $request->disfive;
        if($disfive_from != ''){ 
            $disfive = $disfive_from;
        }else{
            $disfive = NULL;
        }
        $enjoy_with=EnjoyWithModel::get();
        $query= DB::table('db_poolvilla')
            ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')
            ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')
            ->leftJoin('db_room', 'db_poolvilla.id', '=', 'db_room.poolvilla_id');
            $query->where('db_poolvilla.status','=',1)->where('db_room.status','=',1);
            $query->where('provinces.name_th','like',$request->province.'%')->Orwhere('provinces.name_en','like',$request->province.'%');
            $query->where('db_room.adult','>=',$request->adult)->where('db_room.kids','>=',$request->kid);
            if(isset($sone) ||isset($stwo)||isset($sthree) ||isset($sfour)||isset($sfive)||isset($szero) ){
                 $query->whereIn('db_poolvilla.star_rating',[$sone,$stwo,$sthree,$sfour,$sfive]);
            }
           
            if(isset($cateone) || isset($catetwo) || isset($catethree) || isset($catefour)){
                $query->whereIn('db_poolvilla.ref_enjoy_id',[@$cateone,@$catetwo,@$catethree,@$catefour,]);
            }
           
            if(isset($paymentone)){
                $query->where('db_poolvilla.credit',$paymentone);
            }
            if(isset($paymenttwo)){
         
                $query->where('db_poolvilla.paypal',$paymenttwo);
            }
            if(isset($paymentthree)){
                $query ->where('db_poolvilla.bank',$paymentthree);
            }
            if(isset($disone) ||isset($distwo)||isset($disthree) ||isset($disfour)||isset($disfive) ){
                $query->whereIn('db_poolvilla.distance',[$disone,$distwo,$disthree,$disfour,$disfive]);
            }
            if(isset($lower)&& isset($upper)){
                $query->whereBetween('db_room.price',[$lower,$upper]);            
            }      
         
            $query->select('db_poolvilla.*', 'provinces.name_th as province_th', 'provinces.name_en as province_en', 'district.name_th as district_th', 'district.name_en as district_en','db_room.price','db_room.adult','db_room.kids')
            ->groupby('db_room.poolvilla_id') ->groupby('db_poolvilla.id');
            $result=$query->get();
                   if(isset($request->province)){
                $_province = ProvinceModel::where('name_en',$request->province)->Orwhere('name_th',$request->province)->first();
                ProvinceModel::where('name_en',$request->province)->Orwhere('name_th',$request->province)->update([
                    'p_view' => $_province->p_view + 1,
                ]);
            }
            if(isset($request->district)){
                        $_city = DistrictModel::where('name_en',$request->district)->Orwhere('name_th',$request->district)->first(); 
                        DistrictModel::where('name_en',$request->district)->Orwhere('name_th',$request->district)->update([
                            'p_view' => $_city->p_view + 1,
                        ]);
            }
    
      
            $provinces = ProvinceModel::orderBy('code', 'ASC')->get();
            $pluck3 = $provinces->pluck('name_en')->toArray();
            $mix3 = implode(',',$pluck3);
            $pluck4 = $provinces->pluck('name_th')->toArray();
            $mix4 = implode(',',$pluck4);
            $mixall = $mix3.','.$mix4;
            $re = explode(',',$mixall);
            $results = $re;
            return view('frontend/select-hotel', compact('result','results','c_from', 'cin_from', 'cout_from', 'a_from', 'k_from', 'r_from', 'ro', 'lower_from', 'upper_from', 'sfive_from', 'sfour_from', 'sthree_from', 'stwo_from', 'sone_from', 'szero_from', 'cateone_from', 'catetwo_from', 'catethree_from', 'catefour_from', 'paymentone_from', 'paymenttwo_from', 'paymentthree_from', 'paymentfour_from', 'paymentfive_from','disone_from','distwo_from','disthree_from','disfour_from','disfive_from','enjoy_with')); 
        
    }

    public function updated_review(Request $request, $id)
    {
        ReviewModel::find($id)->update([
            'rating' => $request->rating,
            'review' => $request->review,
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);
        
        if($request->image != '' && $request->image != NULL){
            $review = ReviewModel::find($id);

            if($review){

                foreach($request->image as $key => $qq){

                    $aa = $request->image[$key];

                    $gal = new ImageReviewModel();

                    $gal->ref_member_id = Auth::guard('member')->user()->id;

                    $gal->ref_review_id = $review->id;

                    $file_name = 'review_'.date('YmdHis').$_FILES['image']['name'][$key];

                    $picture = $file_name; 

                    $aa->move(public_path() . '/image/review/', $picture);

                    $gal->image = 'image/review/'.$picture;

                    $gal->created_at = Carbon::now();

                    $gal->updated_at = Carbon::now();

                    $gal->save();  

                }

            } 
        }
        echo '<script>
        alert("บันทึกข้อมูลเรียบร้อย");
        window.location.href = "' . url(Session::get('lang').'/review') . '" ;
        </script>';

    }

    public function updated_profile(Request $request, $id)
    {
        RegisterModel::find($id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => Carbon::now()
        ]);
        echo '<script>
        alert("บันทึกข้อมูลเรียบร้อย");
        window.location.href = "' . url(Session::get('lang').'/profile') . '" ;
        </script>';
    }

    public function updated_password(Request $request, $id)
    {
        if($request->password_1 == $request->password_2 && $request->password_1 != "" && $request->password_3 != ""){
            $varible = Hash::make($request->password_1);
            RegisterModel::find($id)->update([
                'password' => $varible,
                'updated_at' => Carbon::now()
            ]);
        }
        echo '<script>
        alert("บันทึกข้อมูลเรียบร้อย");
        window.location.href = "' . url(Session::get('lang').'/signin') . '" ;
        </script>';
        
    }

    public function store_payment(Request $request)
    {
        PaymentModel::create([
            'id_member' => Auth::guard('member')->user()->id,
            'credit_number' => $request->credit_number,
            'credit_name' => $request->credit_name,
            'credit_date' => $request->credit_date,
            'credit_cvv' => $request->credit_cvv,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        echo '<script>
        alert("บันทึกข้อมูลเรียบร้อย");
        window.location.href = "' . url(Session::get('lang').'/profile') . '" ;
        </script>';
    }

    public function updated_payment(Request $request, $id)
    {
        PaymentModel::find($id)->update([
            'credit_number' => $request->credit_number,
            'credit_name' => $request->credit_name,
            'credit_date' => $request->credit_date,
            'credit_cvv' => $request->credit_cvv,
            'updated_at' => Carbon::now()
        ]);
        echo '<script>
        alert("บันทึกข้อมูลเรียบร้อย");
        window.location.href = "' . url(Session::get('lang').'/profile') . '" ;
        </script>';
    }

    public function destroy($id)
    {
        PaymentModel::find($id)->delete();
    }
   
}
