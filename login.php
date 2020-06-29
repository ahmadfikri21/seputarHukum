<?php
    include_once("function/helper.php");
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
                <form action="<?= BASE_URL.'proses_login.php' ?>" method="post">
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
</body>
</html>