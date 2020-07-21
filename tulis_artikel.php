<?php
    admin_only($level);

    $id_artikel = isset($_GET['id_artikel']) ? $_GET['id_artikel'] : false;
    $button = isset($_GET['button']) ? $_GET['button'] : false;

    $heading = "";
    $judul = "";
    $penulis = "";
    $id_kategori = "";
    $isi = "";
    if($button == "edit"){
        $heading = "Edit Artikel";

        $statementEdit = $conn->prepare("SELECT*FROM artikel WHERE id_artikel=:id_artikel");
        $statementEdit->execute([
            "id_artikel" => $id_artikel
        ]);
        $result = $statementEdit->fetch(PDO::FETCH_ASSOC);

        $judul = $result['judul'];
        $penulis = $result['penulis'];
        $id_kategori = $result['id_kategori'];
        $isi = $result['isi'];
    }else if($button = "tambah"){
        $heading = "Tulis Artikel Baru";
    }
?>
<div class="container">
    <h1 class="header-tulis-artikel"><?= $heading ?></h1>
    <form action="<?= BASE_URL.'proses/proses_tulis_artikel.php' ?>" method='POST'>
        <input type="hidden" name="id_artikel" value="<?= $id_artikel ?>">
        <div class='element-form'>
            <label>Judul Artikel</label>
            <span><input type="text" name='judul' placeholder='Judul Artikel' value="<?= $judul ?>"></span>
        </div>
        <div class='element-form'>
            <label>Penulis</label>
            <span><input type="text" name='penulis' placeholder='Penulis' value="<?= $penulis ?>"></span>
        </div>
        <div class='element-form'>
            <label>Kategori</label>
            <select name="kategori">
                <option value="">Pilih Kategori</option>
                <?php
                    $statement = $conn->prepare("SELECT*FROM kategori");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

                    foreach($result as $row){
                        if($id_kategori == $row['id_kategori']){
                            echo "<option value='$row[id_kategori]' selected='true'>$row[kategori]</option>";
                        }else{
                            echo "<option value='$row[id_kategori]'>$row[kategori]</option>";
                        }
                    }
                ?>
            </select>
        </div>
        <div>
            <label>Isi Artikel</label>
            <span><textarea name="isi" id="editor" cols="30" rows="10"><?= $isi ?></textarea></span>
        </div>
        <div class="element-form">
            <span><input type="submit" name="button" value="<?= ucfirst($button) ?>"></span>
        </div>
    </form>
</div>