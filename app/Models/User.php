<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'nama',
        'username',
        'password',
        'level'
    ];

    protected $hidden = [
        'password'
    ];

    public function file() {
        return $this->hasOne(File::class, 'user_id', 'user_id');
    }

    public function penilaian() {
        return $this->hasOne(Penilaian::class, 'user_id', 'user_id');
    }

    public function lowongan () {
        return $this->hasMany(LowonganUser::class, 'user_id', 'user_id');
    }

}
