<?php
session_start();
//TODO: MAKE WORK
if (isset($_POST['item-id'])) {
	$itemId = $_POST['item-id'];
	$quantity = $_POST['quant'];
	$shop->addItemToBasket($itemId, $quantity, $basketSession, $items);
	$basketSession = $_SESSION['basketSession'];
}
?>
