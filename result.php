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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header text-center">
          <h1><small>Travelling from</small> <?php echo $nameFrom ?> <small>to</small> <?php echo $nameTo ?></h1>
        </div>
      </div>
    </div>
    <div class="row">
      <!--COUNTRY FROM GENERIC INFO-->
      <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Information of <?php echo $nameFrom ?></h3>
          </div>
          <div class="panel-body">
            <img src="img/<?php echo $codeFrom ?>.png" class="img-responsive"></br>
            <ul class="list-group">
              <li class="list-group-item">Country code: <?php echo $codeFrom ?></li>
              <li class="list-group-item">Country phone number: <?php echo $phoneCodeFrom ?></li>
              <li class="list-group-item">Country stat3:</li>
              <li class="list-group-item">Country stat4:</li>
              <li class="list-group-item">Country stat5:</li>
            </ul>
          </div>
        </div>
      </div>
      <!--COUNTRY FROM GENERIC INFO END-->

      <!--COUNTRY TO GENERIC INFO-->
      <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-plane" aria-hidden="true"></span> Information of <?php echo $nameTo ?></h3>
          </div>
          <div class="panel-body">
            <img src="img/<?php echo $codeTo ?>.png" class="img-responsive"></br>
            <ul class="list-group">
              <li class="list-group-item">Country code: <?php echo $codeTo ?></li>
              <li class="list-group-item">Country phone number: <?php echo $phoneCodeTo ?></li>
              <li class="list-group-item">Country stat3:</li>
              <li class="list-group-item">Country stat4:</li>
              <li class="list-group-item">Country stat5:</li>
            </ul>
          </div>
        </div>
      </div>
      <!--COUNTRY TO GENERIC INFO END-->

      <!--COUNTRY LANGUAGE COMPARISON-->
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Language comparison between <?php echo $countries_name ?></h3>
          </div>
          <div class="panel-body">
            This is the language comparison <?php echo $countries_name ?>. If both are the same, this will be OK. If not, it shows common phrases to learn. A translator should be useful here.
          </div>
        </div>
      </div>
      <!--COUNTRY LANGUAGE COMPARISON END-->

      <!--COUNTRY MONEY COMPARISON-->
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Currency comparison between <?php echo $countries_name ?></h3>
          </div>
          <div class="panel-body">
            In COUNTRYFROM the official currency is the MONEYFROM (MONEYCODEFROM) meanwhile in COUNTRYTO te official currency is MONEYTO (MONEYCODETO) is used. </br>
            If needed, there will be a currency comparison system. </br>
            If not, it will be ok to go!
          </div>
        </div>
      </div>
      <!--COUNTRY MONEY COMPARISON END-->

      <!--COUNTRY VOLTAGE COMPARISON-->
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Voltage comparison between <?php echo $countries_name ?></h3>
          </div>
          <div class="panel-body">
            IF both the voltage in COUNTRYFROM and COUNTRYTO are the same, there will be an OK sign an we'll be good to go. If not, there will be a breakdown of which voltages each country uses and if they are compatible. Also a warning for different plugs (WIP).
          </div>
        </div>
      </div>
      <!--COUNTRY VOLTAGE COMPARISON END-->

      <!--COUNTRY PLUG COMPARISON-->
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title">Plug comparison between <?php echo $countries_name ?></h3>
          </div>
          <div class="panel-body">
            This is totally going into the WIP part. I don't know how the fuck to do that shit. 
          </div>
        </div>
      </div>
      <!--COUNTRY PLUG COMPARISON END-->

      <!--COUNTRY ROAD COMPARISON-->
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Driving side comparsion between <?php echo $countries_name ?></h3>
          </div>
          <div class="panel-body">
            If people drive on the same side, it's great! If not, advice! Still, check for special driving licenses you may need. Get that info too, motherfucker!
          </div>
        </div>
      </div>
      <!--COUNTRY ROAD COMPARISON END-->
    </div>
  </div>
</body>
</html>