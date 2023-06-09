<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoolvillaModel extends Model
{
    // use HasFactory;
    protected $table = 'db_poolvilla';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name_en','name_th','rooms','website','star_rating','address_en','address_th','ref_district_id','ref_province_id','postal','ref_country_id','ref_enjoy_id','more_about_en','more_about_th','url_maps','breakfast','parking','smoke','pet','child','party','check_in_from','check_in_unit','check_out_from','check_out_unit','credit','paypal','bank','distance','status','partner_id','p_view'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';
    public $timedtamp = false;
}
