<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberMail;
use Carbon\Carbon;
use App\Models\Frontend\Member;
use App\Models\User;

class LoginController extends Controller
{
    // Login
    public function loging(Request $r)
    {
        // find user
        $member = Member::where('email',$r->email)->where('status',1)->first();
        if(!isset($member))
        {
            return redirect()->back()->with('warning','Email not found!');
        }
 
        if (!Hash::check($r->password, $member->password)) {
            return redirect()->back()->with('warning','Password is wrong');
        }

        Auth::guard('member')->login($member);
        if(auth::guard('member')->user()->status == 1){
            return redirect()->to('/'.Session::get('lang'))->with('success','Success!');
        }else{
            return redirect()->back()->with('warning','Permission denied'); 
        }
    }
    
    public function logout(Request $request)
    {
        Auth::guard('member')->logout();
        $request->session()->invalidate();
        return redirect("/".Session::get('lang'));
    }

    public function forgotpassword_mail(Request $request)
    {
        $member = Member::where('status', 1)->where('email', $request->email)->first();
        $data = [
            'id' => $member->id,
            'email' => $member->email,
            'email_verified_at' => $member->email_verified_at,
            'password' => $member->password,
            'remember_token' => $member->remember_token,
            'first_name' => $member->first_name,
            'last_name' => $member->last_name,
            'phone' => $member->phone,
            'status' => $member->status,
            'created_at' => $member->created_at,
            'updated_at' => $member->updated_at,
            'session_lang' => Session::get('lang'),
        ];
        Mail::send(new MemberMail($data));
        return redirect()->to(Session::get('lang').'/signin')->with('email', 'The system has successfully sent the email.');
    }

    public function forgotpassword(Request $request, $id)
    {
        $member = Member::where('id',$id)->first();
        $data = array(
            'member' => $member,
        );
        return view('frontend/forgot_password', $data);
    }

    public function forgotpassword_update(Request $request, $id)
    {
        if($request->password_1 == $request->password_2 && $request->password_1 != ""){
            $varible = Hash::make($request->password_1);
            Cookie::queue('newpassword',$request->password_1,time()+(10*365*60*60));
            Member::where('id',$id)->update([
                'password' => $varible,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to(Session::get('lang').'/signin')->with('success', 'Save Data Success');
        }else{
            return redirect()->to(Session::get('lang').'/signin')->with('success', 'Save Data Success');
        }
    }
}
