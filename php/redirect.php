<?php


error_reporting(-1);
ini_set('display_errors', 'On');

require_once('configuration.php');

if(!isset($_SESSION['user'])){
	$auth_token = $_GET['code'];
	$payload = getInstaPayload($auth_token);
	$response  = exchangeAuthToken($payload);
	if(isset($response->body->code) && $response->body->code == 400){
		header('Location: client.php');	
	}else{
		$user = buildInstaUser($response);
		$_SESSION['user'] = $user;	
	}
}else{
	header('Location: client.php');
}

$access_token = $_SESSION['user']['access_token'];
$url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $access_token;
$response = \Httpful\Request::get($url)
						->expectsJson()
						->send();

$url = $response->body->data[0]->images->low_resolution->url;

echo "<img src='";
echo $url;
echo "' />";


// $data = $response->body->data;

// for ($i=0; $i<count($data); $i++) {
// 	echo "<img src='";
// 	echo $data[$i]->images->low_resolution->url;
// 	echo "' />";
// }




?>