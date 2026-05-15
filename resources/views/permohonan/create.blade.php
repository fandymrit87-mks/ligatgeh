<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>APLIKASI LIGAT GEH</title>

    <style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{
        font-family:Arial, sans-serif;
        background:#eef3fb;
        padding:30px;
    }

    .container{
        max-width:1000px;
        margin:auto;
        background:#fff;
        padding:40px;
        border-radius:20px;
        box-shadow:0 5px 20px rgba(0,0,0,0.1);
    }

    .header{
        text-align:center;
        margin-bottom:30px;
    }

    .logo-group{
        display:flex;
        justify-content:center;
        align-items:center;
        gap:20px;
        margin-bottom:15px;
    }

    .logo-group img{
        width:90px;
    }

    .title{
        font-size:42px;
        font-weight:bold;
        color:#0a2c66;
        margin-bottom:10px;
    }

    .subtitle{
        color:#555;
        font-size:14px;
    }

    .form-group{
        margin-bottom:20px;
    }

    label{
        display:block;
        margin-bottom:8px;
        font-weight:bold;
        color:#111827;
    }

    input,
    select,
    textarea{

            width:100%;
        padding:14px;
        border-radius:10px;
        border:1px solid #cbd5e1;
        font-size:16px;
        font-family:Arial, sans-serif;
        background:#f1f5f9;
        outline:none;
        transition:0.3s;

    }

    input:focus,
    select:focus,
    textarea:focus{

        border:1px solid #2563eb;
        box-shadow:0 0 0 3px rgba(37,99,235,0.2);

    }

    textarea{
        min-height:100px;
        resize:none;
    }

        input[type="file"]{
        background:white;
        padding:10px;
    }
    .row{
        display:flex;
        gap:20px;
    }

    .col{
        flex:1;
    }

    .btn-submit{
        background:#2563eb;
        color:white;
        border:none;
        padding:14px 30px;
        border-radius:8px;
        cursor:pointer;
        width:100%;
        font-weight:bold;
        margin-top:20px;
        font-size:16px;
        transition:0.3s;
    }

    .btn-submit:hover{
        background:#1d4ed8;
    }

    .popup-overlay{
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:rgba(0,0,0,0.5);
        display:flex;
        justify-content:center;
        align-items:center;
        z-index:9999;
    }

    .popup-box{
        background:white;
        width:90%;
        max-width:450px;
        padding:30px;
        border-radius:20px;
        text-align:center;
        animation:popupShow 0.3s ease;
    }

    .popup-title{
        font-size:28px;
        font-weight:bold;
        color:#2563eb;
        margin-bottom:20px;
    }

    .popup-item{
        margin-bottom:15px;
        font-size:16px;
        line-height:1.6;
    }

    .popup-btn{
        background:#2563eb;
        color:white;
        border:none;
        padding:12px 25px;
        border-radius:8px;
        cursor:pointer;
        margin-top:15px;
    }

    .popup-btn:hover{
        background:#1d4ed8;
    }

    @keyframes popupShow{

        from{
            transform:scale(0.8);
            opacity:0;
        }

        to{
            transform:scale(1);
            opacity:1;
        }
    }

        @media(max-width:768px){

        body{
            padding:10px;
        }

        .container{
            padding:20px;
        }

        .row{
            flex-direction:column;
        }

        .title{
            font-size:28px;
        }

        .logo-group{
            gap:12px;
        }

        .logo-group img{
            width:60px;
        }

    }

    .subtitle{
        font-size:12px;
        line-height:1.5;
        padding:0 10px;
    }

    input,
    select,
    textarea{
        font-size:14px;
    }

    .btn-submit{
        font-size:15px;
        padding:12px;
    }

     body{
            padding:10px;
        }

        .container{
            padding:20px;
        }

        .row{
            flex-direction:column;
        }

        .title{
            font-size:28px;
        }

    }

</style>

</head>

<body>

<div class="container">

    <div class="header">

        <div class="logo-group">

            <img src="https://www.imigrasi.go.id/upload/Logo/Kementrian%20Imigrasi%20%26%20Pemasyarakatan.png">

            <img src="https://www.imigrasi.go.id/upload/Logo/Logo%20Ditjen%20Imigrasi.png">

        </div>

        <div class="title">
            APLIKASI LIGAT GEH
        </div>

        <div class="subtitle">
            LAYANAN IMIGRASI GERAK CEPAT, GESIT, EFEKTIF, HUMANIS
        </div>

    </div>

    <form method="POST"
          action="{{ route('permohonan.store') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="form-group">

            <label>Jenis Permohonan</label>

            <select name="jenis_permohonan">

                <option>Paspor Baru</option>

                <option>Penggantian Paspor</option>

            </select>

        </div>

        <div class="form-group">

            <label>Jenis Paspor</label>

            <select name="jenis_paspor">

                <option>Paspor Elektronik 48 Halaman 5 Tahun</option>

                <option>Paspor Elektronik 48 Halaman 10 Tahun</option>

            </select>

        </div>

        <div class="form-group">

            <label>Nama Lengkap</label>

            <input type="text"
                   name="nama_lengkap"
                   required>

        </div>

        <div class="form-group">

            <label>Alamat</label>

            <textarea name="alamat"
                      required></textarea>

        </div>

        <div class="row">

            <div class="col">

                <div class="form-group">

                    <label>Email</label>

                    <input type="email"
                           name="email">

                </div>

            </div>

            <div class="col">

                <div class="form-group">

                    <label>Nomor HP</label>

                    <input type="text"
                           name="nomor_hp"
                           required>

                </div>

            </div>

        </div>

        <div class="form-group">

            <label>E-KTP</label>

            <input type="file"
                   name="ktp">

        </div>

        <div class="form-group">

            <label>Kartu Keluarga</label>

            <input type="file"
                   name="kk">

        </div>

        <div class="form-group">

            <label>Akte / Ijazah / Buku Nikah</label>

            <input type="file"
                   name="akte">

        </div>

        <div class="form-group">

            <label>Paspor Lama</label>

            <input type="file"
                   name="paspor_lama">

        </div>

        <div class="form-group">

            <label>Surat Sakit</label>

            <input type="file"
                   name="surat_sakit">

        </div>

        <div class="form-group">

            <label>Surat Rekomendasi Dokter</label>

            <input type="file"
                   name="surat_dokter">

        </div>

        <div class="form-group">

            <label>Dokumen Lain</label>

            <input type="file"
                   name="dokumen_lain">

        </div>

        <div class="form-group">

            <label>Jadwal Kunjungan Foto</label>

            <input type="date"
                   name="jadwal_foto"
                   required>

        </div>

        <button type="submit"
                class="btn-submit">

            Kirim Data

        </button>

    </form>

</div>

@if(session('success'))

<div class="popup-overlay"
     id="successPopup">

    <div class="popup-box">

        <div class="popup-title">

            Pendaftaran Berhasil

        </div>

        <div class="popup-item">

            <strong>No. Register</strong><br>

            {{ session('nomor_permohonan') }}

        </div>

        <div class="popup-item">

            <strong>Nama Pemohon</strong><br>

            {{ session('nama_lengkap') }}

        </div>

        <div class="popup-item">

            <strong>Tanggal Kunjungan Foto</strong><br>

            {{ date('d F Y', strtotime(session('jadwal_foto'))) }}

        </div>

        <button type="button"
                class="popup-btn"
                onclick="closePopup()">

            Tutup

        </button>

    </div>

</div>

@endif

        <script>

        function closePopup(){

            window.location.href = "/";

        }

        @if(session('success'))

        document.querySelector('form').reset();

        @endif

        </script>

</body>
</html>