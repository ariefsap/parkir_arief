<?php
	error_reporting(0);
	$pick=$_POST['slot'];

	$obj = new stdClass();

	$arr = array(0,1,2,3,4,5,6,7,8,9);
	
	function MyShuffle(&$arr) {
         for($i = 0; $i < sizeof($arr); ++$i) {
             $r = rand(0, $i);
             $tmp = $arr[$i];
             $arr[$i] = $arr[$r];
             $arr[$r] = $tmp;  
         }
};
echo"<h2>Hello Fisher-Yates Shuffle Algorithm</h2>";

echo"<pre>";
print_r($arr);
echo"</pre>";
MyShuffle($arr);
echo"<pre>";
print_r($arr);
echo"</pre>";
      
	// ================= MULAI DISINI =================.

	if (sizeof($arr)>0){
	

		$tmpObj = new stdClass();
		$tmpObj->list =$arr;
;

		$obj->status = true;
		$obj->pesan = "sisa slot parkir";
		$obj->data = $tmpObj;
	}else{
		$obj->status = false;
		$obj->pesan = "eror";
		$obj->data = new stdClass();
	}

	echo json_encode($obj);
	
?>
