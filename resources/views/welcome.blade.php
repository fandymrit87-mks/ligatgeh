<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        APLIKASI LIGAT GEH
    </title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            font-family:Arial, sans-serif;
            min-height:100vh;

            background:linear-gradient(
                90deg,
                #67d4db,
                #0f4fb6
            );

            display:flex;
            justify-content:center;
            align-items:center;

            padding:20px;

            -webkit-font-smoothing:antialiased;

        }

        .container{

            width:100%;
            max-width:900px;

            text-align:center;
            color:white;

        }

        .logo-group{

            display:flex;
            justify-content:center;
            align-items:center;
            gap:15px;

            margin-bottom:15px;

        }

        .logo-group img{

            width:55px;

        }

        .office{

            font-size:18px;
            margin-bottom:15px;
            line-height:1.5;

        }

        .line{

            width:100%;
            max-width:800px;

            height:4px;

            background:#67d4db;

            margin:15px auto 45px auto;

            border-radius:10px;

        }

        .welcome{

            font-size:55px;
            font-weight:bold;

            margin-bottom:15px;

            color:#E6C16F;

        }

        .title{

            font-size:36px;
            letter-spacing:3px;

            margin-bottom:18px;

        }

       .subtitle{

            font-size:13px;
            line-height:1.6;

            margin-bottom:50px;

            color:white;

        }

        .button-group{

            display:flex;
            justify-content:center;
            align-items:center;

        }

        .btn{

            width:180px;

            padding:12px;

            border-radius:50px;

            background:white;

            color:black;
            text-decoration:none;

            font-size:14px;
            font-weight:bold;

            transition:0.3s;

            box-shadow:0 5px 20px rgba(0,0,0,0.2);

        }

        .btn:hover{

            transform:translateY(-5px);

            background:#eef3fb;

        }

        @media(max-width:768px){

            body{
                padding:15px;
            }

            .logo-group img{

                width:45px;

            }

           .office{

            font-size:12px !important;
            margin-bottom:15px;
            line-height:1.5;

            color:#000 !important;

            font-weight:bold;

        }

            .line{

                margin-bottom:35px;

            }

            .welcome{

                font-size:36px;
                margin-bottom:12px;

            }

            .title{

                font-size:24px;
                letter-spacing:2px;

                margin-bottom:15px;

            }

            .subtitle{

                font-size:13px;
                line-height:1.7;

                margin-bottom:40px;

            }

            .btn{

                width:220px;

                font-size:16px;

                padding:14px;

            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="logo-group">

        <img src="{{ asset('img/logo1.png') }}"
             alt="Logo 1">

        <img src="{{ asset('img/logo2.png') }}"
             alt="Logo 2">

    </div>

    <div class="office">

        KANTOR IMIGRASI KELAS I TPI BANDAR LAMPUNG

    </div>

    <div class="line"></div>

    <div class="welcome">

        SELAMAT DATANG

    </div>

    <div class="title">

        APLIKASI LIGAT GEH

    </div>

    <div class="subtitle">

        LAYANAN IMIGRASI GERAK CEPAT,
        GESIT, EFEKTIF, HUMANIS

    </div>

    <div class="button-group">

        <a href="{{ url('/permohonan') }}"
           class="btn">

            PENGAJUAN<br>
            PERMOHONAN

        </a>

    </div>

</div>

</body>
</html>