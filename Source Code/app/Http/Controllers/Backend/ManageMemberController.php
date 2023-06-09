<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ManageMemberController extends Controller
{
    
    public function get_index() 
    {
        $member = Member::get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::user()->position)->first();
        $data = array(
            'member'=>$member,
            'check'=>$check,
        );
        return  view('backend.admin.manage_member.index',$data);
    }

    public function get_form() 
    {
        return  view('backend.admin.manage_member.form');
    }

    public function get_form2($p) 
    {
        $member = Member::where('id',$p)->first();
        $data = array(
            'member'=>$member,
        );
        return  view('backend.admin.manage_member.form',$data);
    }

    public function save_form(Request $r)
    {
        // save
        if($r->type==1){   
            $date = date('Y-m-d');
            $newDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
            $time = date('H:i:s');
            $newTime = \Carbon\Carbon::createFromFormat('H:i:s', $time)->format('H:i:s');
            Member::create([
                'id' => $r->id,
                'firstname' => $r->firstname,
                'lastname' => $r->lastname,
                'email' => $r->email,
                'password' => Hash::make('p123456'),
                'status' => 1,
                'save_date' => $newDate,
                'save_time' => $newTime,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to('/backend/member_profile')->with('success','Save Data Success');
        }
        //update
        if($r->type==2){
            if(isset($r->status)){
                $status = 1;
            }else{
                $status = 0;
            }
            Member::find($r->id)->update([
                'firstname' => $r->firstname,
                'lastname' => $r->lastname,
                'email' => $r->email,
                'phone' => $r->phone,
                'status' => $status,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to('/backend/member_profile')->with('success','Save Data Success');
        }
    }

    public function reset_password(Request $r) 
    {
        $member = Member::where('id',$r->id)->first();
        $member->password=Hash::make('p123456');
        $member->save();
        return redirect()->to('/backend/member_profile')->with('success','Reset Password Success');
    }

    public function delete_member(Request $r) 
    {
       $member = Member::where('id',$r->id)->first();
       $member->status=0;
       $member->save();
        return  redirect()->to('/backend/member_profile')->with('success','Delete Banner Success');
    }

}
