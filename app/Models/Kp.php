<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kp extends Model
{
    use HasFactory;
    protected $table = 'kp';
    public $timestamps = false;
    const UPDATED_AT = null;

    public function pembimbingJurusan()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing_jurusan', 'nip');
    }

    public function pembimbingLapangan()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing_lapangan', 'nip');
    }

    public function fileKp()
    {
        return $this->hasOne(FileKp::class, 'kode_doc', 'kode_doc');
    }
}
