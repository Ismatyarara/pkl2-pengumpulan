<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaProfile extends Model
{
    
    protected $fillable = ['user_id', 'nis', 'kelas', 'telepon', 'alamat'];
    protected $table = 'siswa_profiles'; 
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
