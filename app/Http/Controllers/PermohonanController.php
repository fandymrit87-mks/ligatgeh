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

    /*
    |--------------------------------------------------------------------------
    | UPLOAD FILE KE PUBLIC/UPLOADS
    |--------------------------------------------------------------------------
    */

    private function uploadFile($request, $field, $folder)
    {

        if($request->hasFile($field)){

            $file = $request->file($field);

            $filename =
                time() . '_' .
                $file->getClientOriginalName();

            $destination =
                public_path('uploads/' . $folder);

            if(!file_exists($destination)){

                mkdir($destination, 0777, true);
            }

            $file->move($destination, $filename);

            return 'uploads/' .
                   $folder . '/' .
                   $filename;
        }

        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN PERMOHONAN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
{

    $uploadPath = public_path('uploads');

    if(!file_exists($uploadPath)){

        mkdir($uploadPath, 0777, true);

    }

    function saveFile($request, $field, $folder)
    {

        if($request->hasFile($field)){

            $file = $request->file($field);

            $folderPath =
                public_path('uploads/' . $folder);

            if(!file_exists($folderPath)){

                mkdir($folderPath, 0777, true);

            }

            $filename =
                time() . '_' .
                rand(1000,9999) . '_' .
                $file->getClientOriginalName();

            $file->move($folderPath, $filename);

            return 'uploads/' .
                   $folder . '/' .
                   $filename;
        }

        return null;
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

        'ktp' =>
            saveFile($request, 'ktp', 'ktp'),

        'kk' =>
            saveFile($request, 'kk', 'kk'),

        'akte' =>
            saveFile($request, 'akte', 'akte'),

        'paspor_lama' =>
            saveFile(
                $request,
                'paspor_lama',
                'paspor_lama'
            ),

        'surat_sakit' =>
            saveFile(
                $request,
                'surat_sakit',
                'surat_sakit'
            ),

        'surat_dokter' =>
            saveFile(
                $request,
                'surat_dokter',
                'surat_dokter'
            ),

        'dokumen_lain' =>
            saveFile(
                $request,
                'dokumen_lain',
                'dokumen_lain'
            ),

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

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | DETAIL PERMOHONAN
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {

        $permohonan =
            Permohonan::findOrFail($id);

        return view(
            'admin.detail',
            compact('permohonan')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS
    |--------------------------------------------------------------------------
    */

    public function updateStatus(
        Request $request,
        $id
    ){

        $permohonan =
            Permohonan::findOrFail($id);

        $permohonan->status =
            $request->status;

        $permohonan->save();

        return back()->with(
            'success',
            'Status berhasil diperbarui'
        );
    }

}