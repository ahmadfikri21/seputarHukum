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
    <?php
        $statementKategori = $conn->prepare("SELECT*FROM kategori LIMIT $mulai_dari,$data_per_halaman");
        $statementKategori->execute();
        $result = $statementKategori->fetchAll(PDO::FETCH_ASSOC);

        if(count($result) == 0){
            echo "Belum ada Kategori yang dibuat";
        }else{
            echo "<div class='container'>";
            foreach($result as $row){
                echo "<span class='box-kategori'><a href='".BASE_URL."index.php?page=list_artikel&id_kategori=".$row['id_kategori']."&kategori=".$row['kategori']."'>$row[kategori]</a></span><br>";
            }
            echo "</div>";
        }
        
    ?>
</section>
<div class="container">
    <?php
        $statementHitungKategori = $conn->prepare("SELECT*FROM kategori");
        $statementHitungKategori->execute();
        $resultH = $statementHitungKategori->fetchAll(PDO::FETCH_ASSOC);
            
        pagination($resultH,$data_per_halaman,$pagination,"index.php?page=kategori");
    ?>
</div>