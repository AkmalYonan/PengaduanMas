<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = [
        'nik_pengadu',
        'judulLaporan',
        'isiLaporan',
        'image',
        'alamat',
        'tgl_kejadian',
        'status',
        'tgl_pengaduan'
    ];
}
