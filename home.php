<?php
    $notice = isset($_GET['notice']) ? $_GET['notice'] : false;

    $noticeKomentar = "";
    if($notice == "Edit_berhasil"){
        $noticeKomentar = "<div class='notice notice-sukses'><p>Informasi berhasil Diedit!</p><span class='notice-close'>x</span></div>";
    }
?>
<div class="container">
    <?= $noticeKomentar ?> 
    <h1 style="font-weight:normal;">Selamat Datang di <i>seputar</i>Hukum</h1>
    <div id="slider">
        <div class="box">
            <img src="<?= BASE_URL.'assets/images/rak.jpg' ?>">
        </div>
        <button class="prev" onclick="prevSlide()"><</button>
        <button class="next" onclick="nextSlide()">></button>
        <p class="slider-desc">Slide 1</p>
    </div>
    <?php
        $statementInformasi = $conn->prepare("SELECT * FROM informasi");
        $statementInformasi->execute();
        $result = $statementInformasi->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="frame-home">
        <div class="kiri">
            <p><?= $result['isi'] ?></p>
            <?php if($level): ?>
                <br>
                <a href="<?= BASE_URL.'index.php?page=form_informasi&id_informasi='.$result['id_informasi'].'' ?>" class="button-edit">Edit Informasi</a>
            <?php endif; ?>
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
                                <li><a href='".BASE_URL."artikel/$row[id_artikel]/$row[judul]' class='list-judul'>$row[judul]</a></i>
                                <li>Diposting pada : $row[tgl_dibuat]</li>
                                <li>Kategori <a href='".BASE_URL."list_artikel/$row[id_kategori]/$kategori[kategori]'>$kategori[kategori]</a></i>
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