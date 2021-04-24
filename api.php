<?php
#aradpardaz/tse
#nima Sadeghi

header('Content-Type: application/json; charset=UTF-8');

$url = 'https://tse.ir/en/json/HomePage/enTabData.json?_='.time();
$url = 'https://tse.ir/en/json/MarketWatch/enData_1.json?_='.time(); //Market

$server_output = curlGet($url);
echo $server_output;

function curlGet($url){
	

				$ch = curl_init();
		
			$header=array(
			  'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0',
			  'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
			  'Accept-Language: en-us,en;q=0.5',
			  'Accept-Encoding: gzip,deflate',
			  'Referer: https://tse.i/',
			  'Upgrade-Insecure-Requests: 1',
			  'Connection: keep-alive',
			);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_COOKIEJAR, 'curl_cookies.txt');
		curl_setopt($ch, CURLOPT_COOKIEFILE, 'curl_cookies.txt');
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		
 		$contents = curl_exec($ch);
		
		$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		

		if(curl_exec($ch) === false)
		{
			echo "<center><h2>Curl Error1: ".curl_error($ch)." </h2> in: <br>".$url."</center>";
			exit();		
		}
		
		curl_close ($ch);
		
		if ($http_status != '200'){
		echo "<center><h2>Error: ".$http_status." in: <br>".$url."</h2></center>";
		exit();		
		}
		


 return $contents;
	
}
