<?php
    $id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;
    $pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
    
    // pagination
    $data_per_halaman = 10;
    $mulai_dari = ($pagination - 1) * $data_per_halaman;

    $statementArtikel = $conn->prepare("SELECT artikel.*,kategori.kategori FROM artikel JOIN kategori ON kategori.id_kategori = artikel.id_kategori WHERE artikel.id_kategori = '$id_kategori' LIMIT $mulai_dari,$data_per_halaman");
    $statementArtikel->execute();
    $result = $statementArtikel->fetchAll(PDO::FETCH_ASSOC);

    if(count($result) != 0):
?>
<div class="header-page">
    <div class="container">
        <h2>Kategori <?= $result[0]['kategori'] ?></h2>
    </div>
</div>
<section class='frame-list-artikel'>
    <div class="container">
        <?php
            foreach($result as $row){
                echo "<div class='box-artikel'>
                        <label>$row[judul]</label>
                        <label>$row[tgl_dibuat]</label>
                        <label>$row[penulis]</label>
                        <p>".potongParagraf($row['isi'],500)."<a href='".BASE_URL."index.php?page=artikel&id_artikel=$row[id_artikel]' class='link-readmore'><strong>Baca Selengkapnya</strong></a></p>
                        <span></span>
                        </div>";
            }
            $statementHitungArtikel = $conn->prepare("SELECT artikel.*,kategori.kategori FROM artikel JOIN kategori ON kategori.id_kategori = artikel.id_kategori ORDER BY artikel.tgl_dibuat DESC");
            $statementHitungArtikel->execute();
            $resultH = $statementHitungArtikel->fetchAll(PDO::FETCH_ASSOC);
            $url = "index.php?page=list_artikel";

            pagination($resultH, $data_per_halaman, $pagination, $url);
        else:
            echo "Kategori masih kosong";
        endif;
        ?>
    </div>
    
</section>