<?php
     define("BASE_URL","http://localhost/seputarhukum/");

     function potongParagraf($string,$limitParagraf){
          // menghilangkan tag yang ada di string
          $string = strip_tags($string);
          // mengecek apakah karakter string lebih panjang dari limit
          if(strlen($string) > $limitParagraf){
               //memotong string sesuai dengan jumlah limit
               $stringCut = substr($string , 0, $limitParagraf);
               //mengambil posisi batas akhir dari potongan string
               $batasAkhir = strrpos($stringCut, " ");

               $string = $batasAkhir ? substr($stringCut, 0, $batasAkhir): substr($stringCut, 0);
               return $string;
          }
     }
?>