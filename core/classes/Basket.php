<?php
//TODO: Complete Re-write for new system (Once account system and session system are completed)
class Basket {
	private $shop;

	public function __construct() {
    	$this->shop = new Shop();
	}

	public function basketContents($itemArray, $items, $currency, $currency_format) {
		$currency = $this->shop->displayCurrency($currency);
		foreach ($itemArray as $itemId => $data) {
			$itemName = $this->shop->itemName($itemId, $items);
			echo '<p>Name: '.$itemName.' Item ID: '.$data['item-id'].' Quantity: '.$data['quantity'].
			' Price: '.$currency.$this->shop->currencyFormat($currency_format, $data['price']).'</p>'."\n";
		}
	}

	public function totalPrice($itemArray, $items, $currency, $currency_format) {
		$total = 0;
		$currency = $this->shop->displayCurrency($currency);
		foreach ($itemArray as $itemId => $data) {
			$total += $data['price'];
		}
		return '<p>Total Price: '.$currency.$this->shop->currencyFormat($currency_format, $total).'</p>';
	}
}
?>
