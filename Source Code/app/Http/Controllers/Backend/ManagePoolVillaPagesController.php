<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Poolvilla;
use App\Models\House;
use App\Models\PoolvillaTH;
use App\Models\Discount;
class ManagePoolVillaPagesController extends Controller
{
    
    public function manage_page(Request $request){
        // dd($request);
        if($request->poovilla_manage_type==1){
            return redirect()->to('backend/admin/manage_image_hotel/'.$request->id);
        }
        elseif($request->poovilla_manage_type==2){
            return redirect()->to('backend/admin/manage_description_hotel/'.$request->id);
        }
        elseif($request->poovilla_manage_type==3){
            return redirect()->to('backend/admin/more_about_poolvilla/'.$request->id);
        }
        elseif($request->poovilla_manage_type==4){
            return redirect()->to('backend/admin/Q&A/'.$request->id);
        }

        elseif($request->poovilla_manage_type==5){
            return redirect()->to('backend/admin/manage_rooms/'.$request->id);
        }
        elseif($request->poovilla_manage_type==6){
            return redirect()->to('backend/admin/reserve/'.$request->id);
        }
        elseif($request->poovilla_manage_type==7){
            return redirect()->to('backend/admin/manage_description_hotel/th/'.$request->id);
        }
    }

    public function manage_rooms_page(Request $request){
        // dd($request);
        if($request->poovilla_manage_type==1){
            return redirect()->to('backend/admin/image_room/'.$request->id);
        }
        elseif($request->poovilla_manage_type==2){
            return redirect()->to('backend/admin/add_edit_room/'.$request->id);
        }
        elseif($request->poovilla_manage_type==3){
            return redirect()->to('backend/admin/discount/'.$request->id);
        }
        elseif($request->poovilla_manage_type==4){
            return redirect()->to('backend/admin/reserve_time/'.$request->id);
        }

        elseif($request->poovilla_manage_type==5){
            return redirect()->to('backend/admin/manage_rooms/'.$request->id);
        }
        elseif($request->poovilla_manage_type==6){

            return redirect()->to('backend/admin/manage_rooms/th/'.$request->id);
        }
    }

    public function get_more_about_poovilla($id){
        $hotelEN=Poolvilla::where('id',$id)->first();
        $hotelTH=PoolvillaTH::where('id',$id)->first();
        $data=array(
            'hotelEN'=>$hotelEN,
            'hotelTH'=>$hotelTH,
        );
       return view('backend.admin.more_about_poolvilla.form',$data);
    }
    public function q_and_a($id){
        return view('backend.admin.Q_and_A.index');
     }

     public function get_edit_q_and_a($id){
        return view('backend.admin.Q_and_A.form'); 
     }
     public function get_image_room($id){
        return view('backend.admin.hotel.index4'); 
     }

     //start discount function
     public function get_discount($id){
        $house=House::where('id',$id)->first();
        $dis=Discount::where('house_id',$id)->first();
        $data = array(
            'house'=>$house,
            'dis'=>$dis,
        );
        return view('backend.admin.hotel.form3',$data); 
     }
     public function save_discount(Request $r){
        $dis=Discount::where('house_id',$r->house_id)->first();
        if(isset($dis)){
            //อัพเดท
            $dis->type=$r->type;
            $dis->discount=$r->discount;
            $dis->start_date=$r->start_date;
            $dis->end_date=$r->end_date;
            $dis->house_id=$r->house_id;
            $dis->save();
            return redirect()->to('backend/admin/discount/'.$r->house_id);
        }
        else{
            // บันทึก
            $discount=new Discount();
            $discount->type=$r->type;
            $discount->discount=$r->discount;
            $discount->start_date=$r->start_date;
            $discount->end_date=$r->end_date;
            $discount->house_id=$r->house_id;
            $discount->save();
            return redirect()->to('backend/admin/discount/'.$r->house_id);
      
        }
   
     }
     //end discount function
     public function get_reserve_time($id){
        return view('backend.admin.hotel.form4'); 
     }
     public function get_reserve($id){
        return view('backend.admin.hotel.index5'); 
     }
     public function get_reserve_report($id){
        return view('backend.admin.hotel.index6'); 
     }
     public function get_edit_reserve($id){
      
        return view('backend.admin.hotel.form5'); 
     }

     
     
}
