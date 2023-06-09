<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Banner;
use App\Models\DiscountRoomsModel;
use App\Models\PoolvillaModel;
use App\Models\RoomModel;
use App\Models\DiscountModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DiscountRoomsController extends Controller
{
    
    public function get_index($id)
    {
        $banner = Banner::where('id', $id)->first();
        $discountrooms = DiscountRoomsModel::select('db_show_roomdetails_discount.*', 'db_poolvilla.id', 'db_poolvilla.name_en', 'db_poolvilla.name_th', 'db_room.id', 'db_room.name', 'db_room.poolvilla_id', 'db_discount.id', 'db_discount.discount',  'db_discount.start_date', 'db_discount.end_date', 'db_discount.ref_room_id')->leftJoin('db_poolvilla', 'db_show_roomdetails_discount.ref_poolvilla_id', '=', 'db_poolvilla.id')
        ->leftJoin('db_room', 'db_show_roomdetails_discount.ref_room_id', '=', 'db_room.id')
        ->leftJoin('db_discount', 'db_show_roomdetails_discount.ref_discount_id', '=', 'db_discount.id')
        ->where('ref_banner_id', $id)->get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::user()->position)->first();
        $data = array(
            'banner'=>$banner,
            'discountrooms'=>$discountrooms,
            'check'=>$check,
        );
        return view('backend.banner.manage_roomdetail_discount.index',$data);
    }

    public function get_add($id)
    {
        $banner = Banner::where('id', $id)->first();
        $poolvilla = PoolvillaModel::get();
        $data = array(
            'banner'=>$banner,
            'poolvilla'=>$poolvilla,
        );
        return view('backend.banner.manage_roomdetail_discount.form',$data);
    }

    public function get_edit($id, $id_roomdetails)
    {
        $banner = Banner::where('id', $id)->first();
        $discountrooms = DiscountRoomsModel::where('id_roomdetails',$id_roomdetails)->first();
        $poolvilla = PoolvillaModel::get();
        $room = RoomModel::where('poolvilla_id', $discountrooms->ref_poolvilla_id)->get();
        $discount = DiscountModel::where('ref_room_id', $discountrooms->ref_room_id)->get();
        $discountSdate = DiscountModel::where('start_date', $discountrooms->ref_start_date)->get();
        $discountEdate = DiscountModel::where('end_date', $discountrooms->ref_end_date)->get();
        $data = array(
            'banner'=>$banner,
            'poolvilla'=>$poolvilla,
            'room'=>$room,
            'discount'=>$discount,
            'discountSdate'=>$discountSdate,
            'discountEdate'=>$discountEdate,
            'discountrooms'=>$discountrooms,
        );
        return view('backend.banner.manage_roomdetail_discount.form',$data);
    }

    public function getRoom($id)
    {
        $room = RoomModel::where("poolvilla_id",$id)->get()->pluck("name","id");
        return response()->json($room);
    }

    public function getDiscount($id)
    {
        $discount = DiscountModel::where("room_id",$id)->get();
        return response()->json((['discount'=>$discount]));
    }

    public function save_discount_rooms(Request $r, $id) 
    {
        if($r->type == 1){
            $banner = Banner::where('id', $id)->first();
            DiscountRoomsModel::create([
                'id_roomdetails' => $r->id_roomdetails,
                'ref_banner_id' => $r->id,
                'ref_poolvilla_id' => $r->ref_poolvilla_id,
                'ref_room_id' => $r->ref_room_id,
                'ref_discount_id' => $r->ref_discount_id,
                'ref_start_date' => $r->ref_start_date,
                'ref_end_date' => $r->ref_end_date,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to('backend/admin/banner/discount-rooms/'.$banner->id)->with('success','Upload Discount Rooms Success');
        } 
    }

    public function update_discount_rooms(Request $r, $id, $id_roomdetails) 
    {
        if($r->type == 2){
            if(isset($r->status)){
                $status = 1;
            }else{
                $status = 0;
            }
            $banner = Banner::where('id', $id)->first();
            DiscountRoomsModel::find($id_roomdetails)->update([
                'ref_poolvilla_id' => $r->ref_poolvilla_id,
                'ref_room_id' => $r->ref_room_id,
                'ref_discount_id' => $r->ref_discount_id,
                'ref_start_date' => $r->ref_start_date,
                'ref_end_date' => $r->ref_end_date,
                'status' => $status,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to('backend/admin/banner/discount-rooms/'.$banner->id)->with('success','Upload Discount Rooms Success');
        }
    }

    public function delete_discount_rooms(Request $r, $id) 
    {
        $banner = Banner::where('id', $id)->first();
        $discountRooms = DiscountRoomsModel::where('id_roomdetails',$r->id)->first();
        $discountRooms->delete();
        return  redirect()->to('backend/admin/banner/discount-rooms/'.$banner->id)->with('success','Delete Discount Rooms Success');
    }

}
