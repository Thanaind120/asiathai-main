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

class SelectRoomController extends Controller
{
    public function get_poolvilla($id,$check_in,$check_out,$adult,$kid,$select_room){
        // poolvilla
        $poolvilla=DB::table('db_poolvilla')
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')
        ->leftJoin('db_country', 'db_poolvilla.ref_country_id', '=', 'db_country.country_id')
        ->where('db_poolvilla.id',$id)
        // ->select(DB::raw('select * from db_image_poolvilla where db_poolvilla.id = db_image_poolvilla.poolvilla_id'))
        ->select('db_poolvilla.*','provinces.name_en as province_name','db_country.country_name')
        ->first();
        $review = DB::table('db_review')->select('db_review.image as review_img','db_review.review','db_poolvilla.name_en as poolvilla_en','db_poolvilla.name_th as poolvilla_th','db_room.name','provinces.name_en as province_en','provinces.name_th as province_th','district.name_en as district_en','district.name_th as district_th')
        ->leftJoin('db_room', 'db_review.ref_room_id', '=', 'db_room.id')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')
        ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')
        ->where('db_poolvilla.id',$id)
        ->where('db_review.status',1)->inRandomOrder()->limit(3)->get();
        $poolvillas = DB::table('db_poolvilla')
        ->select('db_poolvilla.*', 'provinces.name_th as province_th', 'provinces.name_en as province_en', 'district.name_th as district_th', 'district.name_en as district_en','db_room.price','db_room.adult','db_room.kids')
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')
        ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')
        ->leftJoin('db_room', 'db_poolvilla.id', '=', 'db_room.poolvilla_id')
        ->inRandomOrder()->get();
        $room=DB::table('db_room')
        ->where('poolvilla_id',$id)->where('status',1)->get();
        $total_room=count($room);
        $provinces = ProvinceModel::orderBy('code', 'ASC')->get();
        $pluck3 = $provinces->pluck('name_en')->toArray();
        $mix3 = implode(',',$pluck3);
        $pluck4 = $provinces->pluck('name_th')->toArray();
        $mix4 = implode(',',$pluck4);
        $mixall = $mix3.','.$mix4;
        $re = explode(',',$mixall);
        $results = $re;
        return view('frontend.select-rooms', compact('poolvilla','poolvillas','review','results','room','total_room','id','check_in','check_out','adult','kid','select_room'));
    }
    public function get_index()
    {  
        $province = ProvinceModel::orderBy('p_view', 'DESC')->get();
        $banner = Banner::where('status',1)->get();
        // $poolvilla = PoolvillaModel::where('status', 1)->orderBy('id', 'ASC')->get();
        // $pluck = $poolvilla->pluck('name_en')->toArray();
        // $mix = implode(',',$pluck);
        // $pluck2 = $poolvilla->pluck('name_th')->toArray();
        // $mix2 = implode(',',$pluck2);
        // $mixall = $mix.','.$mix2;
        $provinces = ProvinceModel::orderBy('code', 'ASC')->get();
        $pluck3 = $provinces->pluck('name_en')->toArray();
        $mix3 = implode(',',$pluck3);
        $pluck4 = $provinces->pluck('name_th')->toArray();
        $mix4 = implode(',',$pluck4);
        $mixall = $mix3.','.$mix4;
        $re = explode(',',$mixall);
        $result = $re;
        $today=date('d/m/Y');
        $tomorrow = date("d/m/Y", strtotime("+1 day"));
        return view('frontend.index', compact('province','banner','result','today','tomorrow'));
    }
    
    public function get_select_country(Request $request,$id)
    { 
        $_city = DistrictModel::leftJoin('provinces', 'district.province_code', '=', 'provinces.code')->where('district.province_code',$id)->orderBy('district.p_view', 'DESC')->get();
        $_country = ProvinceModel::find($id);
        ProvinceModel::find($id)->update([
            'p_view' => $_country->p_view + 1,
        ]);
        return view('frontend.select-country')->with('_country', $_country)->with('_city', $_city);
    }

