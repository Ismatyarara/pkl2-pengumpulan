<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormKelas extends Model
{
    use HasFactory;


    protected $fillable = ['guru_id','nama_form','deskripsi','kelas' ];
    protected $table = 'form_kelas';
    public $timestamps = true;

    // Relasi ke guru_profiles
    public function guru()
    {
        return $this->belongsTo(GuruProfile::class, 'guru_id');
    }
}
