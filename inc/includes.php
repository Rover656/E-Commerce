<?php
	/////TODO: FIX DEFINED LOCATIONS (WORKS NOW)
	//This script just adds all the config into a massive array for easy access
	//Normal Includes
	require_once('/core/config.php');
	$siteData[0] = $shopTitle;
	$siteData[1] = $footerCopy;
	$siteData[2] = $currency;
	$siteData[3] = $currency_format;
    require_once("/" . 'core/dbcon.php');
	//Basket Includes
	require_once("/" . 'core/items.php');
	require_once("/" . 'core/classes/Basket.php');
	require_once("/" . 'core/classes/Shop.php');
	$basket = new Basket;
	//Shop Includes
	require_once("/" . 'core/items.php');
	require_once("/" . 'core/classes/Shop.php');
	require_once("/" . 'core/classes/Item.php');
	$Item = new Item;
	$Shop = new Shop;
	//Encryption Includes
	require_once("/" . 'core/classes/REnc.php');
	$REnc = new REnc;
	//Currency Includes
	require_once("/" . 'core/classes/Currency.php');
	$Currency = new Currency;
	//User Includes
	require_once("/" . 'core/classes/User.php');
	$User = new User;
?>
