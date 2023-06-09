<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvinceModel extends Model
{
    // use HasFactory;
    protected $table = 'provinces';
    protected $primaryKey = 'code';
    protected $fillable = ['code','name_th','name_th_short','name_en','city_image','p_view','geography_id'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
