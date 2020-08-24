<?php
    include_once('../function/helper.php');
    include_once('../function/koneksi.php');

    $button = $_POST['button'];
    $id_kategori = $_GET['id_kategori'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    if($button == "Edit"){
        $statement = $conn->prepare("UPDATE kategori SET kategori=:kategori,deskripsi=:deskripsi WHERE id_kategori=:id_kategori");
        $statement->execute([
            "kategori" => $kategori,
            "deskripsi" => $deskripsi,
            "id_kategori" => $id_kategori
        ]);
        header("location:".BASE_URL."index.php?page=data_kategori&notice=edit_berhasil");
    }else if($button == "Tambah"){
        $statement = $conn->prepare("INSERT INTO kategori (kategori,deskripsi) VALUES (:kategori,:deskripsi)");
        $statement->execute([
            "kategori" => $kategori,
            "deskripsi" => $deskripsi
        ]);
        header("location:".BASE_URL."index.php?page=data_kategori&notice=tambah_berhasil");
    }
?>