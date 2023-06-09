<?php

namespace App\Models\Partner;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Question extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'db_question';
    protected $primaryKey = 'id';
    public $incrementing = true;
    // public function postcode(){
    //     return $this->hasOne(Partner\PartnerDetail::class,'district_code','code');
    // }
}
