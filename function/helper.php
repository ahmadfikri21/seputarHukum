<?php
     define("BASE_URL","http://localhost/seputarhukum/");

     function potongParagraf($string,$limitParagraf){
          // menghilangkan tag yang ada di string
          $string = strip_tags($string,"<p>");
          // mengecek apakah karakter string lebih panjang dari limit
          if(strlen($string) > $limitParagraf){
               //memotong string sesuai dengan jumlah limit
               $stringCut = substr($string , 0, $limitParagraf);
               //mengambil posisi batas akhir dari potongan string
               $batasAkhir = strrpos($stringCut, " ");

               $string = $batasAkhir ? substr($stringCut, 0, $batasAkhir): substr($stringCut, 0);
               return $string."...";
          }else{
               return $string." ";
          }
     }

     function admin_only($level){
          if(!$level){
               header("location:".BASE_URL);
           }
     }

     function pagination($resultH, $data_per_halaman, $pagination, $url){
          $totalData = count($resultH);
          $total_halaman = ceil($totalData/$data_per_halaman);

          $batasPosisiNomor = 6;
          $batasJumlahHalaman = 10;
          $mulaiPagination = 1;
          $batasAkhirPagination = $total_halaman;

          if($pagination>1){
               $prev = $pagination-1;
               echo "<a href='".BASE_URL."$url&pagination=$prev' class='pagination-links'><< Prev</a>";
          }

          if($total_halaman >= $batasJumlahHalaman){
               if($pagination > $batasPosisiNomor){
                    $mulaiPagination = $pagination - ($batasPosisiNomor-1);
               }
     
               $batasAkhirPagination = ($mulaiPagination - 1) + $batasJumlahHalaman;
               if($batasAkhirPagination > $total_halaman){
                    $batasAkhirPagination = $total_halaman;
               }
          }

          for($i=$mulaiPagination;$i<=$batasAkhirPagination;$i++){
               if($pagination == $i){
                    echo "<a href='".BASE_URL."$url&pagination=$i' class='pagination-links active-pagination'>$i</a>";
               }else{
                    echo "<a href='".BASE_URL."$url&pagination=$i' class='pagination-links'>$i</a>";
               }
          }

          if($pagination < $total_halaman){
               $next = $pagination+1;
               echo "<a href='".BASE_URL."$url&pagination=$next' class='pagination-links'>Next >></a>";
          }
     }

     function formKomentar($id_artikel,$id_komentar,$i,$display){
          ?>
          <form action="<?= BASE_URL.'proses/proses_komentar.php?id_artikel='.$id_artikel.'' ?>" method="POST" class="form-reply" id='toggle<?= $i ?>' style="<?= "display:$display;" ?>">
               <input type="hidden" name="parent_komentar" value="<?= $id_komentar ?>">
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
                         <span><textarea name='komentar' placeholder='Komentar' rows="4px"></textarea></span>
                    </div>
                    <div class='element-form'>
                         <span><input type="submit" value="Balas" name='btn-komentar'></span>
                    </div>
          </form>
          <?php
     }
?>