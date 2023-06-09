<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    // use HasFactory;
    protected $table = 'db_member';
    protected $primaryKey = 'id';
    protected $fillable = ['id','firstname','lastname','email','phone','password','status','save_date','save_time'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
