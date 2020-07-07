<?php
    admin_only($level);
?>
<div class="container">
    <h1 class="header-tulis-artikel">Tulis Artikel Baru</h1>
    <form action="<?= BASE_URL.'proses/proses_tulis_artikel.php' ?>" method='POST'>
        <div class='element-form'>
            <label>Judul Artikel</label>
            <span><input type="text" name='judul' placeholder='Judul Artikel'></span>
        </div>
        <div class='element-form'>
            <label>Penulis</label>
            <span><input type="text" name='penulis' placeholder='Penulis'></span>
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
                        echo "<option value='$row[id_kategori]'>$row[kategori]</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <label>Isi Artikel</label>
            <span><textarea name="isi" id="editor" cols="30" rows="10"></textarea></span>
        </div>
        <div class="element-form">
            <span><input type="submit" value="Submit"></span>
        </div>
    </form>
</div>