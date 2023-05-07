<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cosme extends Model
{
    use HasFactory;

    protected $fillable = ['new','user_id','cosme','price','category','body','images'];
}
