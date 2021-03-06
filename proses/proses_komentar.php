<?php
    include_once("../function/koneksi.php");
    include_once("../function/helper.php");

    $button = $_POST['btn-komentar'];
    $id_artikel = $_GET['id_artikel'];
    $nama = $_POST['nama'];
    $email= $_POST['email'];
    $komentar = $_POST['komentar'];

    if($button == "Tambah Komentar"){
        $insertStatement = $conn->prepare("INSERT INTO komentar (id_artikel,nama,email,komentar) VALUES (:id_artikel,:nama,:email,:komentar)");
        $array['id_artikel'] = $id_artikel;
        $array['nama'] = $nama;
        $array['email'] = $email;
        $array['komentar'] = $komentar;

        $insertStatement->execute($array);
    }else if($button == "Balas"){
        $parent_komentar = $_POST['parent_komentar'];

        $insertStatement = $conn->prepare("INSERT INTO komentar (id_artikel,nama,email,komentar,parent_komentar) VALUES (:id_artikel,:nama,:email,:komentar,:parent_komentar)");
        $array['id_artikel'] = $id_artikel;
        $array['nama'] = $nama;
        $array['email'] = $email;
        $array['komentar'] = $komentar;
        $array['parent_komentar'] = $parent_komentar;

        $insertStatement->execute($array);
    }

    header("location:".BASE_URL."index.php?page=artikel&id_artikel=".$id_artikel."&notice=komentar");
?>