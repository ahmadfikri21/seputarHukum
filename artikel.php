<?php
    $id_artikel = isset($_GET['id_artikel']) ? $_GET['id_artikel'] : false;
    $notice = isset($_GET['notice']) ? $_GET['notice'] : false;
    $noticeKomentar = "";

    if($notice == "komentar"){
        $noticeKomentar = "<div class='notice notice-sukses'><p>Komentar anda berhasil dipost</p><span class='notice-close'>x</span></div>";
    }

    if($id_artikel):
        $statementArtikel = $conn->prepare("SELECT*FROM artikel WHERE id_artikel = '$id_artikel'");
        $statementArtikel->execute();
        $result = $statementArtikel->fetch();

        $statementKategori = $conn->prepare("SELECT kategori FROM kategori WHERE id_kategori ='$result[id_kategori]'");
        $statementKategori->execute();
        $kategori = $statementKategori->fetch();
?>

<div class="header-page">
    <div class="container">
        <h2><?= $result['judul'] ?></h2>
        <ul>
            <li><p>Penulis</p>  <?= $result['penulis'] ?></li>
            <li><p>Tanggal Diposting </p> <?= $result['tgl_dibuat'] ?></li>
            <li><p>Kategori </p> <?= $kategori['kategori'] ?></li>
        </ul>
    </div>  
</div>
<div class="container">
    <?= $noticeKomentar ?>
    <div class="frame-home">
        <div class="kiri">
            <p><?= $result['isi'] ?></p>
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
<div class="frame-komentar">
    <div class="container">
        <h2>Komentar</h2>
        <?php
            $stmtKomentar = $conn->prepare("SELECT*FROM komentar WHERE id_artikel='$id_artikel' AND parent_komentar IS NULL ORDER BY tgl_dibuat DESC");
            $stmtKomentar->execute();
            $komentar = $stmtKomentar->fetchAll(PDO::FETCH_ASSOC);

            if(count($komentar) == 0){
                echo "Belum ada komentar";
            }else{
                $i = 1;
                foreach($komentar as $data){
                    $stmtKomentarChild = $conn->prepare("SELECT*FROM komentar WHERE id_artikel='$id_artikel' AND parent_komentar = '$data[id_komentar]' ORDER BY tgl_dibuat ASC");
                    $stmtKomentarChild->execute();
                    $child = $stmtKomentarChild->fetchAll(PDO::FETCH_ASSOC);

                    echo "<div class='komentar'>
                            <label class='nama-komentar'>$data[nama]</label><br>
                            <label class='tgl-komentar'>$data[tgl_dibuat]</label>
                            <p class='isi-komentar'>$data[komentar]</p>
                        ";
                        if(count($child) != 0){
                            echo "<a class='show-reply' onclick='showReply($i)'>".count($child)." Balasan</a>";
                            foreach($child as $row){
                                echo " <div id='toggle$i' class='komentar komentar-balasan' style='display:none;'>
                                            <label class='nama-komentar'>$row[nama]</label><br>
                                            <label class='tgl-komentar'>$row[tgl_dibuat]</label>
                                            <p class='isi-komentar'>$row[komentar]</p>
                                        </div>";
                            }
                            formKomentar($id_artikel,$data['id_komentar'],$i,"none");
                        }else{
                            formKomentar($id_artikel,$data['id_komentar'],$i,"block");
                        }
                        $i++;
                        ?>    
                        </div>
                        <?php
                }
            }
        ?>
        <h2>Tambahkan Komentar</h2>
        <form action="<?= BASE_URL.'proses/proses_komentar.php?id_artikel='.$id_artikel.'' ?>" method="POST">
            <div class='element-form'>
                <label>Nama</label>
                <span><input type="text" name='nama' placeholder='Nama'></span>
            </div>
            <div class='element-form'>
                <label>E-Mail</label>
                <span><input type="text" name='email' placeholder='E-Mail'></span>
            </div>
            <div class='element-form'>
                <label>Komentar</label>
                <span><textarea name='komentar' placeholder='Komentar' rows="3px"></textarea></span>
            </div>
            <div class='element-form'>
                <span><input type="submit" value="Tambah Komentar" name='btn-komentar'></span>
            </div>
        </form>
    </div>
</div>
<?php
    else:
        echo "maaf artikel tidak terdaftar";
    endif;
?>

<script>
    // function showReplyForm(i){
    //     let element = document.querySelector(".form-reply");
        
    //     console.log(element);
    //     if(element.style.display === "none"){
    //         element.style.display = "block";
    //     }else{
    //         element.style.display = "none";
    //     }
        
    // }
   
    function showReply(j){
        let replyClick = document.querySelector(".show-reply");
        let element = document.querySelectorAll("#toggle"+j);

        console.log(element.length);
        for(i=0;i<element.length;i++){
            if(element[i].style.display === "block"){
                element[i].setAttribute("style","display:none;");
                // replyClick.innerHTML = "Tunjukan Balasan";  
            }else{
                element[i].setAttribute("style","display:block;");
                // replyClick.innerHTML = "Sembunyikan Balasan";
            }
        }
    }
</script>