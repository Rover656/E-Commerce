<?php
class Item {
	public function LoadItem($id) {
		require_once("/inc/includes.php");
		global $dbcon;
		$sql = "SELECT * FROM items WHERE id='{$id}'";
		$result = $dbcon->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$item[0] = $row["id"];
				$item[1] = $row["Name"];
				$item[2] = $row["Type"];
				$item[3] = $row["Quantity"];
				$item[4] = $row["Enabled"];
				$item[5] = $row["Featured"];
				$item[6] = $row["Price"];
				$item[7] = $row["Image"];
				$item[8] = $row["Description"];
			}
		} else {
			$item[0] = -1;
			$item[1] = "NULL";
			$item[2] = -1;
			$item[3] = -1;
			$item[4] = -1;
			$item[5] = -1;
			$item[6] = -1;
			$item[7] = "NULL";
			$item[8] = "NULL";
		}
		return $item;
	}
	
	public function GetFeaturedItems() {
		require_once("/inc/includes.php");
		global $dbcon;
		$sql = "SELECT * FROM items WHERE Featured=true";
		$result = $dbcon->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$tempItem[0] = $row["id"];
				$tempItem[1] = $row["Name"];
				$tempItem[2] = $row["Type"];
				$tempItem[3] = $row["Quantity"];
				$tempItem[4] = $row["Enabled"];
				$tempItem[5] = $row["Featured"];
				$tempItem[6] = $row["Price"];
				$tempItem[7] = $row["Image"];
				$tempItem[8] = $row["Description"];
				$items[ ] = $tempItem;
			}
		} else {
			return "ERR";
		}
		return $items;
	}
	
	public function GetAllItems() {
		require_once("/inc/includes.php");
		global $dbcon;
		$sql = "SELECT * FROM items";
		$result = $dbcon->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$tempItem[0] = $row["id"];
				$tempItem[1] = $row["Name"];
				$tempItem[2] = $row["Type"];
				$tempItem[3] = $row["Quantity"];
				$tempItem[4] = $row["Enabled"];
				$tempItem[5] = $row["Featured"];
				$tempItem[6] = $row["Price"];
				$tempItem[7] = $row["Image"];
				$tempItem[8] = $row["Description"];
				$items[ ] = $tempItem;
			}
		} else {
			return "ERR";
		}
		return $items;
	}
}
?>
