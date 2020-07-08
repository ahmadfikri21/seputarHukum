<?php
    admin_only($level);

    $notice = isset($_GET['notice']) ? $_GET['notice'] : false;
    $pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
    $cari = isset($_GET['cari']) ? $_GET['cari'] : false;

    // pagination
    $data_per_halaman = 5;
    $mulai_dari = ($pagination - 1) * $data_per_halaman;

    $noticeKomentar = "";
    if($notice == "tambah_berhasil"){
        $noticeKomentar = "<div class='notice notice-sukses'><p>Artikel berhasil dipost!</p><span class='notice-close'>x</span></div>";
    }else if($notice == "berhasil-hapus"){
        $noticeKomentar = "<div class='notice notice-sukses'><p>Artikel berhasil dihapus!</p><span class='notice-close'>x</span></div>";
    }
?>
<div class="container">
    <div class="header-data-artikel">
        <?= $noticeKomentar ?>    
        <h2>Data Artikel</h2>
        <form action="<?= BASE_URL.'index.php?page=data_artikel' ?>" method="get">
            <div class="element-form">
                <label>Cari</label>
                <input type="hidden" name="page" value="<?= $_GET['page'] ?>">
                <span><input type="text" name="cari" value="<?= $cari ?>" placeholder="Cari"><input type="submit" value="Cari"></span>
            </div>
        </form>
    </div>
    <section class='frame-list-artikel'>
        <?php
            $search_url = "";
            $where = "";
            if($cari){
                $search_url = "&cari=$cari";
                $where = "WHERE artikel.judul LIKE '%$cari%' OR artikel.penulis LIKE '%$cari%' OR artikel.tgl_dibuat LIKE '%$cari%' OR kategori.kategori LIKE '%$cari%'";
            }
            $statementArtikel = $conn->prepare("SELECT artikel.*,kategori.kategori FROM artikel JOIN kategori ON kategori.id_kategori = artikel.id_kategori $where ORDER BY artikel.tgl_dibuat DESC LIMIT $mulai_dari, $data_per_halaman ");
            $statementArtikel->execute();
            $result = $statementArtikel->fetchAll(PDO::FETCH_ASSOC);

            if(count($result) != 0):
            foreach($result as $row){
                echo "<div class='box-artikel'>
                        <label>$row[judul]</label>
                        <label>$row[tgl_dibuat]</label>
                        <label>$row[penulis]</label>
                        <p>".potongParagraf($row['isi'],500)."</p>
                        ";
                        ?>
                        <span><a href="<?= BASE_URL.'index.php?page=artikel&id_artikel='.$row['id_artikel'].'' ?>" class='button-readmore'>Selengkapnya</a><a href="<?= BASE_URL.'proses/hapus_artikel.php?id_artikel='.$row['id_artikel'].'' ?>" class='button-hapus' onclick="return confirm('Apakah Anda yakin?')">Hapus Artikel</a></span>
                        </div>
            <?php
            }
            else:
                echo "Data tidak ditemukan";
            endif;

            // untuk menampilkan link pagination
            $statementHitungArtikel = $conn->prepare("SELECT artikel.*,kategori.kategori FROM artikel JOIN kategori ON kategori.id_kategori = artikel.id_kategori $where ORDER BY artikel.tgl_dibuat DESC");
            $statementHitungArtikel->execute();
            $resultH = $statementHitungArtikel->fetchAll(PDO::FETCH_ASSOC);
            $url = "index.php?page=data_artikel$search_url";

            pagination($resultH, $data_per_halaman, $pagination, $url);

            ?>
        
    </section>
</div>