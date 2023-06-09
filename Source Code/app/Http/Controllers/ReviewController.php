<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Partner;
use App\Models\Member;
use App\Models\Review;
use App\Models\Partner\Poolvilla;
use App\Models\Partner\ImagePoolvilla;
use App\Models\Partner\PartnerDetail;
use App\Models\Partner\PartnerBank;
use App\Models\Partner\Postcode;
use App\Models\Partner\District;
use App\Models\Partner\Province;
use App\Models\Partner\Bank;
use App\Models\Partner\Question;
use App\Models\Partner\StaftLanguages;
use App\Models\Partner\Inbox;
use App\Models\Partner\Message;
use App\Models\Partner\ReportReview;
use App\Mail\Sendmail;
use Mail;
class ReviewController extends Controller
{
    public function index(){
        // $partner_id=Auth::guard('partner')->user()->id;
        $list1=Review::wherebetween('status',[1,4])->get();
   
        $data=array(
            'list1'=>$list1,
            // 'list3'=>$list3,
        );
        return view('Partner.Review.index',$data);
    }
    public function report(Request $request){
        // dd($request);
        $report=new ReportReview();
        $report->ref_review_id=$request->id;
        $report->report=$request->report;
        $report->comment=$request->comment;
        $report->save();

        $review=Review::where('id',$request->id)->first();
        $review->status=2;
        $review->save();
        return redirect()->to('Partner/Reviews')->with('success','ระบบได้รับการรายงานแล้ว โปรดรอทีมงานอนุมัติ');
    }
    public function form1(){
        $partner_id=Auth::guard('partner')->user()->id;
        // $list1=Poolvilla::where('partner_id',$partner_id)->get();
        $list3=Province::get();
        $list2=District::get();
        $data=array(
            'list3'=>$list3,
            'list2'=>$list2,
        );
        return view('Partner.Inbox.form1',$data);
    }
    public function edit1($id){
        // dd($id);
        // $partner_id=Auth::guard('partner')->user()->id;
        $list1=Poolvilla::where('id',$id)->first();
      
        $list3=Province::get();
        $list2=District::get();
        $data=array(
            'list3'=>$list3,
            'list2'=>$list2,
            'list1'=>$list1,
        );
        return view('Partner.Poolvilla.form1',$data);
    }
    public function save_form1(Request $request){
        // dd($request);
        $inbox= new Inbox();
        $inbox->title=$request->title;
        $inbox->detail=$request->detail;
        $inbox->ref_sender_id=Auth::user()->id;
        $inbox->save();
       
      
        return redirect()->to('Partner/Inbox')->with('success','Send message success!');
        // return view('Partner.Poolvilla.form2',$data);
    }
    public function form2($id){
        
        // $partner_id=Auth::guard('partner')->user()->id;
        $list1=Inbox::where('id',$id)->first();
   
        $list2=Message::where('ref_inbox_id',$id)->orderby('created_at','asc')->get();
        $data=array(
            'list1'=>$list1,
            'list2'=>$list2,
        );
        return view('Partner.Inbox.form2',$data);
    }
    public function save_form2(Request $request){
        // dd($request);
        $message= new Message();
        $message->ref_inbox_id=$request->ref_inbox_id;
        $message->message=$request->message;
        $message->ref_sender_id=Auth::user()->id;
        $message->save();
       
      
        return redirect()->to('Partner/Inbox/'.$request->ref_inbox_id);
  
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
        $list1=Poolvilla::where('id',$id)->first();
  
        $list2=ImagePoolvilla::where('poolvilla_id',$id)->orderby('updated_at','desc')->get();
        $data=array(
            'list1'=>$list1,
            'list2'=>$list2,
        );
        return view('Partner.Poolvilla.index2',$data);
    }

    public function Update_image_poolvilla(Request $request){
    //    dd($request);
       if($request->type==1){
        $image=$request->image;
        $image_name = date('YmdHis').'_image.'.$image->getClientOriginalExtension();
        $pool_image=new ImagePoolvilla();
        $pool_image->poolvilla_id=$request->id;
        $pool_image->image='image/poovilla/'.$image_name;
        $pool_image->save();
        $image->move('image/poovilla/', $image_name); 
       }
       else if($request->type==2){
           $image_pool=ImagePoolvilla::where('id',$request->id_image)->first();
           unlink($image_pool->image);
           ImagePoolvilla::where('id',$request->id_image)->delete();
        $image=$request->image;
        $image_name = date('YmdHis').'_image.'.$image->getClientOriginalExtension();
        $pool_image=new ImagePoolvilla();
        $pool_image->poolvilla_id=$request->id;
        $pool_image->image='image/poovilla/'.$image_name;
        $pool_image->save();
        $image->move('image/poovilla/', $image_name); 
       }

        return redirect()->to('Partner/Poolvilla/'.$request->id.'/Images');
    }

    public function delete_image_poolvilla($id,$image_id){
    
               $image_pool=ImagePoolvilla::where('id',$image_id)->first();
               unlink($image_pool->image);
               ImagePoolvilla::where('id',$image_id)->delete();
          
    
            return redirect()->to('Partner/Poolvilla/'.$id.'/Images');
        }
}
