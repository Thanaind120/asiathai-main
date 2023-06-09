<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    // use HasFactory;
    protected $table = 'db_review';
    protected $primaryKey = 'id';
    protected $fillable = ['id','ref_member_id','ref_room_id','ref_booking_id','image','rating','review','status','save_date','save_time'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
