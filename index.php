<?php
set_time_limit(0);
$ipAddress = "superpulsa.myddns.me" //gethostbyname($_SERVER['REMOTE_ADDR']); 
$ipAddressrpt = "103.215.72.169/superpulsa2017/rpt";
$port = 92;
if (!isset($_GET['reffID'])){
	if (!isset($_GET['refid'])){
		$url = "http://". $ipAddressrpt;
	}else{
		$nilai1=urlencode($_GET['refid']);
		if (!isset($_GET['message'])){
			$com="refid=". $nilai1;
		}else{
			$nilai2=urlencode($_GET['message']);
			$com="refid=". $nilai1 ."&message=". $nilai2;
		}
		$url = "http://". $ipAddress .":". $port ."/rpt/".$com;
	}
}else{
	if (!isset($_GET['reffID'])){
		$url = "http://". $ipAddressrpt;
	}else{
		$nilai1 = urlencode($_GET['reffID']);
		$url = "http://". $ipAddressrpt ."?refid=". $nilai1;
	}
}

    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
	echo $result;
	curl_close($ch);

?>
