<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = "file";
    protected $primaryKey = "file_id";
    public $timestamps = false;

    protected $fillable = ["surat_kesehatan", "cv", "ijazah", "ktp", "skck", "sertifikasi"];

    public function user() {
        return $this->hasOne(User::class, 'user_id', 'user_id');
    }
}
