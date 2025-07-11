<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    protected $fillable = [
        'form_id',
        'guru_id',
        'judul',
        'deskripsi',
        'kelas',
        'deadline',
    ];

    // Relasi ke FormKelas
    public function form()
    {
        return $this->belongsTo(FormKelas::class, 'form_id');
    }


}
