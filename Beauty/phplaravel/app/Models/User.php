<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    const UPDATED_AT = NULL;
    const CREATED_AT = NULL;
    protected $fillable = ['name','acount','email','image','body','password','role'];
}
