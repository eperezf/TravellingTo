<?php 

if (defined('FromFile')){
  if ($Currency_ID_From=="Unavailable"){
    $Exchange_Response = "There's no currency definded for " . $Name_From . ". You can help us add this information HERE";
  }
  elseif ($Currency_ID_To=="Unavailable"){
    $Exchange_Response = "There's no currency definded for " . $Name_To . ". You can help us add this information HERE";
  }
  else {
  	if ($Currency_Code_From != $Currency_Code_To){
    	$exchangeGet = file_get_contents('https://openexchangerates.org/api/latest.json?app_id=966590d55d6b4e70aac796e18d3182a3');
    	$exchangeResult = json_decode($exchangeGet, true);
    	$From_USD = $exchangeResult['rates'][$Currency_Code_From];
    	$To_USD = $exchangeResult['rates'][$Currency_Code_To];
    	$Exchange_Rate_Inverse = round($From_USD / $To_USD, 2);
    	$Exchange_Rate_Normal = round($To_USD / $From_USD, 2);
    	if ($Exchange_Rate_Normal > $Exchange_Rate_Inverse) {
    		$Exchange_Response = "1 " . $Currency_Code_From . " = " . $Exchange_Rate_Normal . " " . $Currency_Code_To;
    	}
    	else {
    		$Exchange_Response = "1 " . $Currency_Code_To . " = " . $Exchange_Rate_Inverse . " " . $Currency_Code_From;
    	};
  	}
  	else {
  		$Exchange_Response = "No exchange needed.";
  	};
  };
}
else {

};

?>






