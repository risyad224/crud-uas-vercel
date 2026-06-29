<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempatKuliner extends Model
{
    protected $fillable = [
        'gambar', 'nama_tempat', 'alamat', 'jenis_makanan', 'jam_operasional'
    ];
}
