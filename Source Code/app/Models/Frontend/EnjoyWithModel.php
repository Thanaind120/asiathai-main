<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnjoyWithModel extends Model
{
    // use HasFactory;
    protected $table = 'db_enjoy_with';
    protected $primaryKey = 'enjoy_id';
    protected $fillable = ['enjoy_id','enjoy_name','enjoy_image','p_view'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
