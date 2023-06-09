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
class DashboardPartnerController extends Controller
{
    public function index($year){
      // dd($request);
      // if(isset($year)){
          $first_day=date("$year-01-01");
          $last_day=date("$year-12-t");
          $id=Auth::guard('partner')->user()->id;
        // กรณีนับคนเข้าพัก
        // $poolvilla=DB::table('db_poolvilla')
        // ->leftJoin('db_room', 'db_poolvilla.id', '=', 'db_room.poolvilla_id')
        // ->leftJoin('db_booking', 'db_room.id', '=', 'db_booking.ref_room_id')
        // ->where('db_poolvilla.partner_id',$id)->wherebetween('db_booking.booking_date',[$first_day,$last_day])
        // ->select('db_poolvilla.name_en','db_booking.booking_date',DB::raw('sum(db_booking.adult) + sum(db_booking.kid) as guest'),DB::raw("DATE_FORMAT(db_booking.booking_date, '%m') as month"))
        // ->groupBy(DB::raw("DATE_FORMAT(db_booking.booking_date, '%m-%Y')"))
        // ->get();

          // ข้อมูล poolvilla ในกราฟ
          $poolvilla=DB::table('db_poolvilla')
        ->leftJoin('db_room', 'db_poolvilla.id', '=', 'db_room.poolvilla_id')
        ->leftJoin('db_booking', 'db_room.id', '=', 'db_booking.ref_room_id')
        ->where('db_poolvilla.partner_id',$id)->wherebetween('db_booking.check_in',[$first_day,$last_day])
        ->select('db_poolvilla.name_en','db_booking.check_in',DB::raw('count(db_booking.id) as room'),DB::raw("DATE_FORMAT(db_booking.check_in, '%m') as month"))
        ->groupBy(DB::raw("DATE_FORMAT(db_booking.check_in, '%m-%Y')"))
        ->get();

        // ข้อมูลรายการจองทั้งหมดในปี
        $total_booking=DB::table('db_poolvilla')
        ->leftJoin('db_room', 'db_poolvilla.id', '=', 'db_room.poolvilla_id')
        ->leftJoin('db_booking', 'db_room.id', '=', 'db_booking.ref_room_id')
        ->where('db_poolvilla.partner_id',$id)->wherebetween('db_booking.check_in',[$first_day,$last_day])
        ->select(DB::raw('count(db_booking.id) as total'))
        ->first();  
         
        // ข้อมูลรายการจองที่จ่ายเงินในปี
         $total_booking_paid=DB::table('db_poolvilla')
         ->leftJoin('db_room', 'db_poolvilla.id', '=', 'db_room.poolvilla_id')
         ->leftJoin('db_booking', 'db_room.id', '=', 'db_booking.ref_room_id')
         ->where('db_poolvilla.partner_id',$id)->wherebetween('db_booking.check_in',[$first_day,$last_day])->where('db_booking.status','=','paid')
         ->select(DB::raw('count(db_booking.id) as total'))
         ->first();    
         
       // ข้อมูลรายการจองที่ยกเลิกในปี
       $total_booking_cancle=DB::table('db_poolvilla')
       ->leftJoin('db_room', 'db_poolvilla.id', '=', 'db_room.poolvilla_id')
       ->leftJoin('db_booking', 'db_room.id', '=', 'db_booking.ref_room_id')
       ->where('db_poolvilla.partner_id',$id)->wherebetween('db_booking.check_in',[$first_day,$last_day])->where('db_booking.status','=','cancle')
       ->select(DB::raw('count(db_booking.id) as total'))
       ->first();            

        // คำนวณรายได้
        $gross_income=DB::table('db_poolvilla')
        ->leftJoin('db_room', 'db_poolvilla.id', '=', 'db_room.poolvilla_id')
        ->leftJoin('db_booking', 'db_room.id', '=', 'db_booking.ref_room_id')
        ->where('db_poolvilla.partner_id',$id)->wherebetween('db_booking.check_in',[$first_day,$last_day])->where('db_booking.status','paid')
        ->select(DB::raw('sum(db_booking.price) as price'))     
        ->first();     
        $comission=Auth::guard('partner')->user()->comission/100;
        $comission_price=$gross_income->price*$comission;
        $total_income=$gross_income->price-$comission_price;
        

        $this_year=date('Y');
        $data = array(
          'poolvilla'=>$poolvilla,
          'year'=>$year,
          'this_year'=>$this_year,
          'gross_income'=>$gross_income,
          'comission_price'=>$comission_price,
          'total_income'=>$total_income,
          'total_booking'=>$total_booking,
          'total_booking_paid'=>$total_booking_paid,
          'total_booking_cancle'=>$total_booking_cancle
        );
          return view('Partner.Dashboard.index',$data);
      // }else{
      //   $year=date('Y');
      //   return redirect()->to('Partner/Dashboard/'.$year);
      // }
    }

    public function set_year(){
      $year=date('Y');
      return redirect()->to('Partner/Dashboard/'.$year);
    }
   
}
