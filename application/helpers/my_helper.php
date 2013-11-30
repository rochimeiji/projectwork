<?php
	function alert($msg,$url=""){
		if($url){
			$url = "location='$url'";
		}
		echo "<script>alert('$msg');$url</script>";
	}
?>