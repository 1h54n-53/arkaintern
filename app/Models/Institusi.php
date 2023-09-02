<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
    use HasFactory;

    protected $primaryKey='id';
    protected $table = 'institusi';
    protected $fillable = [
        'nama_institusi',
        'alamat',
        'nama_pembimbing',
        'jenis_kelamin',
        'telepon',
    ];
}
