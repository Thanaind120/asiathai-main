<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    //
    protected $table = 'db_discount';
    protected $primaryKey = 'id';
    public $incrementing = true;
}
