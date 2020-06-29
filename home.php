<div class="container">
    <div class="frame-home">
        <div class="kiri">
            <h1>Selamat Datang di <i>seputar</i>Hukum</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et ad dolores, voluptate sunt repellendus rerum ut, laboriosam adipisci nemo corporis culpa dolore veniam ducimus id nobis earum. Aut, neque? Illo delectus nulla doloribus iusto quidem laborum, ullam animi aspernatur odio beatae dicta impedit officia debitis fuga? Reprehenderit, magni. Voluptas, quis error, et maiores dolore ullam consequatur blanditiis delectus quas ut perspiciatis sapiente aspernatur earum itaque fuga culpa aperiam provident cupiditate minima distinctio. Quidem suscipit natus quaerat eligendi? Impedit, repudiandae consequatur tenetur culpa inventore eius quisquam quam numquam eveniet. Vero modi dolorem molestias illum minima, corrupti eaque quo voluptatem. Voluptas, perspiciatis?</p>
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
