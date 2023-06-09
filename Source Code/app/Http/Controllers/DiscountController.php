<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Partner;
use App\Models\Partner\Poolvilla;
use App\Models\Partner\ImageRoom;
use App\Models\Partner\PartnerDetail;
use App\Models\Partner\PartnerBank;
use App\Models\Partner\Postcode;
use App\Models\Partner\District;
use App\Models\Partner\Province;
use App\Models\Partner\Bank;
use App\Models\Partner\Question;
use App\Models\Partner\Room;
use App\Models\Partner\IconRoom;
use App\Models\Partner\StaftLanguages;
use App\Models\Partner\Discount;
use App\Mail\Sendmail;
use Mail;
class DiscountController extends Controller
{
    public function index($id){
       $partner=Partner::where('id',Auth::user()->id)->first();
        $list2=Discount::where('ref_room_id',$id)->get();
        // $list2=Room::where('poolvilla_id',$id)->get();
        $room_id=$id;
  
        $data=array(
            'list2'=>$list2,
            // 'list2'=>$list2,
            'room_id'=>$room_id,
        );
        return view('Partner.Discount.index',$data);
    }
    public function form1($id){
        $partner_id=Auth::guard('partner')->user()->id;
        // $list1=Poolvilla::where('partner_id',$partner_id)->get();
        $list2=Province::get();
        $list3=Room::where('id',$id)->first();
        $data=array(
            'list3'=>$list3,
            'list2'=>$list2,
            // 'list1'=>$list1,
        );
        return view('Partner.Discount.form1',$data);
    }
    public function edit1($id){
        // dd($id);
        // $partner_id=Auth::guard('partner')->user()->id;
        $list1=Discount::where('id',$id)->first();
        $list3=Room::where('id',$list1->ref_room_id)->first();
        // $list2=Poolvilla::where('id',$list1->poolvilla_id)->first();
        // dd($list3);
        // $list2=District::get();
        $data=array(
            'list3'=>$list3,
            // 'list2'=>$list2,
            'list1'=>$list1,
        );
        return view('Partner.Discount.form1',$data);
    }
    public function save_form1(Request $request){
        // dd($request);
        if($request->type==1){
            $discount=new Discount();
            $discount->start_date=$request->start_date;
            $discount->end_date=$request->end_date;
            $discount->discount=$request->discount;
            $discount->ref_room_id=$request->room_id;
            $discount->save();
           
        }
        else if($request->type==2){
            $discount=Discount::where('id',$request->id)->first();
            $discount->start_date=$request->start_date;
            $discount->end_date=$request->end_date;
            $discount->discount=$request->discount;
            $discount->ref_room_id=$request->room_id;
            $discount->save();
        }
       
       
        return redirect()->to('Partner/Room/'.$request->room_id.'/Discount')->with('success','Data is save');
        // return redirect()->to('Partner/Poolvilla/'.$request->poolvilla_id.'/Rooms');
        // return view('Partner.Poolvilla.form2',$data);
    }
    public function form2($poolvilla_id){
        
        $partner_id=Auth::guard('partner')->user()->id;
        $list1=Poolvilla::where('id',$poolvilla_id)->first();
        $list3=Province::get();
        $list2=Question::where('poolvilla_id',$poolvilla_id)->get();
        
        $data=array(
            'poolvilla_id'=>$poolvilla_id,
            'list3'=>$list3,
            'list2'=>$list2,
            'list1'=>$list1,
        );
        return view('Partner.Poolvilla.form2',$data);
    }
    public function save_form2(Request $request){
        // dd($request);
       
            $poolvilla=Poolvilla::where('id',$request->id)->first();
            $poolvilla->more_about_en=$request->more_about_en;
            $poolvilla->more_about_th=$request->more_about_th;
            $poolvilla->breakfast=$request->breakfast;
            $poolvilla->parking=$request->parking;
            $poolvilla->save();
            Question::where('poolvilla_id',$request->id)->delete();
            foreach($request->quest_en as $key1 =>$q){
                $question=new Question();
                $question->poolvilla_id=$request->id;
                $question->question_en=$request->quest_en[$key1];
                $question->question_th=$request->quest_th[$key1];
                $question->ans_en=$request->ans_en[$key1];
                $question->ans_th=$request->ans_th[$key1];
                $question->save();
            }
            foreach($request->languages as $key2 =>$l){
                $staft_la=new StaftLanguages();
                $staft_la->poolvilla_id=$request->id;
                $staft_la->language=$l;   
                $staft_la->save();
            }
      

       
      
        return redirect()->to('Partner/Poolvilla/'.$poolvilla->id.'/Rule');
        // return view('Partner.Poolvilla.form2',$data);
    }
    public function form3($poolvilla_id){
        $partner_id=Auth::guard('partner')->user()->id;
        $list1=Poolvilla::where('id',$poolvilla_id)->first();
        $list3=Province::get();
        $list2=District::get();
        $data=array(
            'poolvilla_id'=>$poolvilla_id,
            'list3'=>$list3,
            'list2'=>$list2,
            'list1'=>$list1,
        );
        return view('Partner.Poolvilla.form3',$data);
    }

