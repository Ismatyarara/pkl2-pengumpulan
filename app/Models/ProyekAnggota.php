<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyekAnggota extends Model
{
    protected $fillable = ['proyek_id', 'murid_id', 'peran'];

    public function proyek()
    {
        return $this->belongsTo(TugasProjekAkhir::class, 'proyek_id');
    }

    public function murid()
    {
        return $this->belongsTo(User::class, 'murid_id');
    }
}

