<?php
    admin_only($level);

    $notice = isset($_GET['notice']) ? $_GET['notice'] : false;
    $pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
    $cari = isset($_GET['cari']) ? $_GET['cari'] : false;

    // pagination
    $data_per_halaman = 10;
    $mulai_dari = ($pagination - 1) * $data_per_halaman;

    $noticeKomentar = "";
    if($notice == "hapus-sukses"){
        $noticeKomentar = "<div class='notice notice-sukses'><p>Kategori Berhasil Dihapus !</p><span class='notice-close'>x</span></div>";
    }else if($notice == "edit_berhasil"){
        $noticeKomentar = "<div class='notice notice-sukses'><p>Data Berhasil Diedit !</p><span class='notice-close'>x</span></div>";
    }else if($notice == "tambah_berhasil"){
        $noticeKomentar = "<div class='notice notice-sukses'><p>Data Berhasil Ditambahkan !</p><span class='notice-close'>x</span></div>";
    }
?>
<div class="container">
    <?= $noticeKomentar ?>
    <h2 class='h2-header'>Data Kategori</h2>
    <div class="header-data-artikel">    
        <form action="<?= BASE_URL.'index.php?page=data_kategori' ?>" method="GET">
            <div class="element-form">
                <label>Cari</label>
                <input type="hidden" name="page" value='<?= $_GET['page'] ?>'>
                <span><input type="text" name="cari" value="<?= $cari ?>" placeholder="Cari"><input type="submit" value="Cari"></span>
            </div>
        </form>
        <div class="box-tambah">
            <a href="<?= BASE_URL.'index.php?page=form_kategori&button=tambah' ?>">Tambah Kategori</a>
        </div>
    </div>
    <div class="frame-table">
        <table class='table-data'>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Klasifikasi</th>
                <th>Aksi</th>
            </tr>
            <?php
                $search_url = "";
                $where = "";
                if($cari){
                    $search_url = "&cari=$cari";
                    $where = "WHERE kategori LIKE '%$cari%'";
                }
                $statement = $conn->prepare("SELECT*FROM kategori $where LIMIT $mulai_dari,$data_per_halaman");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                $no = 1 + $mulai_dari;
                foreach($result as $row){
                    echo "<tr>
                            <td>$no</td>
                            <td>$row[kategori]</td>
                            <td>$row[klasifikasi]</td>";
                            ?>
                            <td><a href="<?= BASE_URL.'proses/hapus_kategori.php?id_kategori='.$row['id_kategori'].'' ?>" class='button-hapus' onclick="return confirm('Apakah Anda yakin? jika anda menghapus kategori ini, maka artikel yang memiliki kategori ini akan dihapus')">Hapus</a><a href="<?= BASE_URL.'index.php?page=form_kategori&button=edit&id_kategori='.$row['id_kategori'].'' ?>" class='button-readmore'>Edit</a></td>
                            </tr>
                            <?php
                    $no++;
                }
            ?>
        </table>
        <?php
            $statementHitungKategori = $conn->prepare("SELECT*FROM kategori $where");
            $statementHitungKategori->execute();
            $resultH = $statementHitungKategori->fetchAll(PDO::FETCH_ASSOC);
            
            pagination($resultH,$data_per_halaman,$pagination,"index.php?page=data_kategori$search_url");
        ?>
    </div>
</div>