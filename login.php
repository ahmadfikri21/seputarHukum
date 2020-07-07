<?php
    include_once("function/helper.php");
    
    $notice = isset($_GET['notice']) ? $_GET['notice'] : false;
    $noticeLogin = "";

    if($notice == "login-gagal"){
        $noticeLogin = "<div class='notice notice-gagal'><p>Username atau password Salah!</p><span class='notice-close'>x</span></div>";
    }else if($notice == "logout-sukses"){
        $noticeLogin = "<div class='notice notice-sukses'><p>Logout Sukses !</p><span class='notice-close'>x</span></div>";
    }else if($notice == "email" || $notice == "password"){
        $noticeLogin = "<div class='notice notice-gagal'><p>Kolom tidak boleh kosong</p><span class='notice-close'>x</span></div>";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL.'assets/css/style.css' ?>">
    <title>seputarHukum</title>
</head>
<body>
    <div class="background-login">
        <div class="container-login">
            <header class='header-login'>
                <h1><a href="<?= BASE_URL ?>"><h1><i>seputar</i><strong>Hukum</strong></h1></a></h1>
            </header>
            <div id="frame-login">
                <h2>Login Admin</h2>
                <?= $noticeLogin ?>
                <form action="<?= BASE_URL.'proses_login.php' ?>" method="POST">
                    <div class='element-form'>
                        <label>E-mail</label>
                        <span><input type="text" name='email' placeholder='E-mail'></span>
                    </div>
                    <div class='element-form'>
                        <label>Password</label>
                        <span><input type="password" name='password' placeholder='Password'></span>
                    </div>
                    <div class='element-form'>
                        <span><input type="submit" value='Login'></span>
                    </div>
                </form>
            </div>
    </div>
    <script src="assets/js/app.js"></script>
</body>
</html>