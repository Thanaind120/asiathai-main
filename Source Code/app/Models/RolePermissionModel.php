<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermissionModel extends Model
{
    // use HasFactory;
    protected $table = 'role_permission';
    protected $primaryKey = 'id_permission';
    protected $fillable = ['id_permission','ref_role','page_create','page_view','page_edit','page_delete'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timedtamp = false;
}
