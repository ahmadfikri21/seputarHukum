<?php
    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    $button = $_POST['button'];
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $isi = $_POST['isi'];

    if(isset($_POST['button'])){
        if($button == "Edit"){
            $id_artikel = $_POST['id_artikel'];
            $statement = $conn->prepare("UPDATE artikel SET judul=:judul, id_kategori=:kategori, deskripsi =:deskripsi, isi=:isi WHERE id_artikel=:id_artikel");
            $statement->execute([
                "id_artikel" => $id_artikel,
                "judul" => $judul,
                "kategori" => $kategori,
                "deskripsi" => $deskripsi,
                "isi" => $isi
            ]);
            
            header("location:".BASE_URL."index.php?page=data_artikel&notice=Edit_berhasil");
        }else if($button == "Tambah"){
            $statement = $conn->prepare("INSERT INTO artikel (judul,id_kategori,deskripsi,isi) VALUES (:judul,:kategori,:deskripsi,:isi)");
                        $statement->execute([
                            "judul" => $judul,
                            "kategori" => $kategori,
                            "deskripsi" => $deskripsi,
                            "isi" => $isi
                        ]);
            
            header("location:".BASE_URL."index.php?page=data_artikel&notice=tambah_berhasil");
        }
    }
?>