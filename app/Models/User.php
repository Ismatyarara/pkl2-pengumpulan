<?php
namespace App\Models;

use App\Models\GuruProfil;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Pastikan ini di atas

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $table    = 'users';
    public $timestamps  = true;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }
    public function guru_profiles()
    {
        return $this->hasOne(GuruProfil::class, 'user_id');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'guru_id' );
    }

}
