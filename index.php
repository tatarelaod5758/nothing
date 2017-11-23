<?php
set_time_limit(0);

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ipAddress = get_client_ip(); //"superpulsa.myddns.me" gethostbyname($_SERVER['REMOTE_ADDR']); 
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
		//$url = "http://". $ipAddress .":". $port ."/rpt/".$com;
		echo "http://". $ipAddress .":92/rpt/?".$com;
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
