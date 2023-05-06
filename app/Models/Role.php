<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public static $ADMIN = 1;
    public static $DOCTOR = 2;
    public static $STUDENT = 3;
}
