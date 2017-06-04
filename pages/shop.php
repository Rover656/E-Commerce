<?php
	if (isset($_GET['item'])) {
		//Item Description
		echo $Shop->displayItemDetailsByNameAndID($_GET['item'], $_GET['id'], $currency, $currency_format);
	} else {
		//List all items (NEED PAGES!)
		$Shop->ListAll($currency, $currency_format);
	}
?>