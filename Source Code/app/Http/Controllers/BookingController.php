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
use App\Mail\Bookingmail;


class BookingController extends Controller
{
    public function get_booking(Request $request){
        if(!isset($request->total_room)){
            return redirect()->back()->with('warning','กรุณาเลือกจำนวนห้อง');
        }
        $check_in=date("Y-m-d", strtotime($request->check_in));
        $check_out=date("Y-m-d", strtotime($request->check_out));
       $diff= strtotime($check_out) - strtotime($check_in);
       $night=$diff/(60 * 60 * 24);
        if(! Auth::guard('member')->user()) 
        {
            return redirect()->to(Session::get('lang').'/signin');
        }
        $room= DB::table('db_room')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')  
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')      
        ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')      
        ->where('db_room.id',$request->room_id)
        ->select('db_room.*','db_poolvilla.*','db_room.id as room_id','db_poolvilla.id as poolvilla_id','provinces.name_en as province_name','district.name_en as district_name')
        ->first();
        $image_poolvilla= DB::table('db_image_poolvilla')
        ->where('poolvilla_id',$room->poolvilla_id)
        ->orderby('id','desc')->first();

       $total_price=($request->total_room*$room->price)*$night;
       $convert_check_in=date("d-m-Y", strtotime($check_in));
       $convert_check_out=date("d-m-Y", strtotime($check_out));
        $data =array(
            'room'=>$room,
            'image_poolvilla'=>$image_poolvilla,
            'night'=>$night,
            'check_in'=>$check_in,
            'check_out'=>$check_out,
            'total_room'=>$request->total_room,
            'adult'=>$request->adult,
            'kid'=>$request->kid,
            'total_price'=>$total_price,
            'convert_check_in'=>$convert_check_in,
            'convert_check_out'=>$convert_check_out,
        );
        return view('frontend.booking-1',$data);
    }
    public function save_booking1(Request $request)
    {  
      

     if(isset($request->other)){
         $other=1;
     }else{
         $other=0;
     }
     if(isset($request->with_kid)){
         $with_kid=1;
     }else{
         $with_kid=0;
     }
    $booking_id= DB::table('db_booking')->insertGetId([
        'ref_room_id' => $request->room_id, 
        'check_in' => $request->check_in,
        'check_out'=>$request->check_out,
        'number_of_room'=>$request->total_room,
        'number_of_night'=>$request->night,
        'price'=>$request->total_price,
        'adult'=>$request->adult,
        'kid'=>$request->kid,
        'ref_member_id'=>Auth::guard('member')->user()->id,
        'fullname1'=>$request->fullname1,
        'email'=>$request->email1,
        'phone1'=>$request->phone1,
        'address1'=>$request->address1,
        'other'=>$other,
        'fullname2'=>$request->fullname2,
        'address2'=>$request->address2,
        'with_kid'=>$with_kid,
        'arriving'=>$request->arriving,
        'status'=>'unpaid',
        'booking_date'=>date("Y-m-d"),
        'created_at'=>date("Y-m-d H:i:s"),
        'updated_at'=>date("Y-m-d H:i:s")

        
    ]);
  

        return redirect()->to(Session::get('lang')."/booking-2/".$booking_id);
    }
    
    public function get_booking2($id){
        $booking= DB::table('db_booking')->where('id',$id)->first();
        // dd($booking);
   
        if( Auth::guard('member')->user()->id != $booking->ref_member_id ) 
        {
            return redirect()->to('/'.Session::get('lang'));
        }
        $room= DB::table('db_room')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')  
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')      
        ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')      
        ->where('db_room.id',$booking->ref_room_id)
        ->select('db_room.*','db_poolvilla.*','db_room.id as room_id','db_poolvilla.id as poolvilla_id','provinces.name_en as province_name','district.name_en as district_name')
        ->first();
   
        $image_poolvilla= DB::table('db_image_poolvilla')
        ->where('poolvilla_id',$room->poolvilla_id)
        ->orderby('id','desc')->first();

    //    $total_price=($request->total_room*$room->price)*$night;
    //    $convert_check_in=date("d-m-Y", strtotime($check_in));
    //    $convert_check_out=date("d-m-Y", strtotime($check_out));
        $data =array(
            'room'=>$room,
            'image_poolvilla'=>$image_poolvilla,
            'booking'=>$booking,
            'id'=>$id,
            // 'check_in'=>$check_in,
            // 'check_out'=>$check_out,
            // 'total_room'=>$request->total_room,
            // 'adult'=>$request->adult,
            // 'kid'=>$request->kid,
            // 'total_price'=>$total_price,
            // 'convert_check_in'=>$convert_check_in,
            // 'convert_check_out'=>$convert_check_out,
        );
        return view('frontend.booking-2',$data);
    }

    public function save_booking2(Request $request)
    {  
        // dd($request);
        if(isset($request->save_credit)){
            $card=PaymentModel::where('credit_number',$request->credit_number)->first();
            if(!isset($card)){
            PaymentModel::create([
                'id_member' => Auth::guard('member')->user()->id,
                'credit_number' => $request->credit_number,
                'credit_name' => $request->credit_name,
                'credit_date' => $request->credit_date,
                'credit_cvv' => $request->credit_cvv,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        }
   
       DB::table('db_booking')
        ->where('id', $request->booking_id)  
        ->limit(1)  
        ->update(['status'=>'paid']);  
        $booking=DB::table('db_booking')->where('id', $request->booking_id)->first();  
        $room= DB::table('db_room')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')  
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')      
        ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')      
        ->where('db_room.id',$booking->ref_room_id)
        ->select('db_room.*','db_poolvilla.*','db_room.id as room_id','db_poolvilla.id as poolvilla_id','provinces.name_en as province_name','district.name_en as district_name')
        ->first();
        $data_insert = [
            'email' => Auth::guard('member')->user()->email,
            'code' => $booking->id,
            'fullname'=>$booking->fullname2,
            'phone'=>$booking->phone1,
            'poolvilla_name'=>$room->name_en,
            'check_in'=>$booking->check_in,
            'check_out'=>$booking->check_out,
            'total'=>$booking->price,
            
        ];
        Mail::send(new Bookingmail($data_insert));
        return redirect()->to(Session::get('lang')."/booking-3/".$request->booking_id);
    }

    public function get_booking3($id){
        $booking= DB::table('db_booking')->where('id',$id)->first();
        // dd($booking);
   
        if( Auth::guard('member')->user()->id != $booking->ref_member_id ) 
        {
            return redirect()->to('/'.Session::get('lang'));
        }
        $room= DB::table('db_room')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')  
        ->leftJoin('provinces', 'db_poolvilla.ref_province_id', '=', 'provinces.code')      
        ->leftJoin('district', 'db_poolvilla.ref_district_id', '=', 'district.code')      
        ->where('db_room.id',$booking->ref_room_id)
        ->select('db_room.*','db_poolvilla.*','db_room.id as room_id','db_poolvilla.id as poolvilla_id','provinces.name_en as province_name','district.name_en as district_name')
        ->first();
   
        $image_poolvilla= DB::table('db_image_poolvilla')
        ->where('poolvilla_id',$room->poolvilla_id)
        ->orderby('id','desc')->first();

        $today=date('Y-m-d');
        $tomorrow = date("Y-m-d", strtotime("+1 day"));
        $data =array(
            'room'=>$room,
            'image_poolvilla'=>$image_poolvilla,
            'booking'=>$booking,
            'today'=>$today,
            'tomorrow'=>$tomorrow,
        );
        return view('frontend.booking-3',$data);
    }

   
}
