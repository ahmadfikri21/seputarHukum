<?php
    $id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;
    $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : false;
    $pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
    $page = isset($_GET['page']) ? $_GET['page'] : false; 
    $cari = isset($_GET['cari']) ? $_GET['cari'] : false;

    // pagination
    $data_per_halaman = 10;
    $mulai_dari = ($pagination - 1) * $data_per_halaman;
?>
<div class="header-page">
    <div class="container">
        <h2>Kategori <?= $kategori ?></h2>
    </div>
</div>
<section class='frame-list-artikel'>
    <div class="container">
    <form action="<?= BASE_URL.'index.php?page=list_artikel&id_kategori='.$id_kategori.'' ?>" method="get">
            <div class="element-form">
                <label>Cari</label>
                <input type="hidden" name="page" value="<?= $_GET['page'] ?>">
                <input type="hidden" name="id_kategori" value="<?= $_GET['id_kategori'] ?>">
                <input type="hidden" name="kategori" value="<?= $_GET['kategori'] ?>">
                <span><input type="text" name="cari" value="<?= $cari ?>" placeholder="Cari"><input type="submit" value="Cari"></span>
            </div>
        </form>
        <?php
            $where = "WHERE artikel.id_kategori='$id_kategori'";
            $search_url = "&id_kategori=$id_kategori&kategori=$kategori";

            if($cari){
                $search_url = "&id_kategori=$id_kategori&kategori=$kategori&cari=$cari";
                $where = "WHERE artikel.id_kategori='$id_kategori' AND artikel.judul LIKE '%$cari%' OR artikel.penulis LIKE '%$cari%' OR artikel.tgl_dibuat LIKE '%$cari%'";
            }

            $statementArtikel = $conn->prepare("SELECT artikel.*,kategori.kategori,kategori.id_kategori FROM artikel JOIN kategori ON kategori.id_kategori = artikel.id_kategori $where ORDER BY artikel.tgl_dibuat DESC LIMIT $mulai_dari,$data_per_halaman");
            $statementArtikel->execute();
            $result = $statementArtikel->fetchAll(PDO::FETCH_ASSOC);

            if(count($result) != 0):
                foreach($result as $row){
                    echo "<div class='box-artikel'>
                            <label>$row[judul]</label>
                            <label>Diupload pada : $row[tgl_dibuat]</label>
                            <p>$row[deskripsi]</p>
                            <a href='".BASE_URL."artikel/$row[id_artikel]/$row[judul]' class='link-readmore'><strong>Baca Selengkapnya</strong></a></p>
                            <span></span>
                            </div>";
                }
            else:
            ?>
                <div class="container">
                    <div class='not-found'>
                        <h1>Maaf, Kategori masih Kosong !</h1>
                        <a href="<?= BASE_URL.'kategori'?>" class='button-kembali'>Kembali ke halaman sebelumnya</a>
                    </div>
                </div>
            <?php 
                endif;
                
                $statementHitungArtikel = $conn->prepare("SELECT artikel.*,kategori.kategori FROM artikel JOIN kategori ON kategori.id_kategori = artikel.id_kategori $where ORDER BY artikel.tgl_dibuat DESC");
                $statementHitungArtikel->execute();
                $resultH = $statementHitungArtikel->fetchAll(PDO::FETCH_ASSOC);
                $url = "index.php?page=list_artikel$search_url";

                pagination($resultH, $data_per_halaman, $pagination, $url);
            ?>
        </div>
    
</section>