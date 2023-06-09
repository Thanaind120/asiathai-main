<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountModel extends Model
{
    // use HasFactory;
    protected $table = 'db_discount';
    protected $primaryKey = 'id';
    protected $fillable = ['id','discount_day','discount_week','discount_month','start_date','end_date','room_id'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
