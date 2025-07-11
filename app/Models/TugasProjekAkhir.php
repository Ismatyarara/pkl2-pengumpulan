<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasProjekAkhir extends Model
{
    use HasFactory;

    protected $table = 'tugas_projek_akhirs';

    protected $fillable = [
        'judul', 'deskripsi', 'pembimbing_id', 'deadline', 'status',
    ];

    public function pembimbing()
    {
        return $this->belongsTo(User::class, 'pembimbing_id');
    }
}
