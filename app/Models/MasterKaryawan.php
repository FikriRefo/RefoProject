<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKaryawan extends Model
{
    protected $table = 'master_karyawan';
    protected $primaryKey = 'kode_nik';
    protected $fillable = ['kode_nik', 'nama_lengkap', 'jabatan', 'gaji_pokok', 'insentif'];
}

