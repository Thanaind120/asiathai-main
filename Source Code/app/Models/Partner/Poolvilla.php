<?php

namespace App\Models\Partner;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Poolvilla extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'db_poolvilla';
    protected $primaryKey = 'id';
    public $incrementing = true;
}
