<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;
    protected $table = "lowongan";
    protected $primaryKey = "lowongan_id";
    public $timestamps = false;
    protected $fillable = ["jabatan", "detail", "jumlah_penerima", "aktif"];

    public function user() {
        return $this->hasMany(User::class, 'lowongan_user', 'user_id', 'lowongan_id');
    }

}
