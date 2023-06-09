<?php

namespace App\Models\Partner;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Province extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'provinces';
    protected $primaryKey = 'id';
    public $incrementing = true;

    // public function district(){
    //     return $this->hasOne(Partner\PartnerDetail::class,'province_code','code');
    // }
}
