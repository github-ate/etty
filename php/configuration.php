<?php
// /http://phphttpclient.com/#install
require 'vendor/autoload.php';
use Httpful\Request;
use Httpful\Mime;

class Configuration{
	static $CLIENT_ID = '8173071a584140bd985530b8d05280ab';
	static $SECRET = '0b3ad6f1249040c2b6a94e67ad1b48de';
	static $REDIRECT_URI = 'http://localhost:8888/PHPlessen/instagram/php/redirect.php';
	static $INSTA_AUTH_URL = "https://api.instagram.com/oauth/authorize/?client_id=self::CLIENT_ID&redirect_uri=self::REDIRECT_URI&response_type=code";
	static $ACCESS_TOKEN_EXCHANGE_URL =  'https://api.instagram.com/oauth/access_token';
	static function getAuthUrl()
	  {
	    return "https://api.instagram.com/oauth/authorize/?client_id=" . self::$CLIENT_ID . "&redirect_uri=" . self::$REDIRECT_URI . "&response_type=code";
	  }

}
	

/*
return user as array
*/
function buildInstaUser($response){
	return array(
			'access_token' => $response->body->access_token,
			'user' => array(
							  'username' => $response->body->user->username,
							  'fullName' => $response->body->user->full_name,
							  'id' => $response->body->user->id,
							  'bio' => $response->body->user->bio,
							  'profile_picture' => $response->body->user->profile_picture
						   )
		);
}

function exchangeAuthToken($payload){
return \Httpful\Request::post(Configuration::$ACCESS_TOKEN_EXCHANGE_URL, $payload)
						->sendsType(Mime::FORM)
						->expectsJson()
						->send();
}


/*
return payload voor aanvragen access token
*/
function getInstaPayload($auth_token){
	return array(
		'client_id' => Configuration::$CLIENT_ID,
		'client_secret' => Configuration::$SECRET,
		'grant_type' => 'authorization_code',
		'redirect_uri' => Configuration::$REDIRECT_URI,
		'code' => $auth_token
	);
}




?>