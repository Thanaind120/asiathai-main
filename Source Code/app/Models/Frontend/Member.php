<?php

namespace App\Models\Frontend;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Authenticatable
{
  
    protected $table = 'db_member';
    protected $primaryKey = 'id';
    public $incrementing = true;
}
