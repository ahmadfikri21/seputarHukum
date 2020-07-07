<?php
    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    $id_komentar = $_GET['id_komentar'];

    $statement = $conn->prepare("DELETE FROM komentar WHERE id_komentar=:id_komentar");
    $statement->execute([
        "id_komentar" => $id_komentar
    ]);

    header("location:".BASE_URL."index.php?page=data_komentar&notice=hapus-sukses");
?>