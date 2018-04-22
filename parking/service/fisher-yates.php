<?php

function MyShuffle(&$arr) {
         for($i = 0; $i < sizeof($arr); ++$i) {
             $r = rand(0, $i);
             $tmp = $arr[$i];
             $arr[$i] = $arr[$r];
             $arr[$r] = $tmp;  
         }
};
echo"<h2>Hello Fisher-Yates Shuffle Algorithm</h2>";
$arr = array(1,2,3,4,5,6,7,8,9,10);
echo"<pre>";
print_r($arr);
echo"</pre>";
MyShuffle($arr);
echo"<pre>";
print_r($arr);
echo"</pre>";
      
?>