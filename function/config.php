<?php
    include_once("koneksi.php");
    include_once("helper.php");

    // meta descriptions
    $meta['home']['description'] = "Website ini adalah website yang membahas tentang hukum-hukum yang ada di Indonesia. Website ini cocok untuk pelajar yang ingin mendalami tentang hukum";

    $meta['kategori']['description'] = "List kategori dari setiap hukum yang ada di website ini";

    $meta['about_us']['description'] = "Sejarah dari seputar hukum dan team kami";

    // meta description Kategori
    $stmtMetaKategori = $conn->prepare("SELECT kategori,deskripsi FROM kategori");
    $stmtMetaKategori->execute();
    $resultMetaKategori = $stmtMetaKategori->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultMetaKategori as $metaDescKategori){
        $meta[$metaDescKategori["kategori"]]["description"] = $metaDescKategori["deskripsi"];
    }
    
    // meta description artikel
    $stmtMetaArtikel = $conn->prepare("SELECT deskripsi,judul FROM artikel");
    $stmtMetaArtikel->execute();
    $resultMetaArtikel = $stmtMetaArtikel->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultMetaArtikel as $metaDescArtikel){
        $meta[$metaDescArtikel["judul"]]["description"] = $metaDescArtikel["deskripsi"];
    }

?>