<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasApiTokens, HasFactory;
    protected $guard = 'staff';
    // protected $primaryKey = 'staff_id';
    protected $fillable = [
        'staff_id',
        'name',
        'password',
    ];
}
