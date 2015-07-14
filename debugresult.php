<?php 
  //Conecta al servidor:
  mysql_connect("localhost", "root", "root") or die (mysql_error ());
  //Conecta a la base de datos:
  mysql_select_db("TravellingTo") or die(mysql_error());
  //Crea el query:
  $QueryFrom="SELECT * FROM `country_data` WHERE `iso` LIKE '" .$_GET['cfrom']. "'";

  $QueryTo="SELECT * FROM `country_data` WHERE `iso` LIKE '" .$_GET['cto']. "'";
  //Realiza el Query:
  $ResultFrom=mysql_query($QueryFrom);
  $ResultTo=mysql_query($QueryTo);

  //Toma los datos del país de origen:
  while($row = mysql_fetch_array($ResultFrom)) {
    $completedFrom .= $row['completed'];
 		$codeFrom .= $row['iso'];
 		$nameFrom .= $row['name'];
 		$exRateFrom .=$row['currencyCode'];
 		$plugTypeOneFrom .= $row['PlugTypeOne'];
 		$plugTypeTwoFrom .= $row['PlugTypeTwo'];
    $plugTypeThreeFrom .= $row['PlugTypeThree'];
    $plugTypeFourFrom .= $row['PlugTypeFour'];
 		$currencyFrom .= $row['Currency'];
 		$voltageOneFrom .= $row['VoltageOne'];
    $voltageTwoFrom .= $row['VoltageTwo'];
 		$roadFrom .= $row['RoadSide'];
    $phoneCodeFrom .= $row['PhoneCode'];
    $mainLanguageFrom .= $row['MainLanguage'];
 	}
 	
  //Toma los datos del país de destino:
 	while($row = mysql_fetch_array($ResultTo)) {
 		$completedTo .= $row['completed'];
    $codeTo .= $row['iso'];
    $nameTo .= $row['name'];
    $exRateTo .=$row['currencyCode'];
    $plugTypeOneTo .= $row['PlugTypeOne'];
    $plugTypeTwoTo .= $row['PlugTypeTwo'];
    $plugTypeThreeTo .= $row['PlugTypeThree'];
    $plugTypeFourTo .= $row['PlugTypeFour'];
    $currencyTo .= $row['Currency'];
    $voltageOneTo .= $row['VoltageOne'];
    $voltageTwoTo .= $row['VoltageTwo'];
    $roadTo .= $row['RoadSide'];
    $phoneCodeTo .= $row['PhoneCode'];
    $mainLanguageTo .= $row['MainLanguage'];
    $helloPhraseTo .= $row['HelloPhrase'];
    $goodbyePhraseTo .= $row['GoodbyePhrase'];
    $thanksPhraseTo .= $row['ThanksPhrase'];
    $dontSpeakPhraseTo .= $row['DontSpeakPhrase'];
    $bathroomPhraseTo .= $row['BathroomPhrase'];
 	}

  //API de conversión monetaria:
 	$moneyGet = file_get_contents('https://openexchangerates.org/api/latest.json?app_id=966590d55d6b4e70aac796e18d3182a3');
  $moneyResult = json_decode($moneyGet, true);
  $From_USD = $moneyResult['rates'][$exRateFrom];
  $To_USD = $moneyResult['rates'][$exRateTo];
  $ExRateFinal = $From_USD / $To_USD;

  //Creación de responses para comparaciones:
  //Nombramiento de los dos países (Canada and Chile):
  $countries_name = $nameFrom . " and " . $nameTo;

  //Nombramiento de moneda + código ISO:
  $currencyResponseFrom = $currencyFrom . " (" . $exRateFrom . ")";
  $currencyResponseTo = $currencyTo . " (" . $exRateTo . ")";

  //Nombramiento de cambio de moneda:
  $currencyResultResponse = $currencyFrom . " to " . $currencyTo . ": 1 " . $currencyTo . " equals " . $ExRateFinal . " " . $currencyFrom;

  //Nombramiento de voltajes:
  if ($voltageTwoFrom == 0) {
    $voltageListFrom = $voltageOneFrom . "V";
  }
  else {
    $voltageListFrom = $voltageOneFrom . " and " . $voltageTwoFrom . "V";
  }
  if ($voltageTwoTo == 0) {
    $voltageListTo = $voltageOneTo . "V";
  }
  else {
    $voltageListTo = $voltageOneTo . " and " . $voltageTwoTo . "V";
  };


  //Comparación de lado de manejo:
  if ($roadFrom == $roadTo){
    $roadResponse = "In both " . $nameFrom . " and " . $nameTo . " people drive on the " . $roadFrom . ". Be sure to still check for special driving licenses if you are planning to drive. We're working on getting that info for you.";
  }
    else{
      $roadResponse = "Be careful! In " . $nameFrom . " people drive on the " . $roadFrom . " meanwhile in " . $nameTo . " people drive on the " . $roadTo . ". If you are planning to drive, be sure to learn different road rules that may be present in " . $nameTo . " and check for special driving licenses that you may need. We're working on getting that info for you.";
    };

    //Comparación de idioma:
    if ($mainLanguageFrom == $mainLanguageTo){
      $languageResponse = "In both " . $nameFrom . " and " . $nameTo . " people speak " . $mainLanguageTo . ". You are good to go!";
    }
    else {
      $languageResponse = "Be careful! In " . $nameFrom . " people speak " . $mainLanguageFrom . " meanwhile in " . $nameTo . " people speak " . $mainLanguageTo . " Be sure to learn some basic phrases such as:</br>Hello: " . $helloPhraseTo . "</br>Goodbye: " . $goodbyePhraseTo . "</br>";
    };

?>

<html>
<body>
  <p>
    Origin country Code: <?php echo $codeFrom ?></br>
    Destination country Code: <?php echo $codeTo ?>
  </p>
  <p>
    Origin country name: <?php echo $nameFrom ?></br>
    Destination country name: <?php echo $nameTo ?>
  </p>
  <p>
    Origin country phone code: <?php echo $phoneCodeFrom ?></br>
    Destination country phone code: <?php echo $phoneCodeTo ?>
  </p>
  <p>
    Origin country language: <?php echo $mainLanguageFrom ?></br>
    Destination country laguage: <?php echo $mainLanguageTo ?></br>
    Language comparison between <?php echo $countries_name ?>: <?php echo $languageResponse; ?>
  </p>
  <p>
    Origin country currency: <?php echo $currencyResponseFrom ?></br>
    Destination country currency: <?php echo $currencyResponseTo ?></br>
    Exchange from <?php echo $currencyResultResponse; ?>
  </p>
  <p>
    Origin country voltage: <?php echo $voltageListFrom ?></br>
    Destination country voltage: <?php echo $voltageListTo ?></br>
    Voltage comparison between <?php echo $countries_name ?>: COMPARISON SYSTEM IN PROGRESS
  <p>
    Origin country plug type(s): ORIGIN PLUG TYPE(s)</br>
    Destination country plug type(s): DESTIATION PLUG TYPE(s)</br>
    Plug type comparison between <?php echo $countries_name ?>: COMPARISON SYSTEM IN PROGRESS
  </p>
  <p>
    Origin country diriving side: <?php echo $roadFrom ?></br>
    Destination country driving side: <?php echo $roadTo ?></br>
    Road side driving comparison between <?php echo $countries_name ?>: <?php echo $roadResponse ?>
  </p>


</body>
</html>