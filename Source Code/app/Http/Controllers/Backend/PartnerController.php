<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Partner;
use App\Models\Partner\PartnerDetail;
use App\Models\Partner\PartnerBank;
use App\Models\Partner\Postcode;
use App\Models\Partner\District;
use App\Models\Partner\Province;
use App\Models\Partner\Bank;
use App\Mail\Sendmail;

use Mail;
class PartnerController extends Controller
{
    public function get_index(){
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::user()->position)->first();
        $partner = DB::table('db_partner')
        ->leftjoin('db_partner_detail','db_partner.id','=','db_partner_detail.ref_partner_id')
        ->wherebetween('status',[0,1])->get();
        $data=array(
            'check'=>$check,
            'partner'=>$partner,
            
           
         );
        return view('backend.Partner.index',$data);
    }
    public function get_edit($id){
        
        $check = DB::table('role_permission')->leftJoin('role', 'role_permission.ref_role', '=', 'role.id')->where('role_permission.ref_role', auth::user()->position)->first();
        $list1 = DB::table('db_partner')
        ->leftjoin('db_partner_detail','db_partner.id','=','db_partner_detail.ref_partner_id')
        ->where('db_partner.id',$id)->first();
        $partner_detail=DB::table('db_partner_detail')->where('ref_partner_id',$id)->first();
        $partner_bank=DB::table('db_partner_bank')->where('ref_partner_id',$id)->first();
        $postcode=Postcode::all();
        $list2=District::all();
        $list3=Province::all();
        $bank=Bank::where('status',1)->get();
        // dd($partner_detail);
        $data=array(
            'check'=>$check,
            'list1'=>$list1,
            'postcode'=>$postcode,
            'list2'=>$list2,
            'list3'=>$list3,
            'bank'=>$bank,
            'partner_detail'=>$partner_detail,
            'partner_bank'=>$partner_bank,
         );
        return view('backend.Partner.form1',$data);
    }
    public function update_partner(Request $request){
        // dd($request);
        DB::table('db_partner') //update partner
        ->where('id', $request->id) 
        ->limit(1)  
        ->update(array('firstname' => $request->firstname,'email' => $request->lastname,'comission' => $request->comission));

        DB::table('db_partner_detail') // update partner detail
        ->where('ref_partner_id', $request->id) 
        ->limit(1)  
        ->update(array('birthday' => $request->birthday,'phone1' => $request->phone,'phone2' => $request->phone2,'address' => $request->address,'district_id' => $request->district_id,'province_id' => $request->province_id,'postal' => $request->postal));
       
        DB::table('db_partner_bank') //update partner bank
        ->where('ref_partner_id', $request->id) 
        ->limit(1)  
        ->update(array('ref_bank_id' => $request->ref_bank_id,'branch' => $request->branch,'acct_name' => $request->acct_name,'acct_no' => $request->acct_no));

        return redirect()->to('backend/Partner')->with('success','Update partner success');
    }

    public function logout(){     
        Auth::logout();
        return redirect()->to('en/signin_hotel');
       }
    public function get_list2(){

        $partner=Partner::find(Auth::guard('partner')->user()->id);
        $postcode=Postcode::all();
        $district=District::all();
        $province=Province::all();
        $bank=Bank::where('status',1)->get();
       
        $data=array(
           'partner'=>$partner,
           'postcode'=>$postcode,
           'district'=>$district,
           'province'=>$province,
           'bank'=>$bank,
          
        );
        return view('frontend.list_property2',$data);
    }
    public function get_signin_hotel(){
        // dd(Auth::guard('partner')->user());   
        return view('frontend.signin_hotel');
    }
    public function verify_partner($code){
        // dd(Auth::guard('partner')->user());   
        $partner=Partner::where('code',$code)->first();
        if($partner == null){
            return redirect()->to('signin_hotel')->with('warning','ไม่สามารถยืนยันตัวตนได้!');
        }
        if($partner->status > 0){
            return redirect()->to('signin_hotel')->with('warning','ขออภัย ไม่สามารถดำเนินการได้ เนื่องจากบัญชีมีการยืนยันตัวตนเรียบร้อยแล้ว');
        }
      
        if($partner->status==0){
            $user = Partner::where('code',$code)->first();
            $user->status=1;
            $user->save();
            Auth::guard('partner')->login($user);       
            return redirect()->to('partner/identity_verification')->with('success','บัญชีได้รับการยืนยันอีเมลเรียบร้อยแล้ว');
        }
    }
    public function get_identity_verification(){
        $partner=Partner::find(Auth::guard('partner')->user()->id);
        $postcode=Postcode::all();
        $list2=District::all();
        $list3=Province::all();
        $bank=Bank::where('status',1)->get();
        $data=array(
           'partner'=>$partner,
           'postcode'=>$postcode,
           'list2'=>$list2,
           'list3'=>$list3,
           'bank'=>$bank,
        );
        return view('frontend.identity_verification',$data);
    }

    public function save_verification(Request $request){
        
        $partnerdetail=PartnerDetail::where('ref_partner_id',Auth::guard('partner')->user()->id)->first();
    // dd($request);
         $partnerdetail->birthday=$request->date;
        $partnerdetail->phone2=$request->phone2;
        $partnerdetail->address=$request->address;
        $partnerdetail->province_id=$request->province_id;
        $partnerdetail->postal=$request->postal;
        $district = DB::select("select * from district where name_th='$request->district'");
        $partnerdetail->district_id=$request->district_id;
      

        $bank=new PartnerBank();
        $bank->ref_bank_id=$request->ref_bank_id;
        $bank->acct_name=$request->acct_name;
        $bank->acct_no=$request->acct_no;
        $bank->branch=$request->branch;
        $bank->save();
        if(isset($request->idcard)){
            $image1 = date('YmdHis').'_image'.'.'.$request->idcard->getClientOriginalExtension();
            $request->idcard->move('image/idcoard/', $image1);            
        }
        $partnerdetail->id_card=$request->image1;
        if(isset($request->accommodation_permit)){
            $image2 = date('YmdHis').'_image'.'.'.$request->accommodation_permit->getClientOriginalExtension();
            $request->accommodation_permit->move('image/idcoard/', $image2);            
        }
        $partnerdetail->accommodation_permit=$request->image2;
        $partnerdetail->save();

        return redirect()->to('signin_hotel')->with('success','ระบบได้รับข้อมูลของคุณเรียบร้อยแล้ว');
    }

    public function partner_loging(Request $request){  
     $partner=Partner::where('email',$request->email)->first();
    
        if(!$partner)
        {
            return redirect()->back()->with('warning','ไม่พบชื่อผู้ใช้งานในฐานข้อมูล');
        }
  
        if (!Hash::check($request->password, $partner->password)) {
            return redirect()->back()->with('warning','รหัสผ่านไม่ถูกต้อง');
        }
        if($partner->status==0){
            return redirect()->back()->with('warning','กรุณายืนยันอีเมลให้เรียบร้อย ก่อนทำการล็อกอิน');
        }
     
        Auth::guard('partner')->login($partner);   
            return redirect()->to('/Partner/Dashboard'); 
    }

    public function partner_editing_profile(Request $request){
        session_start();
        $user_id=$_SESSION["partner_login"];
        // $partner=DB::select("select * from db_partner where id='$user_id' ");
        DB::update("update db_partner set 
        firstname = '$request->firstname',
        lastname = '$request->lastname',
        email = '$request->email',
        phone = '$request->phone',
        address = '$request->address'
         where id = '$user_id'
        
        ");
        return redirect()->to('/hotel_account_manage'); 
    }
    public function  partner_edit_contact(Request $request){
        session_start();
        $user_id=$_SESSION["partner_login"];
        DB::update("update db_partner set 
        contact = '$request->contact',
        contact_email = '$request->contact_email',
        contact_phone = '$request->contact_phone'
    
        
        ");
        return redirect()->to('/hotel_account_manage'); 
    }

    public function  partner_change_password(Request $request){
        session_start();
        $user_id=$_SESSION["partner_login"];
         $partner=DB::select("select * from db_partner where id='$user_id' ");
        if (!Hash::check($request->old_password, $partner[0]->password)) {
            return redirect()->back()->with('warning','Old password was invalid.');
        }
        if ($request->new_password != $request->confirm_password) {
            return redirect()->back()->with('warning','New password not math!');
        }
        $hash_password=Hash::make($request->new_password);
        DB::update("update db_partner set 
        password = '$hash_password'");
        return redirect()->to('/hotel')->with('success','Password changed successfully.'); 
    }

    public function partner_register(Request $request){
        if ($request->password != $request->confirm_password) {
            return redirect()->back()->with('warning','Password not math!');
        }
        $check_email=Partner::where('email',$request->email)->first();
        if(isset($check_email)){
            return redirect()->back()->with('warning','email is already exists!');
        }
        $hash_password=Hash::make($request->password);
        $partner=new Partner();
        $partner->firstname=$request->firstname;
        $partner->lastname=$request->lastname;
        $partner->email= $request->email;
        $partner->password=$hash_password;
        $partner->status=0; 
        $partner->email= $request->email;

        $check=0;
 
        while($check==0){
            $n = 10;
            $result = bin2hex(random_bytes($n));
            $last_result=substr($result,0,10);
            $check_code=Partner::where('code',$last_result)->first();
            if($check_code==null){
                $check=1;
            }
        }
        $partner->code= $last_result;       
        $partner->save();
        $partner_detail=new PartnerDetail();
        $partner_detail->phone1=$request->phone1;
        $partner_detail->ref_partner_id=$partner->id;
        $partner_detail->save();
    $data_insert = [
        'email' => $partner->email,
        'code' => $partner->code,
    ];
    Mail::send(new Sendmail($data_insert));
    $data = array(
        'email'=>$partner->email,
    );
        return view('frontend/register_hotel_2',$data)->with('success','Register Success!');
    }

    public function set_city(request $request){
      
        $district = DB::select("select * from district where name_th='$request->id'");
        // dd($district[0]->province_code);
        $province_code=$district[0]->province_code;
        $province = DB::select("select * from provinces where code ='$province_code' ");
 
        // $postcode=Postcode::where();
        // $district=District::all();
        // $province=Province::all();
        $data=array(
            // 'city'=>$city,
            'province'=>$province[0]->name_th,
            'postcode'=>$district[0]->zip_code,
        );
        return response()->json(['data'=>$data]); 
      
       }
       public function create_poolvilla(Request $request){
    //    dd($request);
       $city=District::where('name_th',$request->district)->first();
        $id=DB::insert("insert into  db_poolvilla set 
        name_en = '$request->name_en',
        name_th = '$request->name_th',
        rooms = '$request->rooms',
        website = '$request->website',
        star_rating = '$request->star_rating',
        address_en = '$request->address_en',
        address_th = '$request->address_th',
        url_maps = '$request->url_maps',
    
        city_id = '$city->code',
      
        partner_id ='$request->partner_id'
        
        ");
        // country_id = '$request->country_id',
        // postal_id = '$request->postal_id',
        $id = DB::select("select id FROM db_poolvilla ORDER BY id DESC LIMIT 1");
        $poolvilla_id=$id[0]->id;
        return redirect()->to('partner/add_bedroom/'.$poolvilla_id);
        // return redirect()->to('partner/draft/'.$id[0]->id);
       }
       public function get_bedroom($id){
       
        $data = array(
            'poolvilla_id'=>$id
        );
        return view('frontend.add_bedroom',$data);
       }

       public function save_draft(Request $request){
        // dd($request);
        $id=DB::insert("insert into db_poolvilla set 
        name = '$request->name',
        room = '$request->room',
        web = '$request->web',
        star_rate = '$request->star_rate',
        address = '$request->address',
      
        city = '$request->city',
  
        twin_bed = '$request->twin_bed',
        full_bed = '$request->full_bed',
        queen_bed = '$request->queen_bed',
        king_bed = '$request->king_bed',
        bathroom = '$request->bathroom',
        adult = '$request->adult',
        kids = '$request->kids',
        villa_size = '$request->villa_size',
        more_about = '$request->more_about'
        ");
          // country = '$request->country',
        // postal = '$request->postal',
        $id = DB::select("select id FROM db_poolvilla ORDER BY id DESC LIMIT 1");
     
     
        return redirect()->to('partner/draft/'.$id[0]->id)->with('success','Register Success!');
       }
       public function save_bedroom(Request $request){
            // dd($request);
             $size=$request->size;
            $twin_bed=$request->twin;
            $full_bed=$request->full;
            $queen_bed=$request->queen;
            $king_bed=$request->king;
            $bathroom=$request->bath;
            $adult=$request->adult;
            $kids=$request->kids;
            $name=$request->name;
            $poolvilla_id=$request->poolvilla_id;

     $id=DB::insert("insert into  db_room set 
     
     size = '$size',
     twin_bed = '$twin_bed',
     full_bed = '$full_bed',
     queen_bed = '$queen_bed',
     king_bed = '$king_bed',
     bathroom = '$bathroom',
     adult = '$adult',
     kids = '$kids',
     name='$name',
     poolvilla_id='$poolvilla_id'
      
   ");
   $id = DB::select("select id FROM db_room ORDER BY id DESC LIMIT 1");
   $room_id=$id[0]->id;
   
   foreach($request->icon as $key=>$i){
    $icon_id=$i;
    DB::insert("insert into  db_icon_room set 
    room_id = '$room_id',
    icon_id='$icon_id'
    ");
   }
// dd($request->image_room);
   foreach($request->image_room as $key=>$im){

    $image = date('YmdHis').'_image'.$key.'.'.$im->getClientOriginalExtension();

    $im->move('image/room/', $image);
    DB::insert("insert into  db_image_room set 
    room_id = '$room_id',
    image='image/room/$image'
    ");
   }
        return redirect()->to('partner/draft/list_property3/'.$request->poolvilla_id.'/'.$room_id);
       }

       public function update_bedroom(Request $request){
 
         $size=$request->size;
        $twin_bed=$request->twin;
        $full_bed=$request->full;
        $queen_bed=$request->queen;
        $king_bed=$request->king;
        $bathroom=$request->bath;
        $adult=$request->adult;
        $kids=$request->kids;
        $name=$request->name;
        $poolvilla_id=$request->poolvilla_id;

 $id=DB::insert("update  db_room set  
 
 size = '$size',
 twin_bed = '$twin_bed',
 full_bed = '$full_bed',
 queen_bed = '$queen_bed',
 king_bed = '$king_bed',
 bathroom = '$bathroom',
 adult = '$adult',
 kids = '$kids',
 name='$name',
 poolvilla_id='$poolvilla_id' where id='$request->room_id'
  
");
$id = DB::select("select id FROM db_room ORDER BY id DESC LIMIT 1");
$room_id=$id[0]->id;
DB::delete("delete from db_icon_room where room_id = '$request->room_id'");
foreach($request->icon as $key=>$i){
$icon_id=$i;
DB::insert("insert into  db_icon_room set 
room_id = '$request->room_id',
icon_id='$icon_id'
");
}
if(isset($request->image_room )){
DB::delete("delete from db_image_room where room_id = '$request->room_id'");
foreach($request->image_room as $key=>$im){

$image= date('YmdHis').'_image'.$key.'.'.$im->getClientOriginalExtension();
$im->move('image/room/', $image);
DB::insert("insert into  db_image_room set 
room_id = '$request->room_id',
image='$image'
");
}
}
    return redirect()->to('partner/draft/list_property3/'.$request->poolvilla_id.'/'.$request->room_id);
   }

   public function save_image_poolvilla(Request $request){
       $poolvilla_id=$request->poolvilla_id;
    //    dd($poolvilla_id);
    if(isset($request->image )){
        DB::delete("delete from db_image_poolvilla where poolvilla_id = '$request->poolvilla_id'");
        foreach($request->image as $key=>$im){
        
        $image_name = date('YmdHis').'_image'.$key.'.'.$im->getClientOriginalExtension();
        $im->move('image/poovilla/', $image_name);
        DB::insert("insert into  db_image_poolvilla set 
        poolvilla_id = '$request->poolvilla_id',
        image='image/poovilla/$image_name'
        ");
   }
    }
    return redirect()->to('partner/list_property10/'.$poolvilla_id);
}
       public function get_hotel_property(){
        $poolvilla = DB::select("select * FROM db_poolvilla where partner_id='1'");
           $data=array(
           'poolvilla'=> $poolvilla
           );
        return view('frontend/hotel_property',$data);
       }
       public function get_draft($id1,$id2){
        // dd('welcome to get draft');
        $poolvilla = DB::select("select * FROM db_poolvilla where id='$id1' LIMIT 1");
        $room = DB::select("select * FROM db_room where poolvilla_id='$id1'");
        $select_room = DB::select("select * FROM db_room where poolvilla_id='$id1' and id='$id2' LIMIT 1");

        $data=array(
            'poolvilla'=>$poolvilla,
            'poolvilla_id'=>$id1,
            'room'=>$room,
            'select_room'=>$select_room
         
        );
     
        return view('frontend.show_list_property3',$data);
       }
       public function get_edit_draft($id1,$id2){
        // dd('welcome to get draft');
        $poolvilla = DB::select("select * FROM db_poolvilla where id='$id1' LIMIT 1");
        $room = DB::select("select * FROM db_room where poolvilla_id='$id1'");
        $select_room = DB::select("select * FROM db_room where poolvilla_id='$id1' and id='$id2' LIMIT 1");
  
        $data=array(
            'poolvilla'=>$poolvilla,
            'poolvilla_id'=>$id1,
            'room'=>$room,
            'select_room'=>$select_room,
   
         
        );
     
        return view('frontend.list_property3',$data);
       }
       public function get_list4($id){
        // dd('welcome to get draft');
        $poolvilla = DB::select("select * FROM db_poolvilla where id='$id' LIMIT 1");
        $data=array(
            'poolvilla'=>$poolvilla,
            'poolvilla_id'=>$id
         
        );
     
        return view('frontend.list_property4',$data);
       }


       public function update_draft(Request $request){
       
       DB::update("update  db_poolvilla set 
        name = '$request->name',
        room = '$request->room',
        web = '$request->web',
        star_rate = '$request->star_rate',
        address = '$request->address',
        country = '$request->country',
        city = '$request->city',
        postal = '$request->postal',
        twin_bed = '$request->twin_bed',
        full_bed = '$request->full_bed',
        queen_bed = '$request->queen_bed',
        king_bed = '$request->king_bed',
        bathroom = '$request->bathroom',
        adult = '$request->adult',
        kids = '$request->kids',
        villa_size = '$request->villa_size',
        more_about = '$request->more_about'
        where id='$request->id'");
       
     
     
        return redirect()->to('partner/draft/'.$request->id)->with('success','Register Success!');
       }

public function delete_room(Request $request){
    //    dd($request);

DB::delete("delete from db_icon_room where room_id = '$request->room_id'");
DB::delete("delete from db_image_room where room_id = '$request->room_id'");
DB::delete("delete from db_room where id = '$request->room_id'");

$room_select = DB::select("select * FROM db_room where poolvilla_id='$request->poolvilla_id' LIMIT 1");
    if($room_select[0]->id!=null){
        $room_id=$room_select[0]->id;
        return redirect()->to('partner/draft/list_property3/'.$request->poolvilla_id.'/'.$room_id);
    }
    else{
        return redirect()->to('partner/add_bedroom/'.$request->poolvilla_id);
    }
       }


       public function get_list_property4($id){
        // dd('welcome to get draft');
        $poolvilla = DB::select("select * FROM db_poolvilla where id='$id' LIMIT 1");
        // $room = DB::select("select * FROM db_room where poolvilla_id='$id1'");
        // $select_room = DB::select("select * FROM db_room where poolvilla_id='$id1' and id='$id2' LIMIT 1");

        $data=array(
            'poolvilla'=>$poolvilla,
            'poolvilla_id'=>$id,

         
        );
     
        return view('frontend.list_property4',$data);
       }

       public function save_list4(Request $request){
        // dd($request);
        DB::update("update  db_poolvilla set 
        more_about_en = '$request->more_about_en',
        more_about_th = '$request->more_about_th'
        where id='$request->poolvilla_id'");
      
        foreach($request->quest_en as $key=>$q){
            $quest_en=$request->quest_en[$key];
            $quest_th=$request->quest_th[$key];
            $ans_en=$request->ans_en[$key];
            $ans_th=$request->ans_th[$key];
        DB::insert("insert into  db_question set 
        poolvilla_id = '$request->poolvilla_id',
        question_en = '$quest_en',
        question_th = '$quest_th',
        ans_en='$ans_en',
        ans_th='$ans_th'
        ");
       }
     
        return redirect()->to('partner/list_property5/'.$request->poolvilla_id);
       }
       public function get_list_property5($id){
        // dd('welcome to get draft');
        $poolvilla = DB::select("select * FROM db_poolvilla where id='$id' LIMIT 1");
        // $room = DB::select("select * FROM db_room where poolvilla_id='$id1'");
        // $select_room = DB::select("select * FROM db_room where poolvilla_id='$id1' and id='$id2' LIMIT 1");

        $data=array(
            'poolvilla'=>$poolvilla,
            'poolvilla_id'=>$id,

         
        );
     
        return view('frontend.list_property5',$data);
       }

       public function save_breakfast(Request $request){
        // dd($request);
        DB::update("update  db_poolvilla set 
        breakfast = '$request->breakfast'
       
        where id='$request->poolvilla_id'");
      
       
       
     
        return redirect()->to('partner/list_property5-2/'.$request->poolvilla_id);
       }

       public function get_list_property52($id){
        // dd('welcome to get draft');
        $poolvilla = DB::select("select * FROM db_poolvilla where id='$id' LIMIT 1");
        // $room = DB::select("select * FROM db_room where poolvilla_id='$id1'");
        // $select_room = DB::select("select * FROM db_room where poolvilla_id='$id1' and id='$id2' LIMIT 1");

        $data=array(
            'poolvilla'=>$poolvilla,
            'poolvilla_id'=>$id,

         
        );
     
        return view('frontend.list_property5-2',$data);
       }

       public function save_parking(Request $request){
        // dd($request);
        DB::update("update  db_poolvilla set 
        parking = '$request->parking'
       
        where id='$request->poolvilla_id'");
      
       
       
     
        return redirect()->to('partner/list_property6/'.$request->poolvilla_id);
       }

       public function get_list_property6($id){
        // dd('welcome to get draft');
        $poolvilla = DB::select("select * FROM db_poolvilla where id='$id' LIMIT 1");
        $lang = DB::select("select * FROM db_staff_languages where poolvilla_id='$id' ");
        // $room = DB::select("select * FROM db_room where poolvilla_id='$id1'");
        // $select_room = DB::select("select * FROM db_room where poolvilla_id='$id1' and id='$id2' LIMIT 1");

        $data=array(
            'poolvilla'=>$poolvilla,
            'poolvilla_id'=>$id,
            'lang'=>$lang,

         
        );
     
        return view('frontend.list_property6',$data);
       }

       public function save_languages(Request $request){
        DB::delete("delete from db_staff_languages where poolvilla_id = '$request->poolvilla_id'");
        foreach($request->languages as $key=>$l){
    
        DB::insert("insert into  db_staff_languages set 
        poolvilla_id = '$request->poolvilla_id',
        language = '$l'
        ");
       }
        
      
       
       
     
        return redirect()->to('partner/list_property7/'.$request->poolvilla_id);
       }

       public function get_list_property7($id){
        // dd('welcome to get draft');
        $poolvilla = DB::select("select * FROM db_poolvilla where id='$id' LIMIT 1");
        // $room = DB::select("select * FROM db_room where poolvilla_id='$id1'");
        // $select_room = DB::select("select * FROM db_room where poolvilla_id='$id1' and id='$id2' LIMIT 1");

        $data=array(
            'poolvilla'=>$poolvilla,
            'poolvilla_id'=>$id,

         
        );
     
        return view('frontend.list_property7',$data);
       }
       public function save_allow(Request $request){
        //    dd($request);
        if(isset($request->smoke)){
        DB::update("update  db_poolvilla set 
        smoke = '$request->smoke'
        where id='$request->poolvilla_id'");
        }
        else{
            DB::update("update  db_poolvilla set 
            smoke = '0'
            where id='$request->poolvilla_id'");
            }   
        
        if(isset($request->pet)){
            DB::update("update  db_poolvilla set 
            pet = '$request->pet'
            where id='$request->poolvilla_id'");
            }
            else{
                DB::update("update  db_poolvilla set 
                pet = '0'
                where id='$request->poolvilla_id'");
                  
            }
        if(isset($request->child)){
                DB::update("update  db_poolvilla set 
                child = '$request->child'
                where id='$request->poolvilla_id'");
        }else{
            DB::update("update  db_poolvilla set 
            child = '0'
            where id='$request->poolvilla_id'"); 
        }
        if(isset($request->party)){
            DB::update("update  db_poolvilla set 
            party = '$request->party'
            where id='$request->poolvilla_id'");
    }else{
        DB::update("update  db_poolvilla set 
            party = '0'
            where id='$request->poolvilla_id'");
    }
  
        DB::update("update  db_poolvilla set 
        check_in_from = '$request->check_in_from',
        check_in_unit = '$request->check_in_unit',
        check_out_from	 = '$request->check_out_from',
        check_out_unit	 = '$request->check_out_unit'
        where id='$request->poolvilla_id'");

        
      
       
       
     
        return redirect()->to('partner/list_property8/'.$request->poolvilla_id);
       }

       public function get_list_property8($id){
        // dd('welcome to get draft');
        $poolvilla = DB::select("select * FROM db_poolvilla where id='$id' LIMIT 1");
        // $room = DB::select("select * FROM db_room where poolvilla_id='$id1'");
        // $select_room = DB::select("select * FROM db_room where poolvilla_id='$id1' and id='$id2' LIMIT 1");

        $data=array(
            'poolvilla'=>$poolvilla,
            'poolvilla_id'=>$id,

         
        );
     
        return view('frontend.list_property8',$data);
       }
       public function get_list_property10($id){
        // dd('welcome to get draft');
        $poolvilla = DB::select("select * FROM db_poolvilla where id='$id' LIMIT 1");
        $room = DB::select("select * FROM db_room where poolvilla_id='$id'");
        // $select_room = DB::select("select * FROM db_room where poolvilla_id='$id1' and id='$id2' LIMIT 1");

        $data=array(
            'poolvilla'=>$poolvilla,
            'room'=>$room,
            'poolvilla_id'=>$id,

         
        );
     
        return view('frontend.list_property10',$data);
       }
       public function save_price(Request $request){
        DB::update("update  db_room set 
        price = '$request->price'
        where id='$request->room_id'");
        DB::insert("insert into  db_discount set 
        discount_day = '$request->oneday',
        discount_week = '$request->week',
        discount_month = '$request->month',
        start_date = '$request->start_date',
        end_date = '$request->end_date',
        room_id = '$request->room_id'
        ");
        // $select_room = DB::select("select * FROM db_room where poolvilla_id='$id1' and id='$id2' LIMIT 1");

        $data=array(
            // 'poolvilla'=>$poolvilla,
            // 'room'=>$room,
            'poolvilla_id'=>$request->poolvilla_id,

         
        );
     
       return redirect()->to('/hotel_property');
       }

       public function get_termspartner(){
           return view('frontend.Terms_parther');
       }
}
