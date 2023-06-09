<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
// use App\PositionModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Partner\Postcode;
use App\Models\Partner\District;
use App\Models\Partner\Province;
use App\Models\Partner\PartnerDetail;
class MyProfileController extends Controller
{
    public function get_form() {
        $partner=Partner::where('id',Auth::user()->id)->first();
        $list3=Province::get();
        $list2=District::get();
        $data = array(
            'list3'=>$list3,
            'list2'=>$list2,
            'partner'=>$partner,
        );
        return  view('Partner/myprofile.edit_profile',$data);
    }
    public function get_form2() {
        $partner=Partner::where('id',Auth::user()->id)->first();
        $data=array(
            'partner'=>$partner,
        );
        return  view('Partner/myprofile.change_password',$data);
    }
   public function update_profile(Request $request){ 
    $id=Auth::user()->id;    
    $partner=Partner::where('id',$id)->first();
    $partner->firstname=$request->firstname;
    $partner->lastname=$request->lastname;
    $partner->email=$request->email;
    $partner->save();
    $detail=PartnerDetail::where('ref_partner_id',$id)->first();
    $detail->birthday=$request->date;
    $detail->phone1=$request->phone1;
    $detail->phone2=$request->phone2;
    $detail->address=$request->address;
    $detail->district_id=$request->district;
    $detail->province_id=$request->province;
    $detail->postal=$request->postal;
    $detail->save();
    return redirect()->to('Partner/EditMyProfile')->with('success','อัพเดตข้อมูลสำเร็จ');
   }
   public function update_password(Request $r){     
    $id=Auth::user()->id;    
    $user=Partner::where('id',$id)->first();
   
    if(!Hash::check($r->password, $user->password)){
        return redirect()->back()->with('warning','Password is Wrong!');
    }
    if($r->new_password != $r->confirm_password){
        return redirect()->back()->with('warning','Confirm password not match!');
    }
    $user->password=Hash::make($r->new_password);
    $user->save();
    return redirect()->to('Partner/ChagePassword')->with('success','Password is Update');
   }
 
}