    public function get_select_hotel(Request $request,$id_country,$id)
    { 
        
        $_city = DistrictModel::find($id);
        DistrictModel::find($id)->update([
            'p_view' => $_city->p_view + 1,
        ]);

        $result = PoolvillaModel::orderBy('id', 'DESC')->get();
    
        return view('frontend.select-hotel', compact('result','enjoy'))->with('_city', $_city);
    }

    public function get_tourist_attraction()
    {  
        return view('frontend.tourist_attraction');
    }

    public function get_review()
    {  
        $review = ReviewModel::where('id_member',Auth::guard('member')->user()->id)->get();
        $reviews = ReviewModel::where('id_member',Auth::guard('member')->user()->id)->where('status',1)->get();
        $review_c = ReviewModel::where('id_member',Auth::guard('member')->user()->id)->where('status',0)->get();
        $check = count($review_c);
        return view('frontend.review')->with('review', $review)->with('reviews', $reviews)->with('check', $check);
    }

    public function get_profile()
    {  
        $payment = PaymentModel::where('id_member',Auth::guard('member')->user()->id)->get();
        return view('frontend.profile')->with('payment', $payment);
    }

    public function get_promotion($id)
    { 
        $banner = Banner::where('status',1)->where('id', $id)->first();
        $discountRoom = DiscountRoomsModel::leftJoin('db_poolvilla', 'db_show_roomdetails_discount.ref_poolvilla_id', '=', 'db_poolvilla.id')
        ->leftJoin('db_room', 'db_show_roomdetails_discount.ref_room_id', '=', 'db_room.id')
        ->leftJoin('db_discount', 'db_show_roomdetails_discount.ref_discount_id', '=', 'db_discount.id')
        ->leftJoin('db_country', 'db_poolvilla.ref_country_id', '=', 'db_country.country_id')
        ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')
        ->where('db_show_roomdetails_discount.status', 1)
        ->where('db_show_roomdetails_discount.ref_banner_id', $id)
        ->get();
        return view('frontend.promotion', compact('banner','discountRoom'));
    }

    public function get_category()
    {  
        $enjoywith = EnjoyWithModel::get();
        return view('frontend.category')->with('enjoywith', $enjoywith);
    }

    public function get_category_travel(Request $request,$enjoy_id)
    {  
        $_enjoywith = EnjoyWithModel::find($enjoy_id);
        EnjoyWithModel::find($enjoy_id)->update([
            'p_view' => $_enjoywith->p_view + 1,
        ]);
        return view('frontend.category_travel');
    }

