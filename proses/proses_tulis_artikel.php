<?php
    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $kategori = $_POST['kategori'];
    $isi = $_POST['isi'];

    $statement = $conn->prepare("INSERT INTO artikel (judul,id_kategori,isi,penulis) VALUES (:judul,:kategori,:isi,:penulis)");
    $statement->execute([
        "judul" => $judul,
        "kategori" => $kategori,
        "isi" => $isi,
        "penulis" => $penulis
    ]);
    
    header("location:".BASE_URL."index.php?page=data_artikel&notice=tambah_berhasil");
?>