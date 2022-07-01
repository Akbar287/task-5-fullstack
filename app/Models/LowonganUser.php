<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganUser extends Model
{
    use HasFactory;
    protected $table = "lowongan_user";
    protected $primaryKey = "lowongan_user_id";
    public $timestamps = false;
    protected $fillable = ["hasil_seleksi", "skor", "lowongan_id", "user_id"];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function lowongan_kerja() {
        return $this->hasMany(Lowongan::class, "lowongan_id", "lowongan_id");
    }
}
