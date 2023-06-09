<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    // use HasFactory;
    protected $table = 'db_room';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name','twin_bed','full_bed','queen_bed','king_bed','bathroom','adult','kids','size','price','com','status','poolvilla_id'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
