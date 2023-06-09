<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class BankController extends Controller
{
    
   public function get_index(){
    $bank = DB::select("select * from db_bank  order by id desc");
    $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::user()->position)->first();
    $data = array(
        'bank'=>$bank,
        'check'=>$check,
    );
       return view('backend.banking.index',$data);
   }

   public function get_form(){

    return view('backend.banking.form');
    }
    public function get_form2($id){
        $bank = DB::select("select * from db_bank  where id=$id");
        // dd($bank[0]->name);
        $data = array(
            'bank'=>$bank,
        );
        return view('backend.banking.form',$data);
        }

    public function save_form(Request $r){
        if($r->type == 1){
            if(isset($r->logo)){
                $name = date('YmdHis').'_logo_bank'.'.'.$r->logo->getClientOriginalExtension();
                $r->logo->move('frontend_assets/bank/', $name);
            }
            DB::insert("insert into db_bank set name = '$r->name', logo = 'frontend_assets/bank/$name'");
            return redirect()->to('/backend/admin/banking')->with('success','Data is Save!');

        }else if($r->type==2){
            // dd($r->old_image);
            if(isset($r->logo)){
                $name_logo = 'frontend_assets/bank/'.date('YmdHis').'_country_image'.'.'.$r->logo->getClientOriginalExtension();
                $r->logo->move('frontend_assets/bank/', $name_logo);
            }else{
                $name_logo = $r->old_image;
            }
            if(isset($r->status)){
                $status=1;
                }else{
                $status=0;
                }
            DB::update("update db_bank set  name = '$r->name',logo = '$name_logo',status='$status' where id = '$r->id'");
            return redirect()->to('/backend/admin/banking')->with('success','Data is Save!');
        }
    }

    // bank system
    public function get_index_system(){
        $bank = DB::select("select * from db_bank_system  order by id desc");
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::user()->position)->first();
        $data = array(
            'bank'=>$bank,
            'check'=>$check,
        );
           return view('backend.banking_system.index',$data);
       }
    
       public function get_form_system(){
    
        return view('backend.banking_system.form');
        }
        public function get_form2_system($id){
            $bank = DB::select("select * from db_bank_system  where id=$id");
            // dd($bank[0]->name);
            $data = array(
                'bank'=>$bank,
            );
            return view('backend.banking_system.form',$data);
            }
    
        public function save_form_system(Request $r){
            if($r->type == 1){
                if(isset($r->logo)){
                    $name = date('YmdHis').'_logo_bank'.'.'.$r->logo->getClientOriginalExtension();
                    $r->logo->move('frontend_assets/bank_system/', $name);
                }
                DB::insert("insert into db_bank_system set name = '$r->name',account_name = '$r->account_name',account_number = '$r->account_number',  logo = 'frontend_assets/bank_system/$name'");
                return redirect()->to('/backend/admin/banking_system')->with('success','Data is Save!');
    
            }else if($r->type==2){
                // dd($r->old_image);
                if(isset($r->logo)){
                    $name_logo = 'frontend_assets/bank_system/'.date('YmdHis').'_country_image'.'.'.$r->logo->getClientOriginalExtension();
                    $r->logo->move('frontend_assets/bank_system/', $name_logo);
                }else{
                    $name_logo = $r->old_image;
                }
                if(isset($r->status)){
                    $status=1;
                    }else{
                    $status=0;
                    }
                DB::update("update db_bank_system set  name = '$r->name',account_name = '$r->account_name',account_number = '$r->account_number',logo = '$name_logo',status='$status' where id = '$r->id'");
                return redirect()->to('/backend/admin/banking_system')->with('success','Data is Save!');
            }
        }
     
}