    public function register_member(Request $request)
    {
        $date = date('Y-m-d');
        $newDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
        $time = date('H:i:s');
        $newTime = \Carbon\Carbon::createFromFormat('H:i:s', $time)->format('H:i:s');
        if($request->password_1 == $request->password_2 && $request->password_1 != ""){

            // $pw = md5($request->password_1);
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
      
        $enjoy_with=EnjoyWithModel::get();
        if(isset($lower) || isset($upper) || isset($sfive) || isset($sfour) || isset($sthree) || isset($stwo) || isset($sone) || isset($szero) || isset($cateone) || isset($catetwo) || isset($catethree) || isset($catefour) || isset($paymentone) || isset($paymenttwo) || isset($paymentthree) || isset($paymentfour) || isset($paymentfive)  || isset($disone) || isset($distwo) || isset($disthree) || isset($disfour) || isset($disfive)){
            $poolvilla= DB::table('db_poolvilla')
            ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')
            ->leftJoin('db_room', 'db_poolvilla.id', '=', 'db_room.poolvilla_id')
            ->leftJoin('db_country', 'db_poolvilla.ref_country_id', '=', 'db_country.country_id')
            ->where('db_room.adult','>=',$request->adult)->where('db_room.kids','>=',$request->kid)
            ->whereIn('db_poolvilla.star_rating',[$request->sone,$request->stwo,$request->sthree,$request->sfour,$request->sfive,])
            ->whereIn('db_poolvilla.ref_enjoy_id',[$request->cateone,$request->catetwo,$request->catethree,$request->catefour,])
            ->orwhere('db_poolvilla.credit',$request->cateone)->orwhere('db_poolvilla.paypal',$request->catetwo)->orwhere('db_poolvilla.bank',$request->catethree)
            ->whereIn('db_poolvilla.distance',[$request->cateone,$request->catetwo,$request->catethree,$request->catefour,])
            ->whereBetween('db_room.price',[$request->lower,$request->upper])
            ->where('provinces.name_th','like',$request->province.'%')->Orwhere('provinces.name_en','like',$request->province.'%')       
    
            ->select('db_poolvilla.*', 'provinces.name_th as province','db_room.price','db_room.adult','db_room.kids','db_country.country_name')    
            // 
            ->get();
            // dd($poolvilla);
            $result=$poolvilla;
            // ->where('adult','>=', $adult)->where('kids','>=', $kid)->where('room','>=', $ro)->where('star_rate', $sfive)->orWhere('star_rate', $sfour)->orWhere('star_rate', $sthree)->orWhere('star_rate', $stwo)->orWhere('star_rate', $sone)->orWhere('star_rate', $szero)->orderBy('id', 'DESC')->get();
            return view('frontend/select-hotel', compact('result','c_from', 'cin_from', 'cout_from', 'a_from', 'k_from', 'r_from', 'ro', 'lower_from', 'upper_from', 'sfive_from', 'sfour_from', 'sthree_from', 'stwo_from', 'sone_from', 'szero_from', 'cateone_from', 'catetwo_from', 'catethree_from', 'catefour_from', 'paymentone_from', 'paymenttwo_from', 'paymentthree_from', 'paymentfour_from', 'paymentfive_from','enjoy_with'));
        }else{
            dd($request);
            $poolvilla= DB::table('db_poolvilla')
            ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')
            ->leftJoin('db_room', 'db_poolvilla.id', '=', 'db_room.poolvilla_id')
            ->leftJoin('db_country', 'db_poolvilla.ref_country_id', '=', 'db_country.country_id')

            ->where('db_room.adult','>=',$request->adult)->where('db_room.kids','>=',$request->kid)
            ->where('provinces.name_th','like',$request->province.'%')->Orwhere('provinces.name_en','like',$request->province.'%')
            // ->whereIn('db_poolvilla.star_rating',[$request->sone,$request->stwo,$request->sthree,$request->sfour,$request->sfive,])  
            ->select('db_poolvilla.*', 'provinces.name_th as province','db_room.price','db_room.adult','db_room.kids','db_country.country_name')  
            ->groupby('poolvilla.id')   
       
            ->get();
            // dd($poolvilla);
            $result=$poolvilla;
            // $result = PoolvillaModel::where('name_en', $province)->orwhere('name_th', $province)->orderBy('id', 'DESC')->get();
            // ->where('adult','>=', $adult)->where('kids','>=', $kid)->where('room','>=', $ro)->orderBy('id', 'DESC')->get();
            return view('frontend/select-hotel', compact('result','c_from', 'cin_from', 'cout_from', 'a_from', 'k_from', 'r_from', 'ro', 'lower_from', 'upper_from', 'sfive_from', 'sfour_from', 'sthree_from', 'stwo_from', 'sone_from', 'szero_from', 'cateone_from', 'catetwo_from', 'catethree_from', 'catefour_from', 'paymentone_from', 'paymenttwo_from', 'paymentthree_from', 'paymentfour_from', 'paymentfive_from','enjoy_with')); 
        }
    }

    public function updated_review(Request $request, $id)
    {
        ReviewModel::find($id)->update([
            'recommend_rate' => $request->recommend_rate,
            'write_review' => $request->write_review,
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);
        
        if($request->img_review != '' && $request->img_review != NULL){
            $review = ReviewModel::find($id);

            if($review){

                foreach($request->img_review as $key => $qq){

                    $aa = $request->img_review[$key];

                    $gal = new ImageReviewModel();

                    $gal->id_member = Auth::guard('member')->user()->id;

                    $gal->id_review = $review->id;

                    $file_name = 'review_'.date('YmdHis').$_FILES['img_review']['name'][$key];

                    $picture = $file_name;

                    $aa->move(public_path() . '/assets_frontend/images/', $picture);

                    $gal->img_review = $picture;

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
        Auth::logout();$request->session()->invalidate();
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
