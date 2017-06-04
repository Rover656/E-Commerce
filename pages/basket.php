<?php 
	if (isset($basketSession)) {
		$basket->basketContents($basketSession, $items, $currency, $currency_format);
		echo $basket->totalPrice($basketSession, $items, $currency, $currency_format);
	} else {
		echo '<h1>Your Basket is empty. Take a look at <a href="shop.php">our shop</a>.</h1>'."\n";
	}
?>