<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengisian extends Model
{
    use HasFactory;
    protected $table = 'pengisian';
    protected $PrimaryKey = 'kode_pengisian';
    protected $fillable = [
        'id_penilaian',
        'kode_pengisian',
        'nama_pengisian',
        'kode_subkriteria',
    ];
}
