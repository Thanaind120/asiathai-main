<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Partner;
use App\Models\Partner\Poolvilla;
use App\Models\Partner\ImageRoom;
use App\Models\Partner\PartnerDetail;
use App\Models\Partner\PartnerBank;
use App\Models\Partner\Postcode;
use App\Models\Partner\District;
use App\Models\Partner\Province;
use App\Models\Partner\Bank;
use App\Models\Partner\Question;
use App\Models\Partner\Room;
use App\Models\Partner\IconRoom;
use App\Models\Partner\StaftLanguages;
use App\Models\Partner\Discount;
use App\Mail\Sendmail;
use Mail;
class ReservationPartnerController extends Controller
{
    public function index($startdate,$enddate,$check,$type,$status){
  
  
          $id=Auth::guard('partner')->user()->id;
          $room=DB::table('db_room')
          ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')
          ->where('db_poolvilla.partner_id',$id)
          ->select('db_room.id','db_room.name')
          ->get();
   

          $query =DB::table('db_booking')
        ->leftJoin('db_room', 'db_booking.ref_room_id', '=', 'db_room.id')
        ->leftJoin('db_poolvilla', 'db_room.poolvilla_id', '=', 'db_poolvilla.id')     
        ->where('db_poolvilla.partner_id',$id);
   if($check == 'checkin'){
    $query->wherebetween('db_booking.check_in',[$startdate,$enddate]);
   }
   if($check == 'checkout'){
    $query->wherebetween('db_booking.check_out',[$startdate,$enddate]);
   }

      if($type != 0){
        $query ->where('db_booking.ref_room_id',$type);  
      }

      if($status !='All'){
        $query ->where('db_booking.status',$status);  
      }
    
    
      $query->select('db_booking.id','db_booking.check_in','db_booking.check_out','db_booking.number_of_night','db_booking.fullname2','db_room.name','db_poolvilla.name_th','db_booking.price','db_booking.status','db_booking.created_at');
      $booking=$query->get();
      
   
        $data = array(
          'room'=>$room,
          'startdate'=>$startdate,
          'enddate'=>$enddate,
          'booking'=>$booking,
          'check'=>$check,
          'type'=>$type,
          'status'=>$status,
         
        );
          return view('Partner.Reservation.index',$data);
      // }else{
      //   $year=date('Y');
      //   return redirect()->to('Partner/Dashboard/'.$year);
      // }
    }

    public function set_search(){
      $today=date("Y-m-d");
      return redirect()->to('Partner/Reservation/'.$today.'/'.$today.'/checkin/0/All');
    }

    public function cancle_reserve(Request $request){
      // dd($request);
      DB::table('db_booking')
      ->where('id', $request->id)  
      ->limit(1)  
      ->update(['status'=>'cancle','cancle_comment'=>$request->comment]); 
      $today=date("Y-m-d"); 
      return redirect()->to('Partner/Reservation/'.$today.'/'.$today.'/checkin/0/All');

    }
   
}
