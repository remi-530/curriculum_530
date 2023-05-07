<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    const UPDATED_AT = NULL;
    protected $fillable = ['user_id','cosme_id','body','created_at'];
}
