<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictModel extends Model
{
    // use HasFactory;
    protected $table = 'district';
    protected $primaryKey = 'code';
    protected $fillable = ['code','province_code','zip_code','name_th','name_en','district_image','p_view'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
