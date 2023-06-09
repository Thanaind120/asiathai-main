<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $table = 'db_banner';
    protected $primaryKey = 'id';
    public $incrementing = true;
}
