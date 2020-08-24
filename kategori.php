<?php
    $pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
    
    // pagination
    $data_per_halaman = 10;
    $mulai_dari = ($pagination - 1) * $data_per_halaman;
?>
<div class="header-page">
    <div class="container">
        <h2>Kategori</h2>
    </div>
</div>
<section id="section-kategori">
    <div class="container">
        <span class="box-kategori"><a id="btn-dropdown-kategori">Kumpulan rangkuman Buku</a></span><br>
        <div class="dropdown-kategori">
            <?php
                $statementKategori = $conn->prepare("SELECT*FROM kategori WHERE id_kategori != 5 AND id_kategori != 6 LIMIT $mulai_dari,$data_per_halaman");
                $statementKategori->execute();
                $result = $statementKategori->fetchAll(PDO::FETCH_ASSOC);

                if(count($result) == 0){
                    echo "Belum ada Kategori yang dibuat";
                }else{
                    foreach($result as $row){
                        echo "<span class='box-kategori'><a href='".BASE_URL."list_artikel/".$row['id_kategori']."/".$row['kategori']."'>$row[kategori]</a></span><br>";
                    }
                }
        
            ?>
        </div>
        <span class="box-kategori"><a href="<?= BASE_URL.'list_artikel/5/Kumpulan Rangkuman Catatan Kuliah S1' ?>">Kumpulan rangkuman catatan kuliah s1</a></span><br>
        <span class="box-kategori"><a href="<?= BASE_URL.'list_artikel/5/Kumpulan Rangkuman Catatan Kuliah Pascasarjana' ?>">Kumpulan rangkuman catatan kuliah Pascasarjana</a></span><br>
    </div>
</section>
<div class="container">
    <?php
        $statementHitungKategori = $conn->prepare("SELECT*FROM kategori");
        $statementHitungKategori->execute();
        $resultH = $statementHitungKategori->fetchAll(PDO::FETCH_ASSOC);
            
        pagination($resultH,$data_per_halaman,$pagination,"index.php?page=kategori");
    ?>
</div>
<script>
    $(document).ready(function(){
        $("#btn-dropdown-kategori").on("click",function(){
            $(".dropdown-kategori").toggle();
        });
    });
</script>