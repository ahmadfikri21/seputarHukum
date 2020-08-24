<?php
    admin_only($level);

    $notice = isset($_GET['notice']) ? $_GET['notice'] : false;
    $pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
    $cari = isset($_GET['cari']) ? $_GET['cari'] : false;
    $id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;
    $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : false;

    // pagination
    $data_per_halaman = 5;
    $mulai_dari = ($pagination - 1) * $data_per_halaman;

    $noticeKomentar = "";
    if($notice == "tambah_berhasil"){
        $noticeKomentar = "<div class='notice notice-sukses'><p>Artikel berhasil dipost!</p><span class='notice-close'>x</span></div>";
    }else if($notice == "berhasil-hapus"){
        $noticeKomentar = "<div class='notice notice-sukses'><p>Artikel berhasil dihapus!</p><span class='notice-close'>x</span></div>";
    }else if($notice == "Edit_berhasil"){
        $noticeKomentar = "<div class='notice notice-sukses'><p>Artikel berhasil Diedit!</p><span class='notice-close'>x</span></div>";
    }else if($notice == "nothing-selected"){
        $noticeKomentar = "<div class='notice notice-warning'><p>Minimal harus ada 1 pilihan</p><span class='notice-close'>x</span></div>";
    }
?>
<div class="container">
    <?= $noticeKomentar ?> 
    <div class="header-data-artikel">   
        <h2>Data Artikel</h2>
        <form action="<?= BASE_URL.'index.php?page=data_artikel' ?>" method="get">
            <div class="element-form">
                <label>Cari</label>
                <input type="hidden" name="page" value="<?= $_GET['page'] ?>">
                <input type="hidden" name="id_kategori" value="<?= $id_kategori ?>">
                <input type="hidden" name="kategori" value="<?= $kategori ?>">
                <span><input type="text" name="cari" value="<?= $cari ?>" placeholder="Cari"><input type="submit" value="Cari"></span>
            </div>
        </form>
    </div>
    <section class='frame-list-artikel'>
        <?php
            $search_url = "";
            $where = "";
            if(!$id_kategori){
                echo "<h2 style='font-weight:normal;'>Semua Kategori</h2>";
                if($cari){
                    $search_url = "&kategori=$kategori&cari=$cari";
                    $where = "WHERE artikel.judul LIKE '%$cari%' OR artikel.penulis LIKE '%$cari%' OR artikel.tgl_dibuat LIKE '%$cari%' OR kategori.kategori LIKE '%$cari%'";
                }
            }else{
                echo "<h2 style='font-weight:normal;'>Kategori ".$kategori."</h2>";
                $search_url = "&kategori=$kategori&id_kategori=$id_kategori";
                $where = "WHERE artikel.id_kategori='$id_kategori'";
                if($cari && $id_kategori){
                    $search_url = "&kategori=$kategori&id_kategori=$id_kategori&cari=$cari";
                    $where = "WHERE artikel.id_kategori='$id_kategori' AND artikel.judul LIKE '%$cari%' OR artikel.penulis LIKE '%$cari%' OR artikel.tgl_dibuat LIKE '%$cari%'";
                    
                }
            }
            $statementArtikel = $conn->prepare("SELECT artikel.*,kategori.kategori,kategori.id_kategori FROM artikel JOIN kategori ON kategori.id_kategori = artikel.id_kategori $where ORDER BY artikel.tgl_dibuat DESC LIMIT $mulai_dari, $data_per_halaman ");
            $statementArtikel->execute();
            $result = $statementArtikel->fetchAll(PDO::FETCH_ASSOC);

            $boxClass = "";
            if($level){
                $boxClass = "box-artikel-data";
            }
            if(count($result) != 0):
            foreach($result as $row){
                echo "<div class='$boxClass'>
                        <div class='box-artikel'>
                            <label>$row[judul]</label>
                            <label>Diupload pada : $row[tgl_dibuat]</label>
                            <p>$row[deskripsi]</p>
                        ";
                        ?>
                            <span>
                                <a href="<?= BASE_URL.'index.php?page=artikel&id_artikel='.$row['id_artikel'].'' ?>" class='button-readmore'>Selengkapnya</a>
                                <a href="<?= BASE_URL.'index.php?page=tulis_artikel&id_artikel='.$row['id_artikel'].'&button=edit' ?>" class="button-edit">Edit Artikel</a>
                                <a href="<?= BASE_URL.'proses/hapus_artikel.php?id_artikel='.$row['id_artikel'].'' ?>" class='button-hapus' onclick="return confirm('Apakah Anda yakin? (komentar yang ada di artikel ini juga akan dihapus)')">Hapus Artikel</a>
                            </span>
                        </div>
                        <div class="checkbox-artikel">
                            <form action="<?= BASE_URL.'proses/hapus_artikel.php' ?>" method="POST">
                                <input type="checkbox" name="selected[]" value="<?= $row['id_artikel'] ?>">
                        </div>
                    </div>
            <?php
            }
            // untuk menampilkan link pagination
            $statementHitungArtikel = $conn->prepare("SELECT artikel.*,kategori.kategori FROM artikel JOIN kategori ON kategori.id_kategori = artikel.id_kategori $where ORDER BY artikel.tgl_dibuat DESC");
            $statementHitungArtikel->execute();
            $resultH = $statementHitungArtikel->fetchAll(PDO::FETCH_ASSOC);
            $url = "index.php?page=data_artikel$search_url";

            pagination($resultH, $data_per_halaman, $pagination, $url);
            ?>
                <input type="submit" name="delete" class="hapus-pilihan" value="Hapus Pilihan" onclick="return confirm('Apakah anda yakin? (komentar yang ada di artikel ini juga akan dihapus)')">
            </form>
            <?php
            else:
                ?>
                <div class="container">
                    <div class='not-found'>
                        <h1>Belum ada artikel</h1>
                        <a href="<?= BASE_URL.'index.php?page=data_kategori'?>" class='button-kembali'>Kembali ke halaman sebelumnya</a>
                    </div>
                </div>
                <?php
            endif;

            ?>
        
    </section>
</div>