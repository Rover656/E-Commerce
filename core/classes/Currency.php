<?php
//Currency Config
////NEED TO FINISH IMPORT OF http://www.xe.com/symbols.php
////I HAVE ONLY JUST STARTED
class Currency {
	public function displayCurrency($currency) {
		switch ($currency) {
			case 'ALL':
				return "Lek";
				break;
			case 'AFN':
				return "؋";
				break;
			case 'ARS':
				return "$";
				break;
			case 'AWG':
				return "ƒ";
				break;
			case 'AUD':
				return "$";
				break;
			case 'AZN':
				return "ман";
				break;
			case 'BSD':
				return "$";
				break;
			case 'BBD':
				return "$";
				break;
			case 'BYN':
				return "BR";
				break;
			case 'BZD':
				return "BZ$";
				break;
			case 'BMD':
				return "$";
				break;
			case 'GBP':
				return "£";
				break;
			case 'USD':
				return "$";
				break;
			case 'EUR':
				return "€";
				break;
			default:
				return "£";
				break;
		}
	}
}
?>
