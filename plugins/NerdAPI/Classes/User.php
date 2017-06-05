<?php
class User {
	public function DoLogin($username, $password) {
		//Need to send encrypted data to this script!
		require_once('client.php');
		require_once('config.php');
		require('inc/include.php');
		global $apiKey;
		global $apiPassword;
		$api = new NerdAPIClientFunctionsClass();
		$login = json_decode($api->POST_Login_Login($username, $password, $apiKey));
		$password = $REnc->REnc_Decrypt_V3_Short($password, $shopEncryptionKey);
		//$password = $REnc->REnc_Encrypt_V3_Short($password, $apiPassword);
		if ($login['Valid'] == true) {
			$data[0] = true;
			$data[1] = $login['Token'];
			$data[2] = $login['Username'];
			return $data;
		} else {
			$data[0] = false;
			$data[1] = "";
			$data[2] = "";
			return $data;
		}
	}
	public function DoLogout($token) {
		require_once('client.php');
		require_once('config.php');
		require('/inc/include.php');
		global $apiKey;
		global $apiPassword;
		$api = new NerdAPIClientFunctionsClass();
		$logout = json_decode($api->POST_Login_Logout($token, $apiKey));
		if ($logout['Success'] == true) {
		    return 1;
		} else {
		    return 0;
		}
	}
	public function Register($username, $password, $email) {
		//Need to send encrypted data to this script!
		////NOT IMPLEMENTED BY API YET!
		return 0;
	}
	public function CheckToken($token, $username) {
		//Need to send encrypted data to this script!
		require_once('client.php');
		require_once('config.php');
		require('/inc/include.php');
		global $apiKey;
		global $apiPassword;
		$api = new NerdAPIClientFunctionsClass();
		$check = json_decode($api->POST_Login_CheckToken($token, $apiKey));
		if ($check['Valid'] == true) {
			return true;
		} else {
			return false;
		}
	}
	///////TODO: Make user data a thing
	public function GetData($data) {
		return "Not Implemented!";
	}
	public function BuyProduct($productId, $Quantity) {
		return "Not Implemented!";
	}
}
?>
