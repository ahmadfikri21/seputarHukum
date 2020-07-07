<?php
    include_once('../function/helper.php');
    include_once('../function/koneksi.php');

    $button = $_POST['button'];
    $id_kategori = $_GET['id_kategori'];
    $kategori = $_POST['kategori'];
    $klasifikasi = $_POST['klasifikasi'];

    if($button == "Edit"){
        $statement = $conn->prepare("UPDATE kategori SET kategori=:kategori,klasifikasi=:klasifikasi WHERE id_kategori=:id_kategori");
        $statement->execute([
            "kategori" => $kategori,
            "klasifikasi" => $klasifikasi,
            "id_kategori" => $id_kategori
        ]);
        header("location:".BASE_URL."index.php?page=data_kategori&notice=edit_berhasil");
    }else if($button="Tambah"){
        $statement = $conn->prepare("INSERT INTO kategori (kategori,klasifikasi) VALUES (:kategori,:klasifikasi)");
        $statement->execute([
            "kategori" => $kategori,
            "klasifikasi" => $klasifikasi
        ]);
        header("location:".BASE_URL."index.php?page=data_kategori&notice=tambah_berhasil");
    }
?>