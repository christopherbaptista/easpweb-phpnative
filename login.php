<?php
session_start();
if (isset($_SESSION['admin_username'])) {
    header("location:overview.php");
}
include("koneksi.php");
$username = "";
$password = "";
$err = "";
if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    if ($username == '' or $password == '') {
        $err .= "<li>Silakan masukkan username dan password</li>";
    }
    if (empty($err)) {
        $sql1 = "select * from admin where username = '$username'";
        $q1 = mysqli_query($koneksi_login, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if ($r1['password'] != md5($password)) {
            $err .= "<li>Akun tidak ditemukan</li>";
        }
    }
    if (empty($err)) {
        $login_id = $r1['login_id'];
        $sql1 = "select * from admin_akses where login_id = '$login_id'";
        $q1 = mysqli_query($koneksi_login, $sql1);
        while ($r1 = mysqli_fetch_array($q1)) {
            $akses[] = $r1['akses_id']; //spp, guru, siswa
        }
        if (empty($akses)) {
            $err .= "<li>Kamu tidak punya akses ke halaman admin</li>";
        }
    }
    if (empty($err)) {
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_akses'] = $akses;
        header("location:overview.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://img.icons8.com/color/48/000000/story-book.png"/>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');
        @import url('https://use.fontawesome.com/releases/v5.2.0/css/all.css');
        @import url('https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;	
            font-family: Raleway, sans-serif;
        }

        body {
            background: linear-gradient(90deg, #C7C5F4, #776BCC);		
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .screen {		
            background: linear-gradient(90deg, #5D54A4, #7C78B8);		
            position: relative;	
            height: 700px;
            width: 400px;	
            box-shadow: 0px 0px 24px #5C5696;
        }

        .screen__content {
            z-index: 1;
            position: relative;	
            height: 100%;
        }

        .screen__background {		
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 0;
            -webkit-clip-path: inset(0 0 0 0);
            clip-path: inset(0 0 0 0);	
        }

        .screen__background__shape {
            transform: rotate(45deg);
            position: absolute;
        }

        .screen__background__shape1 {
            height: 520px;
            width: 520px;
            background: #FFF;	
            top: -50px;
            right: 120px;	
            border-radius: 0 72px 0 0;
        }

        .screen__background__shape2 {
            height: 220px;
            width: 220px;
            background: #6C63AC;	
            top: -172px;
            right: 0;	
            border-radius: 32px;
        }

        .screen__background__shape3 {
            height: 540px;
            width: 190px;
            background: linear-gradient(270deg, #5D54A4, #6A679E);
            top: -24px;
            right: 0;	
            border-radius: 32px;
        }

        .screen__background__shape4 {
            height: 400px;
            width: 200px;
            background: #7E7BB9;	
            top: 420px;
            right: 50px;	
            border-radius: 60px;
        }

        .login {
            width: 320px;
            padding: 30px;
            padding-top: 156px;
        }

        .login__field {
            padding: 20px 0px;	
            position: relative;	
        }

        .login__icon {
            position: absolute;
            top: 30px;
            color: #7875B5;
        }

        .login__input {
            border: none;
            border-bottom: 2px solid #D1D1D4;
            background: none;
            padding: 10px;
            padding-left: 24px;
            font-weight: 700;
            width: 75%;
            transition: .2s;
        }

        .login__input:active,
        .login__input:focus,
        .login__input:hover {
            outline: none;
            border-bottom-color: #6A679E;
        }

        .login__submit {
            background: #fff;
            font-size: 14px;
            margin-top: 30px;
            padding: 16px 20px;
            border-radius: 26px;
            border: 1px solid #D4D3E8;
            text-transform: uppercase;
            font-weight: 700;
            display: flex;
            align-items: center;
            width: 100%;
            color: #4C489D;
            box-shadow: 0px 2px 2px #5C5696;
            cursor: pointer;
            transition: .2s;
        }

        .login__submit:active,
        .login__submit:focus,
        .login__submit:hover {
            border-color: #6A679E;
            outline: none;
        }

        .button__icon {
            font-size: 24px;
            margin-left: auto;
            color: #7875B5;
        }

        .img {
            width: 100px;
            margin-bottom: 30px;
        }

        .made-with-love {
            margin-top: 40px;
            padding: 10px;
            clear: left;
            text-align: center;
            font-size: 10px;
            font-family: arial;
            color: #fff;
        }
        .made-with-love i {
            font-style: normal;
            color: #F50057;
            font-size: 14px;
            position: relative;
            top: 2px;
        }
        .made-with-love a {
            color: #fff;
            text-decoration: none;
        }
        .made-with-love a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <?php
                if ($err) {
                    echo "<ul>$err</ul>";
                }
                ?>                                
                <form action="" method="post" class="login">
                    <img alt="..." src="https://katamata.files.wordpress.com/2011/12/lambang-its-png-v2.png" class="img">
                    
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" value="<?php echo $username ?>" name="username" placeholder="Username">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" name="password" class="login__input" placeholder="Password">
                    </div>
                    <button class="button login__submit" type="submit" name="login">
                        <span class="button__text">Login</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
            <!-- tag -->
            <div class="made-with-love">
                Made with 
                <i>♥</i> by 
                <a target="_blank" href="#">Christopher Baptista</a>
            </div>	
        </div>
        
    </div>
</body>

</html>

