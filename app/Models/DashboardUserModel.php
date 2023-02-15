<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardUserModel extends Model
{
    protected $table = 'users';
    protected $fillable = ['nama', 'no_ktp', 'email', 'password', 'level', 'telepon'];
}
