<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileSkripsi extends Model
{
    use HasFactory;
    protected $table = 'file_skripsi';
    protected $primaryKey = 'kode_skripsi';
    public $timestamps = false;
    const UPDATED_AT = null;
    protected $nullable = ['ta_cover', 'ta_abstrak'];

    public function skripsi()
    {
        return $this->belongsTo(Skripsi::class, 'kode_skripsi', 'kode_skripsi');
    }

    

}
