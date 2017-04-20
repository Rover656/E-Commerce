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
		}
		return $item;
	}
	public function GetFeaturedItems() { //THIS DOESN'T WORK YET!
		require_once("/inc/includes.php");//THIS DOESN'T WORK YET!
		global $dbcon;//THIS DOESN'T WORK YET!
		$sql = "SELECT id, Name, Type, Quantity FROM items WHERE id='{$id}' AND Featured=true";//THIS DOESN'T WORK YET!
		$result = $dbcon->query($sql);//THIS DOESN'T WORK YET!
		if ($result->num_rows > 0) {//THIS DOESN'T WORK YET!
			while($row = $result->fetch_assoc()) {//THIS DOESN'T WORK YET!
				//THIS DOESN'T WORK YET!
				$item[0] = $row["id"];//THIS DOESN'T WORK YET!
				$item[1] = $row["Name"];//THIS DOESN'T WORK YET!
				$item[2] = $row["Type"];//THIS DOESN'T WORK YET!
				$item[3] = $row["Quantity"];//THIS DOESN'T WORK YET!
				$item[4] = $row["Enabled"];//THIS DOESN'T WORK YET!
				$item[5] = $row["Featured"];//THIS DOESN'T WORK YET!
				$item[6] = $row["Price"];//THIS DOESN'T WORK YET!
				$item[7] = $row["Image"];//THIS DOESN'T WORK YET!
			}//THIS DOESN'T WORK YET!
		} else {//THIS DOESN'T WORK YET!
			//THIS DOESN'T WORK YET!
			$item[0] = -1;//THIS DOESN'T WORK YET!
			$item[1] = "NULL";//THIS DOESN'T WORK YET!
			$item[2] = -1;//THIS DOESN'T WORK YET!
			$item[3] = -1;//THIS DOESN'T WORK YET!
			$item[4] = -1;//THIS DOESN'T WORK YET!
			$item[5] = -1;//THIS DOESN'T WORK YET!
			$item[6] = -1;//THIS DOESN'T WORK YET!
			$item[7] = "NULL";//THIS DOESN'T WORK YET!
		}//THIS DOESN'T WORK YET!
		return $item;//THIS DOESN'T WORK YET!
	}//THIS DOESN'T WORK YET!
}
?>
