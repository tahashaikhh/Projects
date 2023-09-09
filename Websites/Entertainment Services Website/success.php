<?php
include "credentials.php";
$orderId = $_GET["orderid"];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $api_url."/".$orderId,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'x-client-id: '.$client_id,
    'x-client-secret: '.$secret_key,
    'x-api-version: 2021-05-21'
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if(!$err) {
	$result = json_decode($response, true);
	if($result["order_status"] == 'PAID'){
		echo "This order is paid!";
	} else {
		echo "Order has not been paid!";
	}
} else {
	echo  $err;
}

?>