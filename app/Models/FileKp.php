<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileKp extends Model
{
    use HasFactory;
    protected $table = 'file_kp';
    protected $primaryKey = 'kode_doc';
    public $timestamps = false;
    const UPDATED_AT = null;


    public function kp()
    {
        return $this->belongsTo(Kp::class, 'kode_doc', 'kode_doc');
    }
}
