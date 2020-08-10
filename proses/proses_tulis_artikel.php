<?php
    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $kategori = $_POST['kategori'];
    $isi = $_POST['isi'];
    $button = $_POST['button'];
    $deskripsi = $_POST['deskripsi'];

    if($button == "Edit"){
        $id_artikel = $_POST['id_artikel'];
        $statement = $conn->prepare("UPDATE artikel SET judul=:judul, id_kategori=:kategori, deskripsi =:deskripsi, isi=:isi, penulis=:penulis WHERE id_artikel=:id_artikel");
        $statement->execute([
            "id_artikel" => $id_artikel,
            "judul" => $judul,
            "kategori" => $kategori,
            "deskripsi" => $deskripsi,
            "isi" => $isi,
            "penulis" => $penulis
        ]);
        
        header("location:".BASE_URL."index.php?page=data_artikel&notice=Edit_berhasil");
    }else if($button == "Tambah"){
        $statement = $conn->prepare("INSERT INTO artikel (judul,id_kategori,deskripsi,isi,penulis) VALUES (:judul,:kategori,:deskripsi,:isi,:penulis)");
        $statement->execute([
            "judul" => $judul,
            "kategori" => $kategori,
            "deskripsi" => $deskripsi,
            "isi" => $isi,
            "penulis" => $penulis
        ]);
        
        header("location:".BASE_URL."index.php?page=data_artikel&notice=tambah_berhasil");
    }
?>