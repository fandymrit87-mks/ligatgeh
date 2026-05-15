<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Detail Permohonan</title>

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
            -webkit-font-smoothing:antialiased;
        }

        .container{
            max-width:1000px;
            margin:auto;
        }

        .card{
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

        h1{
            margin-bottom:25px;
            color:#0a2c66;
            text-align:center;
            font-size:32px;
        }

        .table-responsive{
            overflow-x:auto;
            width:100%;
        }

        table{
            width:100%;
            border-collapse:collapse;
            min-width:700px;
        }

        table td{
            padding:15px;
            border-bottom:1px solid #ddd;
            vertical-align:middle;
        }

        .label{
            width:250px;
            font-weight:bold;
            background:#f4f6fb;
        }

        .btn{
            display:inline-block;
            padding:10px 18px;
            border:none;
            border-radius:8px;
            text-decoration:none;
            color:white;
            cursor:pointer;
            margin-top:5px;
            margin-right:10px;
            font-size:14px;
            transition:0.3s;
        }

        .btn-back{
            background:#6b7280;
        }

        .btn-view{
            background:#2563eb;
        }

        .btn-download{
            background:#16a34a;
        }

        .btn-approve{
            background:#2563eb;
        }

        .btn-finish{
            background:#16a34a;
        }

        .btn:hover{
            opacity:0.9;
        }

        .status{
            padding:6px 14px;
            border-radius:20px;
            color:white;
            font-size:12px;
            display:inline-block;
            background:orange;
        }

        .action-area{
            margin-top:30px;
        }

        @media(max-width:768px){

            body{
                padding:10px;
            }

            .card{
                padding:20px;
            }

            h1{
                font-size:24px;
            }

            table td{
                padding:10px;
                font-size:13px;
            }

            .label{
                width:180px;
            }

            .btn{
            display:inline-block;
            width:auto;
            padding:8px 12px;
            font-size:12px;
            margin-bottom:8px;
             }

            .status{
                font-size:11px;
                padding:5px 10px;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h1>
            Detail Permohonan
        </h1>

        <div class="table-responsive">

            <table>

                <tr>
                    <td class="label">No Register</td>
                    <td>{{ $permohonan->nomor_permohonan }}</td>
                </tr>

                <tr>
                    <td class="label">Nama Lengkap</td>
                    <td>{{ $permohonan->nama_lengkap }}</td>
                </tr>

                <tr>
                    <td class="label">Jenis Permohonan</td>
                    <td>{{ $permohonan->jenis_permohonan }}</td>
                </tr>

                <tr>
                    <td class="label">Jenis Paspor</td>
                    <td>{{ $permohonan->jenis_paspor }}</td>
                </tr>

                <tr>
                    <td class="label">Alamat</td>
                    <td>{{ $permohonan->alamat }}</td>
                </tr>

                <tr>
                    <td class="label">Email</td>
                    <td>{{ $permohonan->email }}</td>
                </tr>

                <tr>
                    <td class="label">Nomor HP</td>
                    <td>{{ $permohonan->nomor_hp }}</td>
                </tr>

                <tr>
                    <td class="label">Jadwal Foto</td>
                    <td>
                        {{ date('d-m-Y',
                        strtotime($permohonan->jadwal_foto)) }}
                    </td>
                </tr>

                <tr>

                    <td class="label">
                        Status
                    </td>

                    <td>

                        <span class="status"

                        style="
                        background:
                        {{ $permohonan->status == 'Approve' ? '#2563eb' :
                           ($permohonan->status == 'Selesai' ? '#16a34a' :
                           '#f59e0b') }};
                        ">

                            {{ $permohonan->status }}

                        </span>

                    </td>

                </tr>

                <!-- FILE KTP -->

                <tr>

                    <td class="label">
                        File KTP
                    </td>

                    <td>

                        @if($permohonan->ktp)

                            <a href="{{ asset('storage/' .
                                $permohonan->ktp) }}"
                               target="_blank"
                               class="btn btn-view">

                                Lihat

                            </a>

                            <a href="{{ asset('storage/' .
                                $permohonan->ktp) }}"
                               download
                               class="btn btn-download">

                                Download

                            </a>

                        @else

                            Tidak ada file

                        @endif

                    </td>

                </tr>

                <!-- FILE KK -->

                <tr>

                    <td class="label">
                        File KK
                    </td>

                    <td>

                        @if($permohonan->kk)

                            <a href="{{ asset('storage/' .
                                $permohonan->kk) }}"
                               target="_blank"
                               class="btn btn-view">

                                Lihat

                            </a>

                            <a href="{{ asset('storage/' .
                                $permohonan->kk) }}"
                               download
                               class="btn btn-download">

                                Download

                            </a>

                        @else

                            Tidak ada file

                        @endif

                    </td>

                </tr>

            </table>

        </div>

        <div class="action-area">

            <form action="{{ route('permohonan.status',
                $permohonan->id) }}"
                  method="POST">

                @csrf

                <button type="submit"
                        name="status"
                        value="Approve"
                        class="btn btn-approve">

                    Approve

                </button>

                <button type="submit"
                        name="status"
                        value="Selesai"
                        class="btn btn-finish">

                    Selesai

                </button>

            </form>

            <a href="{{ route('dashboard') }}"
               class="btn btn-back">

                Kembali

            </a>

        </div>

    </div>

</div>

</body>
</html>