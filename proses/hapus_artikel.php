<?php
    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    $id_artikel = $_GET['id_artikel'];

    $statement = $conn->prepare("DELETE FROM artikel WHERE id_artikel=:id_artikel");
    $statement->execute([
        "id_artikel" => $id_artikel
    ]);

    header("location:".BASE_URL."index.php?page=data_artikel&notice=berhasil-hapus");
?>