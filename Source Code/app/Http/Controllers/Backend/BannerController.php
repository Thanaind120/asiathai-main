<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Banner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class BannerController extends Controller
{
    
    public function get_index() 
    {
        $banner=Banner::where('status',1)->get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::user()->position)->first();
        $data=array(
            'banner'=>$banner,
            'check'=>$check,
        );
        return  view('backend.banner.index',$data);
    }

    public function get_add() 
    {
        $banner=Banner::where('status',1)->get();
        $data=array(
            'banner'=>$banner,
        );
        return  view('backend.banner.form',$data);
    }

    public function get_edit($id) 
    {
        $banner=Banner::where('id',$id)->first();
        $data=array(
            'banner'=>$banner,
        );
        return  view('backend.banner.form2',$data);
    }

    public function save_banner(Request $r) 
    {
        // dd($r);
        $name = date('YmdHis').'_icon'.'.'.
        $r->banner_image->getClientOriginalExtension();
        $banner=new Banner();
        $banner->banner_image=$name;
        $banner->head_en=$r->head_en;
        $banner->head_th=$r->head_th;
        $banner->detail_en=$r->detail_en;
        $banner->detail_th=$r->detail_th;
        $banner->status=1;
        $banner->save();
        $r->banner_image->move("frontend_assets/banner/",$name); 
        return  redirect()->to('backend/admin/banner')->with('success','Upload Banner Success');
    }

    public function update_banner(Request $r) 
    {
        // dd($r);
        $banner=Banner::where('id',$r->id)->first();
        // if(isset($r->banner_image)){
        if($r->banner_image != ''){
            // $name = date('YmdHis').'_icon'.'.'.
            // $r->banner_image->getClientOriginalExtension();
            $r->banner_image->move("frontend_assets/banner/",$banner->banner_image); 
            // $banner->banner_image=$name;
        } 
        $banner->head_en=$r->head_en;
        $banner->head_th=$r->head_th;
        $banner->detail_en=$r->detail_en;
        $banner->detail_th=$r->detail_th;
        $banner->status=1;
        $banner->save();
        return  redirect()->to('backend/admin/banner')->with('success','Update Banner Success');
    }

    public function delete_banner(Request $r) 
    {
        // dd($r);
        $banner=Banner::where('id',$r->id)->first();
        $banner->status=0;
        $banner->save();
        return  redirect()->to('backend/admin/banner')->with('success','Delete Banner Success');
    }

}
