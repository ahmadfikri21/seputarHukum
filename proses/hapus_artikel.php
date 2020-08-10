<?php
    include_once("../function/helper.php");
    include_once("../function/koneksi.php");

    
    if(isset($_GET['id_artikel'])){
        $id_artikel = $_GET['id_artikel'];

        $statement = $conn->prepare("DELETE FROM komentar WHERE id_artikel=:id_artikel");
        $statement->execute([
            "id_artikel" => $id_artikel
        ]);

        $statement = $conn->prepare("DELETE FROM artikel WHERE id_artikel=:id_artikel");
        $statement->execute([
            "id_artikel" => $id_artikel
        ]);

        header("location:".BASE_URL."index.php?page=data_artikel&notice=berhasil-hapus");
    }else{
        if(count($_POST['selected']) == 0){
            header("location:".BASE_URL."index.php?page=data_artikel&notice=nothing-selected");
        }else{
            $id = implode(",",$_POST['selected']);

            $statement = $conn->prepare("DELETE FROM komentar WHERE id_artikel IN ($id)");
            $statement->execute([
                "id_artikel" => $id_artikel
            ]);

            $statement = $conn->prepare("DELETE FROM artikel WHERE id_artikel IN ($id)");
            $statement->execute();

            header("location:".BASE_URL."index.php?page=data_artikel&notice=berhasil-hapus");
        }
    }
?>