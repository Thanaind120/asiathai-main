<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class EnjoyController extends Controller
{
    
    public function backend_enjoy_with() {
        $enjoy = DB::select("select * from db_enjoy_with order by enjoy_id desc");
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::user()->position)->first();
        return  view('backend.enjoy_with.backend_enjoy_with',compact('enjoy','check'));
    }

    public function backend_enjoy_with_add() {
        return  view('backend.enjoy_with.backend_enjoy_with_add');
    }
    public function backend_enjoy_with_edit($id){
        $enjoy=DB::table('db_enjoy_with')->where('enjoy_id',$id)->first();
        $data = array(
            'enjoy'=>$enjoy,
        );
        return  view('backend.enjoy_with.backend_enjoy_with_add',$data);
    }
    
    public function backend_enjoy_with_save(Request $request) {
        if($request->type == 1){
            if(isset($request->image)){
                $enjoy_image = date('YmdHis').'_enjoy_with_image'.'.'.$request->image->getClientOriginalExtension();
                $request->image->move('frontend_assets/enjoy_image/', $enjoy_image);
            }
            DB::insert("insert into db_enjoy_with set enjoy_image = '$enjoy_image', enjoy_name = '$request->name'");
            return redirect()->to('/backend/enjoy_with')->with('success','บันทึกข้อมูลเรียบร้อย');

        }else{
            if(isset($request->image)){
                $enjoy_image = date('YmdHis').'_enjoy_with_image'.'.'.$request->image->getClientOriginalExtension();
                $request->image->move('frontend_assets/enjoy_image/', $enjoy_image);
            }else{
                $enjoy_image = $request->old_image;
            }
            DB::update("update db_enjoy_with set enjoy_image = '$enjoy_image', enjoy_name = '$request->name' where enjoy_id = '$request->id'");
            return redirect()->to('/backend/enjoy_with')->with('success','บันทึกข้อมูลเรียบร้อย');
        }
       
    }

    public function backend_enjoy_with_delete($id){
        DB::delete("delete from db_enjoy_with where enjoy_id = '$id'");
        return back()->with('success', 'ลบข้อมูลเรียบร้อย');
    }


    
    

    

    


}
