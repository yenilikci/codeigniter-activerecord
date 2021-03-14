<?php
     function topla($sayi1,$say2)
     {
         return $sayi1+$say2;
     }

     //2021-02-05 => 5 Şubat 2021
     function getFullDate($date)
     {
         $aylar = array("Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık");

        $tmp_date = explode("-",$date);
        $newDate = $tmp_date[2] . " " .$aylar[$tmp_date[1] - 1] . " " . $tmp_date[0];
        echo $newDate;
     }