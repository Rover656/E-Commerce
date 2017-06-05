<?php
class NerdAPIClientFunctionsClass {
  /*
	* NerdAPIClient - Functions Class
	* This Class gives the raw functions to the client script that the server provides.
  */
  //DONT MODIFY:
  public function POST_Login_CheckUsername($username, $apiKey) {
	  $postdata = http_build_query(array('request' => 'Login.CheckUsername', 'request_username' => $username, 'key' => $apiKey));
	  $opts = array('http' =>array('method'  => 'POST','header'  => 'Content-type: application/x-www-form-urlencoded','content' => $postdata));
	  $context  = stream_context_create($opts);
	  $result = file_get_contents('http://api.nerdthings.co.uk/NerdAPI/api.php?method=post', false, $context);
	  return $result;
  }
  public function POST_Login_CheckToken($token, $apiKey) {
	  $postdata = http_build_query(array('request' => 'Login.CheckToken', 'request_token' => $token, 'key' => $apiKey));
	  $opts = array('http' =>array('method'  => 'POST','header'  => 'Content-type: application/x-www-form-urlencoded','content' => $postdata));
	  $context  = stream_context_create($opts);
	  $result = file_get_contents('http://api.nerdthings.co.uk/NerdAPI/api.php?method=post', false, $context);
	  return $result;
  }
  public function POST_Login_Login($username, $password, $apiKey) {
	  $postdata = http_build_query(array('request' => 'Login.Login', 'request_username' => $username, 'request_password' => $password, 'key' => $apiKey));
	  $opts = array('http' =>array('method'  => 'POST','header'  => 'Content-type: application/x-www-form-urlencoded','content' => $postdata));
	  $context  = stream_context_create($opts);
	  $result = file_get_contents('http://api.nerdthings.co.uk/NerdAPI/api.php?method=post', false, $context);
	  return $result;
  }
  public function POST_Login_Logout($token, $apiKey) {
	  $postdata = http_build_query(array('request' => 'Login.Logout', 'request_token' => $token, 'key' => $apiKey));
	  $opts = array('http' =>array('method'  => 'POST','header'  => 'Content-type: application/x-www-form-urlencoded','content' => $postdata));
	  $context  = stream_context_create($opts);
	  $result = file_get_contents('http://api.nerdthings.co.uk/NerdAPI/api.php?method=post', false, $context);
	  return $result;
  }
}
?>
