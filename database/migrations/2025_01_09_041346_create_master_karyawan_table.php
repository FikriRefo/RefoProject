<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('master_karyawan', function (Blueprint $table) {
            $table->string('kode_nik')->primary();
            $table->string('nama_lengkap');
            $table->string('jabatan');
            $table->decimal('gaji_pokok', 15, 2);
            $table->decimal('insentif', 15, 2);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_karyawan');
    }
};
