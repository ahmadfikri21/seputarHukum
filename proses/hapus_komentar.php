<?php
    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    if(count($_POST['selected']) != 0){
        $id_komentar = implode(",",$_POST['selected']);
        $statement = $conn->prepare("DELETE FROM komentar WHERE id_komentar IN ($id_komentar)");
        $statement->execute();
    
        header("location:".BASE_URL."index.php?page=data_komentar&notice=hapus-sukses");
    }else{
        header("location:".BASE_URL."index.php?page=data_komentar&notice=nothing-selected");
    }
?>