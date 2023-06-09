<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Facilities;
use App\Models\Icon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FacilitiesController extends Controller
{
    
    public function get_index() {
        $facilities=Facilities::where('status',1)->orderby('id','desc')->get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::user()->position)->first();
        $data=array(
            'facilities'=>$facilities,
            'check'=>$check,
        );
        return  view('backend.facilities.index',$data);
    }
    public function get_form() {
        // $user=User::where('position','admin')->get();
        // $data=array(
        //     'user'=>$user,
        // );
        return  view('backend.facilities.form');
    }
 
    public function get_form2($p) {
        $facilities=Facilities::where('status',1)->where('id',$p)->first();
        $icon=Icon::where('facilities_id',$p)->where('status',1)->get();
        $data=array(
            'facilities'=>$facilities,
            'icon'=>$icon,
        );
        return  view('backend.facilities.form2',$data);
    }
    public function update_facilities(Request $r){
        // dd($r);
        $facilities=Facilities::where('id',$r->id)->first();
        $facilities->facilities=$r->facilities;
        $facilities->save();
        return redirect()->to('backend/admin/edit_facilities/'.$r->id)->with('success','Facilities Type Update');
    }
    public function update_icon(Request $r){      
        $icon=Icon::where('id',$r->id)->first();
        if(isset($r->icon_img)){
            $random_name=str::random(5);
            $name = date('YmdHis').'_icon'.$random_name.'.'.
            $r->icon_img->getClientOriginalExtension();
        unlink('frontend_assets/icon/'.$icon->icon_img);        
        }  

        $icon->icon_name=$r->icon_name;
        if(isset($r->icon_img)){
            $icon->icon_img=$name; 
        }
        $icon->save();
        if(isset($r->icon_img)){
            $r->icon_img->move("frontend_assets/icon/",$name); 
        }
        return redirect()->back()->with('success','Icon Update');
    }

    public function save_icon(Request $r){
         //random filename
         $random_name=str::random(5);
         //image rename
         $name = date('YmdHis').'_icon'.$random_name.'.'.
         $r->icon_img->getClientOriginalExtension();
       
             $icon=new Icon();
             $icon->icon_img=$name;
             $icon->icon_name=$r->icon_name;
             $icon->status=1;
             $icon->facilities_id=$r->facilities_id;
             $icon->save();
         // upload file
         $r->icon_img->move("frontend_assets/icon/",$name); 
         return redirect()->back()->with('success','Icon Save');
    }
    public function delete_icon(Request $r){
        $icon=Icon::where('id',$r->id)->first();
        $icon->status=0;
        $icon->save();
        return redirect()->back()->with('success','Icon Deleted');
   }
   public function delete_facilities(Request $r){
     
    $facilities=Facilities::where('id',$r->id)->first();
    $facilities->status=0;
    $facilities->save();
    return redirect()->back()->with('success','Facilities Deleted');
}
    public function save_facilities(Request $r){
        // save facilities
        $facilities=new Facilities();
        $facilities->facilities=$r->facilities;
        $facilities->status=1;
        $facilities->save();
        //save icon
        foreach($r->icon_img as $key =>$image){
      
            //random filename
            $random_name=str::random(5);
            //image rename
            $name = date('YmdHis').'_icon'.$random_name.'.'.
            $r->icon_img[$key]->getClientOriginalExtension();
          
                $icon=new Icon();
                $icon->icon_img=$name;
                $icon->icon_name=$r->icon_name[$key];
                $icon->status=1;
                $icon->facilities_id=$facilities->id;
                $icon->save();
            // upload file
            $r->icon_img[$key]->move("frontend_assets/icon/",$name); 
        }
        
            return redirect()->to('/backend/admin/facilities')->with('success','Save Data Success');
        
    }

    public function reset_password(Request $r) {
        $user=User::where('id',$r->id)->first();
        $user->password=Hash::make('m123456');
        $user->save();
        return redirect()->to('/backend/admin_profile')->with('success','Reset Password Success');
    }

}
