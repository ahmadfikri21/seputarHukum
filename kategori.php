<div class="header-page">
    <div class="container">
        <h2>Kategori</h2>
    </div>
</div>
<section id="section-kategori">
    <?php
        $statementKategori = $conn->prepare("SELECT*FROM kategori");
        $statementKategori->execute();
        $result = $statementKategori->fetchAll(PDO::FETCH_ASSOC);

        if(count($result) == 0){
            echo "Belum ada Kategori yang dibuat";
        }else{
            echo "<div class='container'>";
            foreach($result as $row){
                echo "<span class='box-kategori'><a href='".BASE_URL."index.php?page=list_artikel&id_kategori=".$row['id_kategori']."'>$row[kategori]</a></span><br>";
            }
            echo "</div>";
        }
        
    ?>
</section>