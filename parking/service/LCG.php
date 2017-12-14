<?php
    // Linear Concruential Generator.

    $banyakLahan = 8;
    $a = 2;
    $z0 = 2; // acak.
    $c = 7; // increment.
    $mod = 10;

    for($i = 0; $i < $banyakLahan; $i++){
        $z = (($a * $z0) + $c) % $mod;
        echo $z . "<br>";
        $z0 = $z;
    }
?>
