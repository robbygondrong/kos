<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardUserModel extends Model
{
    protected $table = 'users';
    protected $fillable = ['nama', 'no_ktp', 'email', 'password', 'telepon'];

    private static $user = [

        [
            "title" => "Users",
            "nama" => "robby",
            "ktp" => 1571020206920021,
            "email" => 'robbydwiadityanugraha@gmail.com',
            "telepon" => '085208799989'

        ],

        [
            "title" => "Users",
            "nama" => "yoyon",
            "ktp" => 1571020206920021,
            "email" => 'yooyn@gmail.com',
            "telepon" => '085208799989'

        ]
    ];

    public static function user()
    {
        return self::$user;
    }
}
