<?php
    admin_only($level);
    $id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;
    $button = isset($_GET['button']) ? $_GET['button'] : false;

    $result['kategori'] = "";
    $result['klasifikasi'] = "";
    if($button == "edit"){
        $statement = $conn->prepare("SELECT*FROM kategori WHERE id_kategori=:id_kategori");
        $statement->execute([
            "id_kategori" => $id_kategori
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    }
?>
<div class="container">
    <h1 class="header-tulis-artikel"><?= ucwords($button) ?> Kategori</h1>
    <form action="<?= BASE_URL.'proses/action_kategori.php?id_kategori='.$id_kategori.'' ?>" method='POST'>
        <div class='element-form'>
            <label>Nama Kategori</label>
            <span><input type="text" name='kategori' placeholder='Nama Kategori' value='<?= $result['kategori'] ?>'></span>
        </div>
        <div class='element-form'>
            <label>Klasifikasi</label>
            <span><input type="text" name='klasifikasi' placeholder='Klasifikasi' value='<?= $result['klasifikasi'] ?>'></span>
        </div>
        <div class="element-form">
            <span><input type="submit" value="<?= ucwords($button) ?>" name="button"></span>
        </div>
    </form>
</div>