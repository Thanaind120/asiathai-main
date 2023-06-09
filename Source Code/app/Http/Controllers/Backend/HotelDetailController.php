<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\PartnerUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Facilities;
use App\Models\Poolvilla;
use App\Models\PoolvillaTH;
use App\Models\House;
use App\Models\ImagePoolvilla;
use App\Models\PoolvillaIcon;
use App\Models\Icon;
use Illuminate\Support\Facades\DB;
class HotelDetailController extends Controller
{
    
    public function get_index($id) {

        $poolvilla=Poolvilla::where('user_id',$id)->get();
        $user=PartnerUsers::where('id',$id)->first();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::user()->position)->first();
    //   dd($user);
        $data=array(
            'poolvilla'=>$poolvilla,
            'user'=>$user,
            'check'=>$check,
        );
        return  view('backend.admin.hotel.index',$data);
    }
    public function get_index2($id) {      
        // $user=User::where('position','hotel')->get();
        $image_poolvilla=ImagePoolvilla::where('poolvilla_id',$id)->get();
        $data=array(
            'image_poolvilla'=>$image_poolvilla,
            'user'=>$id,
        );
        return  view('backend.admin.hotel.index2',$data);
    }
    public function get_index3($id) {

        $user=User::where('position','hotel')->get();
        $house=House::where('poolvilla_id',$id)->get();
        $data=array(
            'user'=>$user,
            'id'=>$id,
            'house'=>$house,
        );
        return  view('backend.admin.hotel.index3',$data);
    }
    public function get_add_poolvilla($id){
        $country = DB::select("select * from db_country order by country_id asc");
        $facilities=Facilities::where('status',1)->get();
        $icon=Icon::where('status',1)->get();
        $country = DB::select("select * from db_country order by country_id asc");
        $city = DB::select("select * from db_city order by city_id asc");
        // $user=User::where('id','hotel')->get();
        // dd($id);
        $data=array(        
            'facilities'=>$facilities,
            'icon'=>$icon,
            'country'=>$country,
            'user_id'=>$id,
            'country'=>$country,
            'city'=>$city,
        );
        return  view('backend.admin.hotel.form',$data);
    }
    public function get_form($id) {
        $country = DB::select("select * from db_country order by country_id asc");
        $city = DB::select("select * from db_city order by city_id asc");
        $facilities=Facilities::where('status',1)->get();
        $poolvilla=Poolvilla::where('id',$id)->first();
        $icon=Icon::where('status',1)->get();
        $poolvilla_icon=PoolvillaIcon::where('poolvilla_id',$id)->get();
        $lang="en";
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

    public function get_form2($p) {

        $user=User::where('id',$p)->first();
        $facilities=Facilities::where('status',1)->get();
        $icon=Icon::where('status',1)->get();
        $house=House::where('id',$p)->first();
        $lang="en";
        $data=array(
            'user'=>$user,
            'facilities'=>$facilities,
            'icon'=>$icon,
            'id'=>$p,
            'house'=>$house,
            'lang'=>$lang,
        );
        return  view('backend.admin.hotel.form2',$data);
    }
    public function save_form(Request $r){
       
        // save
        if($r->type==1){        
            $user=new User();
            $user->name=$r->name;
            $user->email=$r->email;
            $user->position="hotel";
            $user->password=Hash::make('m123456');
            $user->status=1;
            $user->save();
            return redirect()->to('/backend/hotel_profile')->with('success','Save Data Success');
        }
        if($r->type==2){
            $user=User::where('id',$r->id)->first();
            $user->name=$r->name;
            $user->email=$r->email;
            $user->position=$r->position;
          
            if(isset($r->status)){
                $user->status=1;
            }else{
                $user->status=0;
            }
            $user->save();
            return redirect()->to('/backend/hotel_profile')->with('success','Update Data Success');
        }
    
  
          // save
          if($r->type==1){        
            $user=new User();
            $user->name=$r->name;
            $user->email=$r->email;
            $user->position="hotel";
            $user->password=Hash::make('m123456');
            $user->status=1;
            $user->save();
            return redirect()->to('/backend/hotel_profile')->with('success','Save Data Success');
        }
        if($r->type==2){
            $user=User::where('id',$r->id)->first();
            $user->name=$r->name;
            $user->email=$r->email;
            $user->position=$r->position;
          
            if(isset($r->status)){
                $user->status=1;
            }else{
                $user->status=0;
            }
            $user->save();
            return redirect()->to('/backend/hotel_profile')->with('success','Update Data Success');
        }  
 
    }

    public function reset_password(Request $r) {
        $user=User::where('id',$r->id)->first();
        $user->password=Hash::make('m123456');
        $user->save();
        return redirect()->to('/backend/hotel_profile')->with('success','Reset Password Success');
    }


    public function save_hotel(Request $r){
        // dd($r);
        // $user_id=auth::user()->id;
        if($r->lang=="en"){
        if($r->type==1){
            $poolvilla=new Poolvilla();
            $poolvilla->hotel_name=$r->hotel_name;
            $poolvilla->maps=$r->maps;
            $poolvilla->country=$r->country;
            $poolvilla->city=$r->city;
            $poolvilla->max_guest=$r->max_guest;
            $poolvilla->bedrooms=$r->bedrooms;
            $poolvilla->bathroom=$r->bathroom;
            $poolvilla->near_landmark1=$r->near_landmark1;
            $poolvilla->near_landmark2=$r->near_landmark2;
            $poolvilla->near_landmark3=$r->near_landmark3;
            $poolvilla->population_landmarks1=$r->population_landmarks1;
            $poolvilla->population_landmarks2=$r->population_landmarks2;
            $poolvilla->population_landmarks3=$r->population_landmarks3;
            $poolvilla->km1=$r->km1;
            $poolvilla->km2=$r->km2;
            $poolvilla->km3=$r->km3;
            $poolvilla->km4=$r->km4;
            $poolvilla->km5=$r->km5;
            $poolvilla->km6=$r->km6;
            $poolvilla->user_id=$r->user;
            $poolvilla->status=0;
            $poolvilla->save();
  
        foreach($r->icon as $key=>$i){ //save icon
            $poolvilla_icon=new PoolvillaIcon();
            $poolvilla_icon->icon_id=$i;
            $poolvilla_icon->poolvilla_id=$poolvilla->id;
            $poolvilla_icon->save();
            }
        }
        else if($r->type==2){
               
        $poolvilla=Poolvilla::where('id',$r->id)->first();
        $poolvilla->hotel_name=$r->hotel_name;
        $poolvilla->maps=$r->maps;
        $poolvilla->country=$r->country;
        $poolvilla->city=$r->city;
        $poolvilla->max_guest=$r->max_guest;
        $poolvilla->bedrooms=$r->bedrooms;
        $poolvilla->bathroom=$r->bathroom;
        $poolvilla->near_landmark1=$r->near_landmark1;
        $poolvilla->near_landmark2=$r->near_landmark2;
        $poolvilla->near_landmark3=$r->near_landmark3;
        $poolvilla->population_landmarks1=$r->population_landmarks1;
        $poolvilla->population_landmarks2=$r->population_landmarks2;
        $poolvilla->population_landmarks3=$r->population_landmarks3;
        $poolvilla->km1=$r->km1;
        $poolvilla->km2=$r->km2;
        $poolvilla->km3=$r->km3;
        $poolvilla->km4=$r->km4;
        $poolvilla->km5=$r->km5;
        $poolvilla->km6=$r->km6;
        if(isset($r->status)){
            $poolvilla->status=1;
            }else{
            $poolvilla->status=0;
            }
        $poolvilla->save();
        PoolvillaIcon::where('poolvilla_id',$r->id)->delete();  //icon delete
        foreach($r->icon as $key=>$i){ //save icon
        $poolvilla_icon=new PoolvillaIcon();
        $poolvilla_icon->icon_id=$i;
        $poolvilla_icon->poolvilla_id=$r->id;
        $poolvilla_icon->save();
        }
    } 
        }elseif($r->lang=='th'){
            if($r->type==1){
                $poolvilla=new PoolvillaTH();
                $poolvilla->hotel_name=$r->hotel_name;
                $poolvilla->maps=$r->maps;
                $poolvilla->country=$r->country;
                $poolvilla->city=$r->city;
                $poolvilla->max_guest=$r->max_guest;
                $poolvilla->bedrooms=$r->bedrooms;
                $poolvilla->bathroom=$r->bathroom;
                $poolvilla->near_landmark1=$r->near_landmark1;
                $poolvilla->near_landmark2=$r->near_landmark2;
                $poolvilla->near_landmark3=$r->near_landmark3;
                $poolvilla->population_landmarks1=$r->population_landmarks1;
                $poolvilla->population_landmarks2=$r->population_landmarks2;
                $poolvilla->population_landmarks3=$r->population_landmarks3;
                $poolvilla->km1=$r->km1;
                $poolvilla->km2=$r->km2;
                $poolvilla->km3=$r->km3;
                $poolvilla->km4=$r->km4;
                $poolvilla->km5=$r->km5;
                $poolvilla->km6=$r->km6;
                $poolvilla->user_id=$r->user;
                $poolvilla->status=0;
                $poolvilla->save();
      
            foreach($r->icon as $key=>$i){ //save icon
                $poolvilla_icon=new PoolvillaIcon();
                $poolvilla_icon->icon_id=$i;
                $poolvilla_icon->poolvilla_id=$poolvilla->id;
                $poolvilla_icon->save();
                }
            }
            else if($r->type==2){
                   
            $poolvilla=PoolvillaTH::where('id',$r->id)->first();
            $poolvilla->hotel_name=$r->hotel_name;
            $poolvilla->maps=$r->maps;
            $poolvilla->country=$r->country;
            $poolvilla->city=$r->city;
            $poolvilla->max_guest=$r->max_guest;
            $poolvilla->bedrooms=$r->bedrooms;
            $poolvilla->bathroom=$r->bathroom;
            $poolvilla->near_landmark1=$r->near_landmark1;
            $poolvilla->near_landmark2=$r->near_landmark2;
            $poolvilla->near_landmark3=$r->near_landmark3;
            $poolvilla->population_landmarks1=$r->population_landmarks1;
            $poolvilla->population_landmarks2=$r->population_landmarks2;
            $poolvilla->population_landmarks3=$r->population_landmarks3;
            $poolvilla->km1=$r->km1;
            $poolvilla->km2=$r->km2;
            $poolvilla->km3=$r->km3;
            $poolvilla->km4=$r->km4;
            $poolvilla->km5=$r->km5;
            $poolvilla->km6=$r->km6;
            if(isset($r->status)){
                $poolvilla->status=1;
                }else{
                $poolvilla->status=0;
                }
            $poolvilla->save();
            PoolvillaIcon::where('poolvilla_id',$r->id)->delete();  //icon delete
            foreach($r->icon as $key=>$i){ //save icon
            $poolvilla_icon=new PoolvillaIcon();
            $poolvilla_icon->icon_id=$i;
            $poolvilla_icon->poolvilla_id=$r->id;
            $poolvilla_icon->save();
            }
        }
    }
        return redirect()->to('/backend/admin/hotel/'.$poolvilla->user_id)->with('success','Save Data Success');
    }
    
   
    public function save_image_poolvilla(Request $r){
        // upload
        if($r->type==1){
        $poolvilla=Poolvilla::where('id',$r->poolvilla_id)->first();
        $name = date('YmdHis').'_image_poolvilla'.'.'.
        $r->image_poolvilla->getClientOriginalExtension();
        $image=new ImagePoolvilla();
        $image->image="frontend_assets/poolvilla/$name";
        $image->poolvilla_id=$r->poolvilla_id;
        $image->save();
        $r->image_poolvilla->move("frontend_assets/poolvilla/",$name); 
        return redirect()->to('backend/admin/manage_image_hotel/'.$r->poolvilla_id)->with('success','Upload Image Success');
        }
        //update
        else if($r->type==2){
            // dd($r);
            $name = date('YmdHis').'_image_poolvilla'.'.'.
            $r->image_poolvilla->getClientOriginalExtension();            
            $image=ImagePoolvilla::where('id',$r->id)->first();
            unlink($image->image);
            $image->image="frontend_assets/poolvilla/$name";
            $image->save();
            $r->image_poolvilla->move("frontend_assets/poolvilla/",$name); 
            return redirect()->to('backend/admin/manage_image_hotel/'.$r->poolvilla_id)->with('success','Update Image Success'); 
        }

    }
    public function delete_image_poolvilla(Request $r){
        // dd($r);
       
        $img=ImagePoolvilla::where('id',$r->id)->first();
        unlink($img->image);
        ImagePoolvilla::where('id',$r->id)->delete();
   
        return redirect()->to('backend/admin/manage_image_hotel/'.$r->poolvilla_id)->with('success','Delete Image Success');
        
    }
}
