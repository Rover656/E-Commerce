<?php
class User {
	public function DoLogin($username, $password) {
		require_once("/inc/includes.php");
		global $dbcon;
		$userToken = GenerateToken();
		//Check the login
		$sql = "SELECT * from users WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
		$result = $mysqli->query($dbcon);
		if (!$result->num_rows == 1) {
			$data[0] = false;
			$data[1] = 0;
			return $data;
		} else {
			//Register the token
			$time = date('siHdmY') + 100000000000; //Times out after 10 mins!
			$result = SaveToken($username, $userToken, $time);
			if ($result = 1) {
				$data[0] = true;
				$data[1] = $userToken;
				$data[2] = $username;
				return $data;
			} else {
				$data[0] = false;
				$data[1] = 0;
				return $data;
			}
		}
	}
	public function DoLogout($token) {
		require_once("/inc/includes.php");
		global $dbcon;
		$sql = "DELETE FROM `logintokens` WHERE `Token`='{$token}'";
		if ($conn->query($sql) === TRUE) {
		    return 1;
		} else {
		    return 0;
		}
	}
	public function CheckToken($token, $username) {
		require_once("inc/includes.php");
		global $dbcon;
		$sql = "SELECT Token FROM logintokens WHERE Token='{$token}' AND Username='{$username}'";
		$result = $dbcon->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$time = date('siHdmY');
				if ($row["Expiry"] < $time) {
					//UPDATE THE EXPIRY!
					$time = date('siHdmY') + 100000000000; //Times out after 10 mins!
					$result = UpdateToken($username, $userToken, $time); //NEED UPDATE TOKEN NOT SAVE!
					if ($result = 1) {
						return true;
					} else {
						return false;
					}
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
	public function SaveToken($user, $token, $expiry) {
		require_once("/inc/includes.php");
		global $dbcon;
		$sql = "INSERT  INTO `logintokens` (`id`, `Username`, `Token`, `Expiry`) 
				VALUES (NULL, '{$user}', '{$token}', '{$expiry}')";

		if ($mysqli->query($sql)) {
			return 1;
		} else {
			return 0;
		}
	}
	public function UpdateToken($user, $token, $expiry) {
		require_once("/inc/includes.php");
		global $dbcon;
		$sql = "UPDATE `logintokens` SET `Expiry`='{$expiry}' WHERE `Username'='{$username}' AND `Token`='{$token}'";
		if ($dbcon->query($sql) === TRUE) {
		    return 1;
		} else {
		    return 0;
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
