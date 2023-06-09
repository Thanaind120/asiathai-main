<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PartnerUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Facilities;
use App\Models\Poolvilla;
use App\Models\PoolvillaTH;
use App\Models\ImagePoolvilla;
use App\Models\PoolvillaIcon;
use App\Models\House;
use App\Models\HouseTH;
use App\Models\Icon;
use Illuminate\Support\Facades\DB;
class HouseDetailController extends Controller
{

    public function get_add_house($id){
        $user=User::where('id',$id)->first();
        $facilities=Facilities::where('status',1)->get();
        $icon=Icon::where('status',1)->get();
        $lang="en";
 
        $data=array(
            'user'=>$user,
            'facilities'=>$facilities,
            'icon'=>$icon,
            'id'=>$id,
            'lang'=>$lang,
        );
        return  view('backend.admin.hotel.form2',$data);
    }
    public function get_edit_house_th($id){

        $user=User::where('id',$id)->first();
        $facilities=Facilities::where('status',1)->get();
        $icon=Icon::where('status',1)->get();
        $house=HouseTH::where('id',$id)->first();
        $lang="th";
       
        $data=array(
            'user'=>$user,
            'facilities'=>$facilities,
            'icon'=>$icon,
            'id'=>$id,
            'house'=>$house,
            'lang'=>$lang,
        );
   
        return  view('backend.admin.hotel.form2',$data);
    }
    public function save_house(Request $r){
        // dd($r);
        if($r->lang=="en"){
        if($r->type==1){
            $house=new House();
            $house->name=$r->name;
            $house->room_size=$r->room_size;
            $house->room_price=$r->room_price;
            $house->max_rooms=$r->max_rooms;
            $house->max_adult=$r->max_adult;
            $house->max_children=$r->max_children;
            $house->bed=$r->bed;
            $house->pool=$r->pool;
            $house->description=$r->description;
            $house->poolvilla_id=$r->poolvilla_id;
            $house->save();
            return redirect()->to('backend/admin/manage_rooms/'.$r->poolvilla_id);
        }
        if($r->type==2){
            $house=House::where('poolvilla_id',$r->poolvilla_id)->first();
            $house->name=$r->name;
            $house->room_size=$r->room_size;
            $house->room_price=$r->room_price;
            $house->max_rooms=$r->max_rooms;
            $house->max_adult=$r->max_adult;
            $house->max_children=$r->max_children;
            $house->bed=$r->bed;
            $house->pool=$r->pool;
            $house->description=$r->description;
            $house->poolvilla_id=$r->poolvilla_id;
            $house->save();
            return redirect()->to('backend/admin/manage_rooms/'.$r->poolvilla_id);
        }
    }
    elseif($r->lang=="th"){
        if($r->type==1){
            $house=new HouseTH();
            $house->name=$r->name;
            $house->room_size=$r->room_size;
            $house->room_price=$r->room_price;
            $house->max_rooms=$r->max_rooms;
            $house->max_adult=$r->max_adult;
            $house->max_children=$r->max_children;
            $house->bed=$r->bed;
            $house->pool=$r->pool;
            $house->description=$r->description;
            $house->poolvilla_id=$r->poolvilla_id;
            $house->save();
            return redirect()->to('backend/admin/manage_rooms/'.$r->poolvilla_id);
        }
        if($r->type==2){
            $house=HouseTH::where('id',$r->id)->first();
            $house->name=$r->name;
            $house->room_size=$r->room_size;
            $house->room_price=$r->room_price;
            $house->max_rooms=$r->max_rooms;
            $house->max_adult=$r->max_adult;
            $house->max_children=$r->max_children;
            $house->bed=$r->bed;
            $house->pool=$r->pool;
            $house->description=$r->description;
            $house->poolvilla_id=$r->poolvilla_id;
            $house->save();
            return redirect()->to('backend/admin/manage_rooms/'.$r->poolvilla_id);
        }
    }
    }

    public function get_edit_pool_th($id) {
        $country = DB::select("select * from db_country order by country_id asc");
        $city = DB::select("select * from db_city order by city_id asc");
        $facilities=Facilities::where('status',1)->get();
        $poolvilla=PoolvillaTH::where('id',$id)->first();
        $icon=Icon::where('status',1)->get();
        $poolvilla_icon=PoolvillaIcon::where('poolvilla_id',$id)->get();
        $lang="th";
        $data=array(
        
            'facilities'=>$facilities,
            'icon'=>$icon,
            'country'=>$country,
            'city'=>$city,
            'poolvilla'=>$poolvilla,
            'poolvilla_icon'=>$poolvilla_icon,
            'lang'=>$lang,
        );
        return  view('backend.admin.hotel.form',$data);
    }
  
}
