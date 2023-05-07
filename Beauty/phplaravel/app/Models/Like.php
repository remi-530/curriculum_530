<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    const UPDATED_AT = NULL;
    const CREATED_AT = NULL;
    protected $fillable = ['user_id','cosme_id'];
}
