<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $primaryKey='id';
    protected $table = 'peserta';
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'telepon',
        'alamat',
        'institusi',
        'surat_pengantar',
        'cv',
        'mulai_magang',
        'selesai_magang',
        'status'
    ];
}
