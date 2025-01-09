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
        Schema::create('perhitungan_gaji', function (Blueprint $table) {
            $table->id();
            $table->string('periode');
            $table->date('tanggal');
            $table->string('kode_nik');
            $table->integer('jumlah_hadir');
            $table->decimal('gaji_pokok', 15, 2);
            $table->decimal('insentif', 15, 2);
            $table->decimal('pot_asuransi', 5, 2);
            $table->decimal('total_gaji', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perhitungan_gaji');
    }
};
