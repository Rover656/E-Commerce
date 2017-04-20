<?php
//TODO: Clean up and revise/add more (When DB Support Enabled)
class Shop {

	public function listItems($itemArray, $currency, $currency_format) {
		foreach ($itemArray as $itemId => $item) {
			echo '<p><a href="shop.php?item='.$itemId.'">'.$item["name"].
			' costs: '.$this->displayCurrency($currency).
			$this->currencyFormat($currency_format, $item["price"]).'<a></p>';
		}
		//NEED TO TEST THEN ENABLE:
		/*require_once("inc/includes.php");
		global $dbcon;
		$sql = "SELECT * FROM items";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				data[ ] = $row; //NEED TO CHECK LATER
			}
			return data;
		} else {
			return "";
		}*/
	}

	public function displayItemDetails($itemId, $items, $currency, $currency_format) {
		$item = $items[$itemId];
		$details = '';
		$details .= '<h1>'.$item["name"].'</h1>'."\n";
		$details .= '<img src="'.$item["thumb"].'" alt="'.$item["name"].'"/>'."\n";
		$details .= '<p id="item-description">'.$item["description"].'</p>'."\n";
		$details .= '<p id="item-price">'.$this->displayCurrency($currency).
			$this->currencyFormat($currency_format, $item["price"]).'</p>'."\n";
		return $details;
	}

	public function homeItemDisplay($itemId, $items, $currency, $currency_format) {
		$item = $items[$itemId];
		$details = '';
		$details .= '<h2>'.$item["name"].'</h2>'."\n";
		$details .= '<img src="'.$item["thumb"].'" alt="'.$item["name"].'"/>'."\n";
		$details .= '<p id="item-description">'.$item["description"].'</p>'."\n";
		$details .= '<p id="item-price">'.$this->displayCurrency($currency).
			$this->currencyFormat($currency_format, $item["price"]).'</p>'."\n";
		return $details;
	}

	public function itemName($itemId, $items) {
		$item = $items[$itemId];
		return $item["name"];
	}

	public function itemPrice($itemId, $items, $currency_format) {
		$item = $items[$itemId];
		return $this->currencyFormat($currency_format, $item["price"]);
	}

	public function itemPrice_num($itemId, $items) {
		$item = $items[$itemId];
		return $item["price"];
	}

	public function numberOfItems($items) {
		$numItems = count($items);
		return $numItems;
	}

	public function addItemToBasket($itemId, $quantity, $basketSession, $items) {
		if (!isset($basketSession)) {
			$basket = array();
		} else {
			$basket = $basketSession;
		}
		$total = $this->itemPrice($itemId, $items, $currency_format) * $quantity;
		$basket[$itemId] = array("item-id" => $itemId,
								"quantity" => $quantity,
								"price" => $total);
		$_SESSION['basketSession'] = $basket;
	}

	public function displayCurrency($currency) {
		//I am creating a custom currencyConfig for this
		require_once("/inc/includes.php");
		$Currency = new Currency;
		return $Currency->displayCurrency($currency);
	}

	public function currencyFormat($currency_format, $number) {
		switch ($currency_format) {
			case 'english':
				$formattedCurrency = number_format($number, 2, '.', ',');
				return $formattedCurrency;
				break;
			case 'european':
				$formattedCurrency = number_format($number, 2, ',', '.');
				return $formattedCurrency;
				break;
			case 'eng_without_thous':
				$formattedCurrency = number_format($number, 2, '.', '');
				return $formattedCurrency;
				break;
			default:
				$formattedCurrency = number_format($number, 2, '.', ',');
				return $formattedCurrency;
				break; 
		}
	}

	public function randItems($items, $currency, $currency_format) {
		$numItems = $this->numberOfItems($items);
		$output = "";
		$itemArray = array();
		if ($numItems == 0) {
			$output = "No items are available at the moment. Please try again soon.";
			return $output;
		} else if ($numItems <= 2) {
			for($i = 1; $i <=2; $i++) {
				$output .= '<div class="featured" onclick="location.href=\'index.php?src=shop&item='.$i.'\'">'.
				$this->homeItemDisplay($i, $items, $currency, $currency_format)
				.'<div>';
			}
			return $output;
		} else {
			for($i = 1; $i <=3; $i++) {
				$randNum = rand(1, $numItems);
				if (in_array($randNum, $itemArray)) {
					$i--;
				} else {
					$output .= '<div class="featured" onclick="location.href=\'index.php?src=shop&item='.$randNum.'\'">'.
					$this->homeItemDisplay($randNum, $items, $currency, $currency_format)
					.'</div>';
					array_push($itemArray, $randNum);
				}
			}
			return $output;
		}
	}
/*
	public function itemsOnOffer($items,) {
		// To do
	}
*/
}
?>
