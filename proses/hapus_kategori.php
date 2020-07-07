<?php
    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    $id_kategori = $_GET['id_kategori'];

    $statementArtikel = $conn->prepare("DELETE FROM Artikel WHERE id_kategori=:id_kategori");
    $statementArtikel->execute([
        "id_kategori" => $id_kategori
    ]);

    $statementKategori = $conn->prepare("DELETE FROM kategori WHERE id_kategori=:id_kategori");
    $statementKategori->execute([
        "id_kategori" => $id_kategori
    ]);

    header("location:".BASE_URL."index.php?page=data_kategori&notice=hapus-sukses");
?>