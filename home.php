<div class="container">
    <h1 style="font-weight:normal;">Selamat Datang di <i>seputar</i>Hukum</h1>
    <div id="slider">
        <div class="box">
            <img src="<?= BASE_URL.'assets/images/rak.jpg' ?>">
        </div>
        <button class="prev" onclick="prevSlide()"><</button>
        <button class="next" onclick="nextSlide()">></button>
        <p class="slider-desc">Slide 1</p>
    </div>
    <div class="frame-home">
        <div class="kiri">
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
                                <li>Kategori <a href='".BASE_URL."index.php?page=list_artikel&id_kategori=$row[id_kategori]&kategori=$kategori[kategori]'>$kategori[kategori]</a></i>
                                <li>Penulis $row[penulis]</i>
                            </ul>";
                    }
                }
                
            ?>
        </div>
    </div>
</div>
<script>
    let sliderContent = document.querySelector(".box");
    let sliderCaption = document.querySelector(".slider-desc");

    let images = [];
    let caption = [];

    images[0] = "assets/images/doctor.jpg";
    images[1] = "assets/images/rak.jpg";
    
    caption[0] = "Slide 2";
    caption[1] = "Slide 1";

    let i = images.length;

    function nextSlide(){
        if(i < images.length){
            i++;
        }else{
            i = 1;
        }
        sliderContent.innerHTML = "<img src="+images[i-1]+">";
        sliderCaption.innerHTML = caption[i-1];
    }

    function prevSlide(){
        if(i < images.length+1 && i > 1){
            i--;
        }else{
            i = images.length;
        }
        sliderContent.innerHTML = "<img src="+images[i-1]+">";
        sliderCaption.innerHTML = caption[i-1];
    }

</script>