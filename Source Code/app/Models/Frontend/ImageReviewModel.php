<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageReviewModel extends Model
{
    // use HasFactory;
    protected $table = 'db_image_review';
    protected $primaryKey = 'id';
    protected $fillable = ['id','ref_member_id','ref_review_id','image'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
