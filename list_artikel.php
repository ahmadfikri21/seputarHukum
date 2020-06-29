<?php
    $id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;

    $statementArtikel = $conn->prepare("SELECT artikel.*,kategori.kategori FROM artikel JOIN kategori ON kategori.id_kategori = artikel.id_kategori WHERE artikel.id_kategori = '$id_kategori'");
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
                        <p>".potongParagraf($row['isi'],500)."...<a href='".BASE_URL."index.php?page=artikel&id_artikel=$row[id_artikel]' class='link-readmore'>Baca Selengkapnya</a></p>
                        <span></span>
                        </div>";
            }
        else:
            echo "Kategori masih kosong";
        endif;
        ?>
    </div>
    
</section>