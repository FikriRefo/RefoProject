<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerhitunganGaji extends Model
{
    protected $fillable = ['periode', 'tanggal', 'kode_nik', 'jumlah_hadir', 'gaji_pokok', 'insentif', 'pot_asuransi', 'total_gaji'];
}

