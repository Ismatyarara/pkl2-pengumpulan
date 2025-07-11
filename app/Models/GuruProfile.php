<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuruProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','nama', 'mapel', 'telepon', 'alamat'];
    protected $table = 'guru_profiles'; // ganti ini sesuai nama tabel di migration
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
