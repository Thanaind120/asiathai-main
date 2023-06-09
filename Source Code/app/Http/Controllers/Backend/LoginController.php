<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{
    
    public function loging(Request $r)    {
 
            $u=User::where('email',$r->email)->where('status',1)->first();
            if(!$u)
            {
      
                return redirect()->back()->with('warning','Email not found!');
            }
     
            if (!Hash::check($r->password, $u->password)) {
           
                return redirect()->back()->with('warning','Password is wrong');
            }

         
              Auth::guard('backend')->login($u);
            //   dd(\Auth::guard('backend')->user());
              if(Auth::guard('backend')->user()->position == 1 || auth::guard('backend')->user()->position == 2){
                // dd(\Auth::guard('backend')->user());
                return redirect()->to('/backend/index');
              }
             
              else{
           
                  return redirect()->back()->with('warning','Permission denied'); 
              }
    }

    public function logout(Request $request)
    {
        Auth::guard('backend')->logout();
        $request->session()->invalidate();
        return redirect()->to('backend/login');
    }
}
