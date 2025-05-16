<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    protected $fillable = [
        'siswa_id', 'industri_id', 'guru_id', 'mulai', 'selesai'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function industri()
    {
        return $this->belongsTo(Industri::class);
    }

}
