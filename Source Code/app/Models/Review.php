<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Review extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'db_review';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    public function member1(){
        return $this->hasOne('App\Models\Member','id','ref_member_id');
    }
    public function room(){
        return $this->hasOne('App\Models\Partner\Room','id','ref_room_id');
    }
}
