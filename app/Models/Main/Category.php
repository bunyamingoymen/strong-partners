<?php

namespace App\Models\Main;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'code',
        'title',
        'url',
        'description',
        'can_be_deleted',
        'active',
        'delete',
        'create_user_code',
        'update_user_code'
    ];
}
