<?php

namespace App\Imports;

use App\Models\MasterKaryawan;
use Maatwebsite\Excel\Concerns\ToModel;

class KaryawanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MasterKaryawan([
            'kode_nik' => $row['kode_nik'],
            'nama_lengkap' => $row['nama_lengkap'],
            'jabatan' => $row['jabatan'],
            'gaji_pokok' => $row['gaji_pokok'],
            'insentif' => $row['insentif'],
        ]);
    }
}
