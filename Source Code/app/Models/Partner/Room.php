<?php

namespace App\Models\Partner;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Room extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'db_room';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public function poolvilla(){
        return $this->hasOne('App\Models\Partner\Poolvilla','id','poolvilla_id');
    }
    
}
