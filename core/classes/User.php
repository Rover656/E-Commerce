<?php
class User {
	public function DoLogin($username, $password) {
		require_once("/inc/includes.php");
		global $dbcon;
		$userToken = GenerateToken();
		//TODO: Do login script
	}
	public function DoLogout($token) {
		require_once("/inc/includes.php");
		global $dbcon;
		//TODO: Do logout script
	}
	public function CheckToken($token) {
		require_once("inc/includes.php");
		global $dbcon;
		$sql = "SELECT Token FROM logintokens WHERE Token='{$token}'";
		$result = $dbcon->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				//TODO: Make it so that there is a token expiry time
				$time = date('siHdmY');
				if ($row["Expiry"] < $time) {
					return true;
				} else {
					return false;
				}
			}
		} else {
			return false;
		}
	}
	public function GenerateToken() {
		require_once("/inc/includes.php");
		global $dbcon;
		$token = md5(microtime());
		$sql = "SELECT Token FROM logintokens WHERE Token='{$token}'";
		$result = $dbcon->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				return GenerateToken();
			}
		} else {
			return $token;
		}
	}
	///////TODO: Make user data a thing
	public function GetData() {
		return "Not Implemented!";
	}
	public function BuyProduct() {
		return "Not Implemented!";
	}
}
?>