    public function save_form3(Request $request){
        // dd($request);
       
            $poolvilla=Poolvilla::where('id',$request->id)->first();
            if(isset($request->smoke)){
                $poolvilla->smoke=$request->smoke;
            }
            if(isset($request->pet)){
                $poolvilla->smoke=$request->pet;
            }
            if(isset($request->child)){
                $poolvilla->child=$request->child;
            }
            if(isset($request->credit)){
                $poolvilla->credit=$request->credit;
            }
            if(isset($request->paypal)){
                $poolvilla->paypal=$request->paypal;
            }
            if(isset($request->bank)){
                $poolvilla->bank=$request->bank;
            }
    
            $poolvilla->check_in_from=$request->check_in_from;
            $poolvilla->check_in_unit=$request->check_in_unit;
            $poolvilla->check_out_from=$request->check_out_from;
            $poolvilla->check_out_unit=$request->check_out_unit;
            $poolvilla->distance=$request->distance;
            $poolvilla->save();
            // foreach($request->quest_en as $key1 =>$q){
            //     $question=new Question();
            //     $question->poolvilla_id=$request->id;
            //     $question->question_en=$request->quest_en[$key1];
            //     $question->question_th=$request->quest_th[$key1];
            //     $question->ans_en=$request->ans_en[$key1];
            //     $question->ans_th=$request->ans_th[$key1];
            //     $question->save();
            // }
            // foreach($request->languages as $key2 =>$l){
            //     $staft_la=new StaftLanguages();
            //     $staft_la->poolvilla_id=$request->id;
            //     $staft_la->language=$l;   
            //     $staft_la->save();
            // }
      

       
      
        return redirect()->to('Partner/Poolvilla/'.$poolvilla->id.'/Images');
        // return view('Partner.Poolvilla.form2',$data);
    }

    public function index2($id){
        // $partner_id=Auth::guard('partner')->user()->id;
        // $list1=Poolvilla::where('id',$id)->first();
        $list1=Room::where('id',$id)->first();
        $list2=ImageRoom::where('room_id',$id)->orderby('updated_at','desc')->get();
        // dd($list1);
        $data=array(
            'list1'=>$list1,
            'list2'=>$list2,
        );
        return view('Partner.Room.index2',$data);
    }

    public function Update_image_room(Request $request){
    //    dd($request);
       if($request->type==1){
        $image=$request->image;
        $image_name = date('YmdHis').'_image.'.$image->getClientOriginalExtension();
        $pool_image=new ImageRoom();
        $pool_image->room_id=$request->id;
        $pool_image->image='image/room/'.$image_name;
        $pool_image->save();
        $image->move('image/room/', $image_name); 
       }
       else if($request->type==2){
           $image_pool=ImageRoom::where('id',$request->id_image)->first();
           unlink($image_pool->image);
           ImageRoom::where('id',$request->id_image)->delete();
        $image=$request->image;
        $image_name = date('YmdHis').'_image.'.$image->getClientOriginalExtension();
        $pool_image=new ImageRoom();
        $pool_image->room_id=$request->id;
        $pool_image->image='image/room/'.$image_name;
        $pool_image->save();
        $image->move('image/room/', $image_name); 
       }

        return redirect()->to('Partner/Room/'.$request->id.'/Images');
    }

    public function delete($id,$discount_id){
    
            Discount::where('id',$discount_id)->delete();
          
    
            return redirect()->to('Partner/Room/'.$id.'/Discount')->with('success','Delete Success');
        }

        public function change_status(Request $request){
            $room=Room::where('id',$request->id)->first();
   
            if($room->status==null || $room->status==0){
       
                $room->status=1;
            }else{
                $room->status=0;
            }
            $room->save();
            $data="ทำรายการสำเร็จ";
            return response($data);
    }
}
