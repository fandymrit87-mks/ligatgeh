<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Admin</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial, sans-serif;
            background:#eef3fb;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .login-box{
            width:100%;
            max-width:400px;
            background:white;
            padding:40px;
            border-radius:20px;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

        .title{
            text-align:center;
            font-size:28px;
            font-weight:bold;
            color:#0a2c66;
            margin-bottom:30px;
        }

        .form-group{
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:bold;
        }

        input{
            width:100%;
            padding:14px;
            border:1px solid #cbd5e1;
            border-radius:10px;
            font-size:16px;
            outline:none;
        }

        input:focus{
            border-color:#2563eb;
        }

        .btn-login{
            width:100%;
            padding:14px;
            border:none;
            border-radius:10px;
            background:#2563eb;
            color:white;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            margin-top:10px;
        }

        .btn-login:hover{
            background:#1d4ed8;
        }

        .remember{
            display:flex;
            align-items:center;
            gap:10px;
            margin-top:10px;
        }

        .remember input{
            width:auto;
        }

        .error{
            background:#fee2e2;
            color:#b91c1c;
            padding:12px;
            border-radius:10px;
            margin-bottom:20px;
        }

    </style>

</head>

<body>

<div class="login-box">

    <div class="title">
        LOGIN ADMIN
    </div>

    @if ($errors->any())

        <div class="error">
            Email atau password salah
        </div>

    @endif

    <form method="POST"
          action="{{ route('login') }}">

        @csrf

        <div class="form-group">

            <label>Email</label>

            <input type="email"
                   name="email"
                   required>

        </div>

        <div class="form-group">

            <label>Password</label>

            <input type="password"
                   name="password"
                   required>

        </div>

        <div class="remember">

            <input type="checkbox"
                   name="remember">

            <span>Remember me</span>

        </div>

        <button type="submit"
                class="btn-login">

            Login

        </button>

    </form>

</div>

</body>
</html>