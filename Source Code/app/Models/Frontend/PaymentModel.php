<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    // use HasFactory;
    protected $table = 'db_payment';
    protected $primaryKey = 'id';
    protected $fillable = ['id','id_member','credit_number','credit_name','credit_date','credit_cvv'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
