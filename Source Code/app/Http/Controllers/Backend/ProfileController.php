<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    
  
    public function get_form() {
        $user=User::where('id',Auth::user()->id)->first();
        $data=array(
            'user'=>$user,
        );
        return  view('backend.profile.edit_profile',$data);
    }
    public function get_form2() {
        $user=User::where('id',Auth::user()->id)->first();
        $data=array(
            'user'=>$user,
        );
        return  view('backend.profile.change_password',$data);
    }
   public function update_profile(Request $r){
     
    $user=User::where('id',$r->id)->first();
    $user->email=$r->email;
    $user->name=$r->name;
    $user->save();
    return redirect()->to('backend/edit_profile')->with('success','Update Success');
   }
   public function update_password(Request $r){     
    $user=User::where('id',$r->id)->first();
   
    if(!Hash::check($r->password, $user->password)){
        return redirect()->back()->with('warning','Password is wrong!');
    }
    if($r->new_password != $r->confirm_password){
        return redirect()->back()->with('warning','New password not math!');
    }
    $user->password=Hash::make($r->new_password);
    $user->save();
    return redirect()->to('backend/change_password')->with('success','Update Success');
   }

}
