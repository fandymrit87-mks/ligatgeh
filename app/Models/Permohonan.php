<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{

    protected $fillable = [

        'nomor_permohonan',

        'jenis_permohonan',

        'jenis_paspor',

        'nama_lengkap',

        'alamat',

        'email',

        'nomor_hp',

        'jadwal_foto',

        'ktp',

        'kk',

        'akte',

        'paspor_lama',

        'surat_sakit',

        'surat_dokter',

        'dokumen_lain',

        'status'

    ];

}