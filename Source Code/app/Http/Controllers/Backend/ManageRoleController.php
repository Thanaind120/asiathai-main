<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\RoleModel;
use App\Models\RolePermissionModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ManageRoleController extends Controller
{
    
    public function get_index() 
    {
        $role = RoleModel::get();
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::user()->position)->first();
        $data = array(
            'role'=>$role,
            'check'=>$check,
        );
        return  view('backend.admin.manage_role.index',$data);
    }

    public function get_form() 
    {
        return  view('backend.admin.manage_role.form');
    }

    public function get_form2($p) 
    {
        $role = RoleModel::where('id',$p)->first();
        $role_permission = RolePermissionModel::where('ref_role',$p)->first();
        $data = array(
            'role'=>$role,
            'role_permission'=>$role_permission,
        );
        return  view('backend.admin.manage_role.form',$data);
    }

    public function save_form(Request $r)
    {
        // save
        if($r->type==1){   
            $id_role = RoleModel::create([
                'id' => $r->id,
                'position_name' => $r->position_name,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $lastID = $id_role->id;
            RolePermissionModel::create([
                'ref_role' => $lastID,
                'page_create' => $r->page_create,
                'page_view' => $r->page_view,
                'page_edit' => $r->page_edit,
                'page_delete' => $r->page_delete,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to('/backend/role')->with('success','Save Data Success');
        }
        //update
        if($r->type==2){
            if(isset($r->status)){
                $status = 1;
            }else{
                $status = 0;
            }
            RoleModel::find($r->id)->update([
                'position_name' => $r->position_name,
                'status' => $status,
                'updated_at' => Carbon::now()
            ]);
            RolePermissionModel::where('ref_role',$r->id)->update([
                'page_create' => $r->page_create,
                'page_view' => $r->page_view,
                'page_edit' => $r->page_edit,
                'page_delete' => $r->page_delete,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->to('/backend/role')->with('success','Save Data Success');
        }
    }

    public function reset_password(Request $r) 
    {
        $role = RoleModel::where('id',$r->id)->first();
        $role->password=Hash::make('p123456');
        $role->save();
        return redirect()->to('/backend/role')->with('success','Reset Password Success');
    }

    public function delete_role(Request $r) 
    {
       $role = RoleModel::where('id',$r->id)->first();
       $role_permission = RolePermissionModel::where('ref_role',$r->id)->first();
       $role->status=0;
       $role_permission->page_create = NULL;
       $role_permission->page_view = NULL;
       $role_permission->page_edit = NULL;
       $role_permission->page_delete = NULL;
       $role->save();
       $role_permission->save();
        return  redirect()->to('/backend/role')->with('success','Delete Role Success');
    }

}
