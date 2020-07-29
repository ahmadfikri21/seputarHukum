<?php
    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    $id_informasi = $_POST['id_informasi'];
    $isi = $_POST["isi"];

    $stmt = $conn->prepare("UPDATE informasi SET isi =:isi WHERE id_informasi=:id_informasi ");
    $stmt->execute([
        "id_informasi" => $id_informasi,
        "isi" => $isi
    ]);

    header("location:".BASE_URL."index.php?page=home&notice=Edit_berhasil");
?>