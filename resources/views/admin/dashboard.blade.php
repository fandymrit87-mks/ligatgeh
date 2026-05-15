<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial, sans-serif;
            background:#eef3fb;
            -webkit-font-smoothing:antialiased;
        }

        .sidebar{
            width:250px;
            height:100vh;
            background:#0a2c66;
            position:fixed;
            left:0;
            top:0;
            color:white;
            padding:30px 20px;
        }

        .sidebar h2{
            margin-bottom:40px;
            text-align:center;
            font-size:28px;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:12px;
            border-radius:8px;
            margin-bottom:10px;
            transition:0.3s;
        }

        .sidebar a:hover{
            background:#2563eb;
        }

        .main{
            margin-left:250px;
            padding:30px;
        }

        .topbar{
            margin-bottom:20px;
        }

        .topbar h1{
            font-size:32px;
            color:#111827;
        }

        .stats-container{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:20px;
            margin-bottom:30px;
        }

        .stats-card{
            padding:20px;
            border-radius:20px;
            color:white;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

        .stats-card h2{
            font-size:28px;
            margin-bottom:8px;
        }

        .stats-card p{
            font-size:14px;
        }

        .blue{
            background:#2563eb;
        }

        .orange{
            background:#f59e0b;
        }

        .lightblue{
            background:#38bdf8;
        }

        .green{
            background:#16a34a;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:20px;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

        .card h3{
            margin-bottom:20px;
            color:#111827;
        }

        #searchInput{
            width:100%;
            padding:12px;
            margin-bottom:20px;
            border:1px solid #ddd;
            border-radius:10px;
            font-size:14px;
            outline:none;
            transition:0.3s;
        }

        #searchInput:focus{
            border:1px solid #2563eb;
            box-shadow:0 0 5px rgba(37,99,235,0.3);
        }

                    .filter-status{

            padding:12px;
            border-radius:10px;
            border:1px solid #ddd;
            width:220px;

            font-size:14px;

            outline:none;

            transition:0.3s;

            background:white;

        }

        .filter-status:focus{

            border:1px solid #2563eb;

            box-shadow:0 0 5px rgba(37,99,235,0.3);

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

        table th,
        table td{
            padding:15px;
            border-bottom:1px solid #ddd;
            text-align:left;
        }

        table th{
            background:#2563eb;
            color:white;
        }

        .status{
            padding:6px 12px;
            border-radius:20px;
            color:white;
            font-size:12px;
            display:inline-block;
        }

        .btn{
            padding:8px 14px;
            border:none;
            border-radius:8px;
            cursor:pointer;
            color:white;
            text-decoration:none;
            font-size:12px;
        }

        .btn-detail{
            background:#2563eb;
        }

        @media(max-width:768px){

            body{
                overflow-x:hidden;
            }

            .sidebar{
                width:100%;
                height:auto;
                position:relative;
                padding:20px;
            }

            .sidebar h2{
                margin-bottom:20px;
                font-size:24px;
            }

            .sidebar a{
                font-size:14px;
                padding:10px;
            }

            .main{
                margin-left:0;
                padding:15px;
            }

            .topbar h1{
                font-size:24px;
            }

            .stats-container{
                grid-template-columns:1fr;
                gap:15px;
            }

            .stats-card{
                padding:15px;
            }

            .stats-card h2{
                font-size:22px;
            }

            .stats-card p{
                font-size:12px;
            }

            .card{
                padding:15px;
            }

            table th,
            table td{
                padding:10px;
                font-size:13px;
            }

            .btn{
                padding:6px 10px;
                font-size:11px;
            }

            .status{
                font-size:11px;
                padding:5px 10px;
            }

        }

    </style>

</head>

<body>

<div class="sidebar">

    <h2>LIGAT GEH</h2>

    <a href="{{ route('dashboard') }}">
        Dashboard
    </a>

    <a href="#">
        Data Permohonan
    </a>

    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">

        Logout

    </a>

    <form id="logout-form"
          action="{{ route('logout') }}"
          method="POST"
          style="display:none;">

        @csrf

    </form>

</div>

<div class="main">

    <div class="topbar">

        <h1>
            DASHBOAR ADMIN
        </h1>

    </div>

    <div class="stats-container">

        <div class="stats-card blue">

            <h2>{{ $total }}</h2>

            <p>Total Permohonan</p>

        </div>

        <div class="stats-card orange">

            <h2>{{ $pending }}</h2>

            <p>Pending</p>

        </div>

        <div class="stats-card lightblue">

            <h2>{{ $approve }}</h2>

            <p>Approve</p>

        </div>

        <div class="stats-card green">

            <h2>{{ $selesai }}</h2>

            <p>Selesai</p>

        </div>

    </div>

    <div class="card">

        <h3>
            Data Permohonan
        </h3>

    <form method="GET"
      style="margin-bottom:20px;">

    <select name="status"
        class="filter-status"
        onchange="this.form.submit()">

        <option value="">
            Semua Status
        </option>

        <option value="Pending"
        {{ request('status') == 'Pending'
        ? 'selected' : '' }}>

            Pending

        </option>

        <option value="Approve"
        {{ request('status') == 'Approve'
        ? 'selected' : '' }}>

            Approve

        </option>

        <option value="Selesai"
        {{ request('status') == 'Selesai'
        ? 'selected' : '' }}>

            Selesai

        </option>

    </select>

</form>




        <input type="text"
               id="searchInput"
               placeholder="Cari nama, nomor register atau status...">

        <div class="table-responsive">

            <table>

                <thead>

                    <tr>

                        <th>No</th>
                        <th>No Register</th>
                        <th>Nama</th>
                        <th>Jenis Permohonan</th>
                        <th>Tanggal Foto</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($permohonans as $item)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $item->nomor_permohonan }}
                        </td>

                        <td>
                            {{ $item->nama_lengkap }}
                        </td>

                        <td>
                            {{ $item->jenis_permohonan }}
                        </td>

                        <td>
                            {{ date('d-m-Y',
                            strtotime($item->jadwal_foto)) }}
                        </td>

                        <td>

                            <span class="status"

                            style="
                            background:
                            {{ $item->status == 'Pending' ? '#f59e0b' :
                               ($item->status == 'Approve' ? '#38bdf8' :
                               '#16a34a') }};
                            ">

                                {{ $item->status }}

                            </span>

                        </td>

                        <td>

                            <a href="{{ route('permohonan.show',
                            $item->id) }}"
                            class="btn btn-detail">

                                Detail

                            </a>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<script>

document.getElementById('searchInput')
.addEventListener('keyup', function(){

    let filter = this.value.toLowerCase();

    let rows = document.querySelectorAll('tbody tr');

    rows.forEach(function(row){

        let text = row.innerText.toLowerCase();

        if(text.includes(filter)){

            row.style.display = '';

        }else{

            row.style.display = 'none';

        }

    });

});

</script>

</body>
</html>