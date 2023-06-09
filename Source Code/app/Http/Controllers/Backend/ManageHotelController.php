<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\PartnerUsers;
use App\Models\Bank;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ManageHotelController extends Controller
{
    
    public function get_index() {
        $user=PartnerUsers::where('position','partner')->get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::user()->position)->first();
        $data=array(
            'user'=>$user,
            'check'=>$check,
        );
        return  view('backend.admin.manage_hotel.index',$data);
    }
    public function get_form() {
    
        $bank = DB::select("select * from db_bank  where status=1");
        $data=array(
            'bank'=>$bank,
        );
        return  view('backend.admin.manage_hotel.form',$data);
    }
    public function get_form2($p) {
      
        $user=PartnerUsers::where('id',$p)->first();
    
        $bank = DB::select("select * from db_bank  where status=1");
 
        $data=array(
            'user'=>$user,
            'bank'=>$bank,
      
     
        );
        return  view('backend.admin.manage_hotel.form',$data);
    }
    public function save_form(Request $r){
        // save
        if($r->type==1){        
            $user=new PartnerUsers();
            $user->firstname=$r->firstname;
            $user->lastname=$r->lastname;
            $user->address=$r->address;
            $user->phone_number=$r->phone_number;
            $user->email=$r->email;
            $user->position="partner";
            $user->bank=$r->bank;
            $user->account_number=$r->account_number;
            $user->password=Hash::make('m123456');
            $user->status=1;
            $user->save();
            return redirect()->to('/backend/hotel_profile')->with('success','Save Data Success');
        }
        //update
        if($r->type==2){
            $user=PartnerUsers::where('id',$r->id)->first();
            // $user->name=$r->name;
            $user->email=$r->email;
            // $user->position=$r->position;
            $user->firstname=$r->firstname;
            $user->lastname=$r->lastname;
            $user->address=$r->address;
            $user->phone_number=$r->phone_number;
            $user->bank=$r->bank;
            $user->account_number=$r->account_number;
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
        $user=DB::table('db_partner')->where('id',$r->id)->update(['password' => Hash::make('m123456')]);
     
        return redirect()->to('/backend/Partner')->with('success','Reset Password Success');
    }

    

}
