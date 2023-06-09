<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Partner extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'db_partner';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    public function partnerdetail(){
        return $this->hasOne(Partner\PartnerDetail::class,'ref_partner_id','id');
    }
}
