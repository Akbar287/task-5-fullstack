<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = "penilaian";
    protected $primaryKey = "penilaian_id";
    public $timestamps = false;
    protected $fillable = ["kesehatan", "pengalaman", "pendidikan", "sertifikasi"];

    public function user() {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
}
