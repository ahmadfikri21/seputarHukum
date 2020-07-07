<?php
    include_once("function/helper.php");
    include_once("function/koneksi.php");

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(($email === "") && ($password === "")){
        header("location:".BASE_URL."login.php?notice=email");
    }else{
        $statement = $conn->prepare("SELECT email,password,level FROM user WHERE email=:email AND password=:pass");
    
        $statement->execute(
            ['email' => $email,
            'pass' => $password]
        );
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        if(($result['password'] != $password) || ($result['email'] != $email)){
            header("location:".BASE_URL."login.php?notice=login-gagal");
        }else{
            session_start();

            $_SESSION['email'] = $_POST['email'];
            $_SESSION['level'] = true;

            header("location:".BASE_URL."index.php?page=data_artikel");
        }
    }

?>