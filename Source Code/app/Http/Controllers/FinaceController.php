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
class FinaceController extends Controller
{
    public function get_index(){ 
          return view('Partner.Finace.index');     
    }


   
}
