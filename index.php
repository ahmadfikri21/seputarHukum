<?php
    include_once("function/helper.php");
    include_once("function/koneksi.php");

    $page = isset($_GET['page']) ? $_GET['page'] : false;
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
    <header id="header">
        <a href="<?= BASE_URL ?>"><h1><i>seputar</i><strong>Hukum</strong></h1></a> 
    </header>
    <nav id="navbar">
        <ul id="nav-list">
            <li><a href="<?= BASE_URL ?>" class="nav-links <?php if($page == ""): echo 'active'; endif; ?>">Home</a></li>
            <li><a href="<?= BASE_URL.'index.php?page=kategori'?>" class="nav-links <?php if(($page == "kategori") or ($page == "list_artikel")): echo 'active'; endif; ?>">Kategori</a></li>
            <li><a href="<?= BASE_URL.'index.php?page=about_us'?>" class="nav-links <?php if($page == "about_us"): echo 'active'; endif; ?>">About Us</a></li>
        </ul>
    </nav>
        <?php
            $filename = "$page.php";
            if(file_exists($filename)){
                include_once($filename);
            }else{
                include_once("home.php");
            }
        ?>
    <footer id="footer">
            <span>Copyright &copy; 2020 <i>seputar</i>Hukum </span>
    </footer>
    <script src='<?= BASE_URL ."assets/js/app.js"?>'></script>
</body>
</html>