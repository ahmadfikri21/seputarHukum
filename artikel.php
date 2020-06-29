<?php
    $id_artikel = isset($_GET['id_artikel']) ? $_GET['id_artikel'] : false;
    $notice = isset($_GET['notice']) ? $_GET['notice'] : false;
    $noticeKomentar = "";

    if($notice == "komentar"){
        $noticeKomentar = "<div class='notice-komentar'><p>Komentar anda berhasil dipost</p><span class='notice-close'>x</span></div>";
    }

    if($id_artikel):
        $statementArtikel = $conn->prepare("SELECT*FROM artikel WHERE id_artikel = '$id_artikel'");
        $statementArtikel->execute();
        $result = $statementArtikel->fetch();

        $statementKategori = $conn->prepare("SELECT kategori FROM kategori WHERE id_kategori ='$result[id_kategori]'");
        $statementKategori->execute();
        $kategori = $statementKategori->fetch();
?>

<div class="header-page">
    <div class="container">
        <h2><?= $result['judul'] ?></h2>
        <ul>
            <li><p>Penulis</p>  <?= $result['penulis'] ?></li>
            <li><p>Tanggal Diposting </p> <?= $result['tgl_dibuat'] ?></li>
            <li><p>Kategori </p> <?= $kategori['kategori'] ?></li>
        </ul>
    </div>  
</div>
<div class="container">
    <?= $noticeKomentar ?>
    <div class="frame-home">
        <div class="kiri">
            <p><?= $result['isi'] ?></p>
        </div>
        <div class="kanan">
        <h3>Artikel Terbaru</h3>
            <?php
                $statement = $conn->prepare("SELECT *FROM artikel ORDER BY tgl_dibuat DESC LIMIT 3");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC); 

                if(count($result) == 0){
                    echo "Tidak ada artikel terbaru";
                }else{
                    $statementKategori = "";
                    foreach($result as $row){
                        $statementKategori = $conn->prepare("SELECT kategori FROM kategori WHERE id_kategori = '$row[id_kategori]'");
                        $statementKategori->execute();
                        $kategori = $statementKategori->fetch();

                        echo "<ul class='list-artikel-terbaru'>
                                <li><a href='".BASE_URL."index.php?page=artikel&id_artikel=$row[id_artikel]' class='list-judul'>$row[judul]</a></i>
                                <li>Diposting pada : $row[tgl_dibuat]</li>
                                <li>Kategori <a href='".BASE_URL."index.php?page=kategori&id_kategori=$row[id_kategori]'>$kategori[kategori]</a></i>
                                <li>Penulis $row[penulis]</i>
                            </ul>";
                    }
                }

            ?>
        </div>
    </div>
</div>
<div class="frame-komentar">
    <div class="container">
        <h2>Komentar</h2>
        <?php
            $stmtKomentar = $conn->prepare("SELECT*FROM komentar WHERE id_artikel='$id_artikel' ORDER BY tgl_dibuat DESC");
            $stmtKomentar->execute();
            $komentar = $stmtKomentar->fetchAll(PDO::FETCH_ASSOC);

            if(count($komentar) == 0){
                echo "Belum ada komentar";
            }else{
                foreach($komentar as $data){
                    echo "<div class='komentar'>
                            <label class='nama-komentar'>$data[nama]</label><br>
                            <label class='tgl-komentar'>$data[tgl_dibuat]</label>
                            <p class='isi-komentar'>$data[komentar]</p>
                        </div>";
                }
            }
        ?>
        <h2>Tambahkan Komentar</h2>
        <form action="<?= BASE_URL.'proses_komentar.php?id_artikel='.$id_artikel.'' ?>" method="POST">
            <div class='element-form'>
                <label>Nama</label>
                <span><input type="text" name='nama' placeholder='Nama'></span>
            </div>
            <div class='element-form'>
                <label>E-Mail</label>
                <span><input type="text" name='email' placeholder='E-Mail'></span>
            </div>
            <div class='element-form'>
                <label>Komentar</label>
                <span><textarea name='komentar' placeholder='Komentar' rows="10px"></textarea></span>
            </div>
            <div class='element-form'>
                <span><input type="submit" value="Submit"></span>
            </div>
        </form>
    </div>
</div>


<?php
    else:
        echo "maaf artikel tidak terdaftar";
    endif;
?>