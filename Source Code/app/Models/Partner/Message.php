<?php

namespace App\Models\Partner;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Message extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'db_message';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public function partner(){
        return $this->hasOne('App\Models\Partner','id','ref_sender_id');
    }
}
