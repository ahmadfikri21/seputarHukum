<?php
    admin_only($level);

    $notice = isset($_GET['notice']) ? $_GET['notice'] : false;
    $pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
    $cari = isset($_GET['cari']) ? $_GET['cari'] : false;

    $data_perhalaman = 10;
    $mulai_dari = ($pagination-1) * $data_perhalaman;

    $noticeKomentar = "";
    if($notice == "hapus-sukses"){
        $noticeKomentar = "<div class='notice notice-sukses'><p>Komentar Berhasil Dihapus !</p><span class='notice-close'>x</span></div>";
    }else if($notice == "nothing-selected"){
        $noticeKomentar = "<div class='notice notice-warning'><p>Tolong pilih minimal 1 data</p><span class='notice-close'>x</span></div>";
    }
?>
<div class="container">
    <?= $noticeKomentar ?>    
    <h2 class='h2-header'>Data Komentar</h2>
    <div class="header-data-artikel">
        <form action="<?= BASE_URL.'index.php?page=data_komentar' ?>" method="get">
            <div class="element-form">
                <label>Cari</label>
                <input type="hidden" name="page" value="<?= $_GET['page'] ?>">
                <span><input type="text" name="cari" value="<?= $cari ?>" placeholder="Cari"><input type="submit" value="Cari"></span>
            </div>
        </form>
    </div>
    <div class="frame-table">
        <table class='table-data'>
            <tr>
                <th>No</th>
                <th>Artikel</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Komentar</th>
                <th>Tanggal Komentar</th>
                <th>Pilih</th>
                <!-- <th>Aksi</th> -->
            </tr>
            <?php
                $search_url = "";
                $where = "";
                if($cari){
                    $search_url = "&cari=$cari";
                    $where = "WHERE artikel.judul LIKE '%$cari%' OR komentar.nama LIKE '%$cari%' OR komentar.tgl_dibuat LIKE '%$cari%'";
                }

                $statement = $conn->prepare("SELECT komentar.*,artikel.judul FROM komentar JOIN artikel ON komentar.id_artikel = artikel.id_artikel $where ORDER BY komentar.tgl_dibuat DESC LIMIT $mulai_dari,$data_perhalaman");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                $no = 1 + $mulai_dari;
                foreach($result as $row){
                    echo "<tr>
                            <td>$no</td>
                            <td>$row[judul]</td>
                            <td>$row[nama]</td>
                            <td>$row[email]</td>
                            <td>$row[komentar]</td>
                            <td>$row[tgl_dibuat]</td> 
                            <td>
                                <form method='post' action='".BASE_URL."proses/hapus_komentar.php'>
                                    <input type='checkbox' name='selected[]' value='$row[id_komentar]'>
                            </td>";
                    $no++;
                }
                
            ?>
        </table>
                <input type="submit" value="Hapus Pilihan" class="hapus-pilihan" onclick="return confirm('Apakah anda yakin?')">
            
        </form> <!-- Penutup form hapus pilihan -->
        <?php
            $statementHitungKomentar = $conn->prepare("SELECT komentar.*,artikel.judul FROM komentar JOIN artikel ON komentar.id_artikel = artikel.id_artikel $where ORDER BY komentar.tgl_dibuat DESC");
            $statementHitungKomentar->execute();
            $resultH = $statementHitungKomentar->fetchAll(PDO::FETCH_ASSOC);

            pagination($resultH, $data_perhalaman, $pagination, "index.php?page=data_komentar$search_url");
        ?>
    </div>
</div>