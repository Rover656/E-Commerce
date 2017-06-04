<h1>Featured Items</h1>
<?php
	//TODO: Update to use database items
	echo $Shop->listFeatured($currency, $currency_format);
?>
<h1>Encryption Check</h1>
<?php
	$text = "HELLO";
	$password = "GOODBYE";
	echo "TEXT = " . $text . "</br>";
	echo "PASSWORD = ". $password . "</br>";
	echo "ENCRYPTED = " . $REnc->REnc_Encrypt_V3_Short($text, $password) . "</br>";
	echo "DECRYPTED = " . $REnc->REnc_Decrypt_V3_Short($REnc->REnc_Encrypt_V3_Short($text, $password), $password) . "</br>";
?>