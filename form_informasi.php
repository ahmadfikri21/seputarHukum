<?php
    admin_only($level);

    $id_informasi = isset($_GET['id_informasi']) ? $_GET['id_informasi'] : false;

    $statementInformasi = $conn->prepare("SELECT * FROM informasi WHERE id_informasi=:id_informasi");
    $statementInformasi->execute([
        "id_informasi" => $id_informasi
    ]);
    $result = $statementInformasi->fetch(PDO::FETCH_ASSOC); 
?>
<div class="container">
    <form action="<?= BASE_URL.'proses/proses_edit_informasi.php' ?>" method='POST'>
        <h1 class="header-tulis-artikel">Edit Informasi Home</h1>
        <input type="hidden" name="id_informasi" value="<?= $id_informasi ?>">
        <div>
            <label>Informasi Home</label>
            <span><textarea name="isi" id="editor" cols="30" rows="10"><?= $result['isi'] ?></textarea></span>
        </div>
        <div class="element-form">
            <span><input type="submit" name="button" value="Ubah"></span>
        </div>
    </form>
</div>