<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permohonans', function (Blueprint $table) {

            $table->id();

            $table->string('nomor_permohonan');

            $table->string('jenis_permohonan');

            $table->string('jenis_paspor');

            $table->string('nama_lengkap');

            $table->text('alamat');

            $table->string('email');

            $table->string('nomor_hp');

            $table->date('jadwal_foto');

            $table->string('ktp')->nullable();

            $table->string('kk')->nullable();

            $table->string('akte')->nullable();

            $table->string('paspor_lama')->nullable();

            $table->string('surat_sakit')->nullable();

            $table->string('surat_dokter')->nullable();

            $table->string('dokumen_lain')->nullable();

            $table->string('status')
                  ->default('Pending');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};