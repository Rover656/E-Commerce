<?php
//TODO: Clean up and revise/add more (When DB Support Enabled)
class Shop {

	public function listItemsText($currency, $currency_format) {
		require_once("/inc/includes.php");
		$Item = new Item;
		$items = $Item->GetAllItems();
		foreach ($items as $itemId => $item) {
			//echo '<p><a href="shop.php?item='.$item[0].'">'.$item["1"]. BY ID
			echo '<p><a href="index.php?page=shop&item='.$item[1].'">'.$item["1"].
			' costs: '.$this->displayCurrency($currency).
			$this->currencyFormat($currency_format, $item["6"]).'<a></p>';
		}
		
	}
	
	public function listFeaturedText($currency, $currency_format) {
		require_once("/inc/includes.php");
		$Item = new Item;
		$items = $Item->GetFeaturedItems();
		foreach ($items as $itemId => $item) {
			//echo '<p><a href="shop.php?item='.$item[0].'">'.$item["1"]. BY ID
			echo '<p><a href="index.php?page=shop&item='.$item[1].'">'.$item["1"].
			' costs: '.$this->displayCurrency($currency).
			$this->currencyFormat($currency_format, $item["6"]).'<a></p>';
		}
		
	}
	
	public function listAll($currency, $currency_format) { //Will need to be revised to add pages
		require_once("/inc/includes.php");
		$Item = new Item;
		$items = $Item->GetAllItems();
		foreach ($items as $itemId => $item) {
			echo $this->homeItemDisplay($item, $currency, $currency_format);
		}
	}
	
	public function listFeatured($currency, $currency_format) {
		require_once("/inc/includes.php");
		$Item = new Item;
		$items = $Item->GetFeaturedItems();
		foreach ($items as $itemId => $item) {
			echo $this->homeItemDisplay($item, $currency, $currency_format);
		}
	}

	public function homeItemDisplay($item, $currency, $currency_format) {
		$details = '';
		//$details .= '<div style="display: inline-block"><h2><a href="shop.php?item='.$item[0].'">'.$item["1"].'</a></h2>'."\n"; BY ID
		$details .= '<div style="display: inline-block; text-align: center;"><h2><a href="index.php?page=shop&item='.$item[1].'&id='.$item[0].'">'.$item["1"].'</a></h2>'."\n";
		//$details .= '<a href="shop.php?item='.$item[0].'">'.'<img height="250" width="250" src="'.$item["7"].'" alt="'.$item["1"].'"/></a>'."\n"; BY ID
		$details .= '<a href="index.php?page=shop&item='.$item[1].'&id='.$item[0].'">'.'<img height="250" width="250" src="'.$item["7"].'" alt="'.$item["1"].'"/></a>'."\n";
		$details .= '<p id="item-description">'.$item["8"].'</p>'."\n";
		$details .= '<p id="item-price">'.$this->displayCurrency($currency).
		$this->currencyFormat($currency_format, $item["6"]).'</p></div>';
		return $details;
	}
	
	public function displayItemDetails($itemId, $currency, $currency_format) {
		require_once("/inc/includes.php");
		$Item = new Item;
		$item = $Item->LoadItem($itemId);
		$details = '';
		$details .= '<div style="display: inline-block; text-align: center;"><h1>'.$item["1"].'</h1>'."\n";
		$details .= '<img height="250" width="250" src="'.$item["7"].'" alt="'.$item["1"].'"/>'."\n";
		$details .= '<p id="item-description">'.$item["8"].'</p>'."\n";
		$details .= '<p id="item-price">'.$this->displayCurrency($currency).
		$this->currencyFormat($currency_format, $item["6"]).'</p></div>';
		return $details;
	}
	
	public function displayItemDetailsByName($itemName, $currency, $currency_format) {
		require_once("/inc/includes.php");
		$Item = new Item;
		$item = $Item->LoadItemByName($itemName);
		$details = '';
		$details .= '<div style="display: inline-block; text-align: center;"><h1>'.$item["1"].'</h1>'."\n";
		$details .= '<img height="250" width="250" src="'.$item["7"].'" alt="'.$item["1"].'"/>'."\n";
		$details .= '<p id="item-description">'.$item["8"].'</p>'."\n";
		$details .= '<p id="item-price">'.$this->displayCurrency($currency).
		$this->currencyFormat($currency_format, $item["6"]).'</p></div>';
		return $details;
	}
	
	public function displayItemDetailsByNameAndID($itemName, $itemID, $currency, $currency_format) {
		require_once("/inc/includes.php");
		$Item = new Item;
		$item = $Item->LoadItemByNameAndID($itemName, $itemID);
		$details = '';
		$details .= '<div style="display: inline-block; text-align: center;"><h1>'.$item["1"].'</h1>'."\n";
		$details .= '<img height="250" width="250" src="'.$item["7"].'" alt="'.$item["1"].'"/>'."\n";
		$details .= '<p id="item-description">'.$item["8"].'</p>'."\n";
		$details .= '<p id="item-price">'.$this->displayCurrency($currency).
		$this->currencyFormat($currency_format, $item["6"]).'</p></div>';
		return $details;
	}

	public function addItemToBasket($itemId, $quantity, $basketSession, $items) {
		//Will update to new system
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
		//I am creating a custom currencyConfig for this, need to use number_format tho!
		require_once("/inc/includes.php");
		$Currency = new Currency;
		return $Currency->displayPriceAsCurrency($currency);
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

/*
	public function itemsOnOffer($items,) {
		// To do
	}
*/
}
?>