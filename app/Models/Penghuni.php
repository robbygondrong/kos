<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DashboardUserModel;

class Penghuni extends Model
{
    protected $table = 'penghuni';
    protected $fillable = ['user_id'];
    protected $primaryKey = 'id_penghuni';
    public function user()
    {

        return $this->belongsTo(DashboardUserModel::class, 'user_id');
    }
}
