<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoolvillaModel extends Model
{
    // use HasFactory;
    protected $table = 'db_poolvilla';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name_en','name_th','rooms','website','star_rating','address_en','address_th','country_id','city_id','postal_id','more_about_en','more_about_th','url_maps','breakfast','parking','smoke','pet','child','party','check_in_from','check_in_unit','check_out_from','check_out_unit','distance','status','partner_id'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';
    public $timedtamp = false;
}
