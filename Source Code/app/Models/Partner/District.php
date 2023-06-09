<?php

namespace App\Models\Partner;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class District extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'district';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public function postcode(){
        return $this->hasOne(Partner\PartnerDetail::class,'district_code','code');
    }
}
