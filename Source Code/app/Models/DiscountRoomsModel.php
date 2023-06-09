<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountRoomsModel extends Model
{
    // use HasFactory;
    protected $table = 'db_show_roomdetails_discount';
    protected $primaryKey = 'id_roomdetails';
    protected $fillable = ['id_roomdetails','ref_banner_id','ref_poolvilla_id','ref_room_id','ref_discount_id','ref_start_date','ref_end_date','status'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
