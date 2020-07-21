<?php
    include_once("function/helper.php");
    include_once("function/koneksi.php");

    session_start();

    $page = isset($_GET['page']) ? $_GET['page'] : false;
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : false;
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL.'assets/css/style.css' ?>">
    <script src="<?= BASE_URL.'assets/js/jquery-3.5.1.min.js' ?>"></script>
    <title>seputarHukum</title>
</head>
<body>
    <header id="header">
        <a href="<?= BASE_URL ?>"><h1><i>seputar</i><strong>Hukum</strong></h1></a> 
    </header>
    <nav id="navbar">
        <ul id="nav-list">
            <?php if($level): ?>
                <li><a href="<?= BASE_URL.'index.php?page=tulis_artikel&button=tambah' ?>" class="nav-links <?php if($page == "tulis_artikel"): echo 'active'; endif; ?>">Tulis Artikel</a></li>
                <li><a href="<?= BASE_URL.'index.php?page=data_artikel' ?>" class="nav-links <?php if(($page == "data_artikel") || ($page == "artikel")): echo 'active'; endif; ?>">Data Artikel</a></li>
                <li><a href="<?= BASE_URL.'index.php?page=data_kategori' ?>" class="nav-links <?php if(($page == "data_kategori") || ($page == "form_kategori")): echo 'active'; endif; ?>">Data Kategori</a></li>
                <li><a href="<?= BASE_URL.'index.php?page=data_komentar' ?>" class="nav-links <?php if($page == "data_komentar"): echo 'active'; endif; ?>">Data Komentar </a></li>
                <li><a href="<?= BASE_URL.'logout.php' ?>" class="nav-links">Logout</a></li>
            <?php else: ?>
                <li><a href="<?= BASE_URL ?>" class="nav-links <?php if($page == ""): echo 'active'; endif; ?>">Home</a></li>
                <li><a href="<?= BASE_URL.'index.php?page=kategori'?>" class="nav-links <?php if(($page == "kategori") || ($page == "list_artikel") || ($page == "artikel")): echo 'active'; endif; ?>">Kategori</a></li>
                <li><a href="<?= BASE_URL.'index.php?page=about_us'?>" class="nav-links <?php if($page == "about_us"): echo 'active'; endif; ?>">About Us</a></li>
            <?php endif; ?>
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
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("editor");
    </script>
</body>
</html>