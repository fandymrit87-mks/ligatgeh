<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

class PermohonanController extends Controller
{

    public function create()
    {
        return view('permohonan.create');
    }


    public function store(Request $request)
{

    $ktp = null;

    if($request->hasFile('ktp')){

        $ktp = $request->file('ktp')
                       ->store('ktp', 'public');
    }


    $kk = null;

    if($request->hasFile('kk')){

        $kk = $request->file('kk')
                      ->store('kk', 'public');
    }


    $akte = null;

    if($request->hasFile('akte')){

        $akte = $request->file('akte')
                        ->store('akte', 'public');
    }

    $paspor_lama = null;

    if($request->hasFile('paspor_lama')){

        $paspor_lama = $request->file('paspor_lama')
                            ->store('paspor_lama',
                            'public');
    }


    $surat_sakit = null;

    if($request->hasFile('surat_sakit')){

        $surat_sakit = $request->file('surat_sakit')
                            ->store('surat_sakit',
                            'public');
    }


    $surat_dokter = null;

    if($request->hasFile('surat_dokter')){

        $surat_dokter = $request->file('surat_dokter')
                                ->store('surat_dokter',
                                'public');
    }


    $dokumen_lain = null;

    if($request->hasFile('dokumen_lain')){

        $dokumen_lain = $request->file('dokumen_lain')
                                ->store('dokumen_lain',
                                'public');
    }




    $permohonan = Permohonan::create([

        'nomor_permohonan' =>
            'LGT-' . time(),

        'jenis_permohonan' =>
            $request->jenis_permohonan,

        'jenis_paspor' =>
            $request->jenis_paspor,

        'nama_lengkap' =>
            $request->nama_lengkap,

        'alamat' =>
            $request->alamat,

        'email' =>
            $request->email,

        'nomor_hp' =>
            $request->nomor_hp,

        'jadwal_foto' =>
            $request->jadwal_foto,

        'ktp' => $ktp,

        'kk' => $kk,

        'akte' => $akte,

        'paspor_lama' => $paspor_lama,

        'surat_sakit' => $surat_sakit,

        'surat_dokter' => $surat_dokter,

        'dokumen_lain' => $dokumen_lain,

        'status' => 'Pending'

    ]);


    return back()->with([

        'success' => true,

        'nomor_permohonan' =>
            $permohonan->nomor_permohonan,

        'nama_lengkap' =>
            $permohonan->nama_lengkap,

        'jadwal_foto' =>
            $permohonan->jadwal_foto

    ]);

}


        public function dashboard(Request $request)
{

    $query = Permohonan::query();

    if($request->status){

        $query->where(
            'status',
            $request->status
        );

    }

    $permohonans = $query
        ->latest()
        ->get();

    $total = Permohonan::count();

    $pending = Permohonan::where(
        'status',
        'Pending'
    )->count();

    $approve = Permohonan::where(
        'status',
        'Approve'
    )->count();

    $selesai = Permohonan::where(
        'status',
        'Selesai'
    )->count();

    return view(
        'admin.dashboard',
        compact(
            'permohonans',
            'total',
            'pending',
            'approve',
            'selesai'
        )
    );

}

    public function show($id)
    {

        $permohonan = Permohonan::findOrFail($id);

        return view(
            'admin.detail',
            compact('permohonan')
        );
    }

    public function updateStatus(Request $request, $id)
        {

            $permohonan = Permohonan::findOrFail($id);

            $permohonan->status = $request->status;

            $permohonan->save();

            return back()->with(
                'success',
                'Status berhasil diperbarui'
            );
        }
    }

    