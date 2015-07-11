<?php 
  //Conecta al servidor:
  mysql_connect("localhost", "root", "root") or die (mysql_error ());
  //Conecta a la base de datos:
  mysql_select_db("TravellingTo") or die(mysql_error());
  //Crea el query:
  $QueryFrom="SELECT * FROM `Countries` WHERE `Code` LIKE '" .$_GET['cfrom']. "'";

  $QueryTo="SELECT * FROM `Countries` WHERE `Code` LIKE '" .$_GET['cto']. "'";
  //Realiza el Query:
  $ResultFrom=mysql_query($QueryFrom);
  $ResultTo=mysql_query($QueryTo);




  while($row = mysql_fetch_array($ResultFrom)) {
 		$codeFrom .= $row['Code'];
 		$nameFrom .= $row['Name'];
 		$exRateFrom .=$row['CurrencyCode'];
 		$plugtypeFrom .= $row['Plugtype'];
 		$plugtypeTwoFrom .= $row['PlugtypeTwo'];
 		$currencyFrom .= $row['Currency'];
 		$voltageFrom .= $row['Voltage'];
 		$roadFrom .= $row['Road'];

 	}
 	
 	while($row = mysql_fetch_array($ResultTo)) {
 		$codeTo .= $row['Code'];
 		$nameTo .= $row['Name'];
 		$exRateTo .=$row['CurrencyCode'];
 		$plugtypeTo .= $row['Plugtype'];
 		$plugtypeTwoTo .= $row['PlugtypeTwo'];
 		$currencyTo.= $row['Currency'];
 		$voltageTo .= $row['Voltage'];
 		$roadTo .= $row['Road'];
 	}

 	$moneyGet = file_get_contents('https://openexchangerates.org/api/latest.json?app_id=966590d55d6b4e70aac796e18d3182a3');
  $moneyResult = json_decode($moneyGet, true);
  $From_USD = $moneyResult['rates'][$exRateFrom];
  $To_USD = $moneyResult['rates'][$exRateTo];
  $ExRateFinal = $From_USD / $To_USD;
?>



<html>
<head>
	<title>TravellingTo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/superhero/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style>

</style>
</head>
 <body>
 	<div class="container">
		<div class="row">
			<div class="col-md-12">
		  	<h1><p class="text-center clearfix"><a href="index.php">TravellingTo</a></p></h1>
			</div>
			<div class="col-md-12">
				<h4><p class="text-center">Trip planning done simple</p></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="text-center">Trip plan</h3>
				  </div>
				  <div class="panel-body"><h3 class="text-center">From <?php echo $nameFrom ?> to <?php echo $nameTo ?></h3></div>
				</div>
			</div>
			<!--Info 1-->
			<!--Info 1 From-->
			<div class="col-md-6 col-sm-12">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h4 class="text-center">Plug Type in <?php echo $nameFrom?></h4>
				  </div>
				  <div class="panel-body"><p class="text-center"><?php echo $nameFrom ?> uses <?php echo $plugtypeFrom ?> type <? if ($plugtypeTwoFrom != 0) {echo ".";} else {echo "and " . $plugtypeTwoFrom . " type.";} ?></p></div>
				</div>
			</div>
			<!-- End Info 1 From-->
			<!--Info 1 To-->
			<div class="col-md-6 col-sm-12">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h4 class="text-center">Plug Type in <?php echo $nameTo?></h4>
				  </div>
				  <div class="panel-body"><p class="text-center"><?php echo $nameTo ?> uses <?php echo $plugtypeTo ?> type <?php if ($plugtypeTwoTo != 0) {echo ".";} else {echo "and " . $plugtypeTwoTo . " type.";} ?></p></div>
				</div>
			</div>
			<!--End Info 1-->
			<!--Info 1 Compare-->
			<div class="col-md-12 col-sm-12">
				<div class="panel <?php if ($plugtypeTo == $plugtypeFrom) {echo "panel-success";} else {echo "panel-danger";} ?>">
				  <div class="panel-heading">
				    <h5 class="text-center">Plug types comparison between <?php echo $nameFrom . " and " . $nameTo; ?></h5>
				  </div>
				  <div class="panel-body"><p class="text-center"><?php if ($plugtypeTo == $plugtypeFrom) {echo "Both countries use the same plug type";} else {echo "ERROR!";} ?></p></div>
				</div>
			</div>
			<!--End Info 1 Compare-->
			<!--End Info 1-->
			<!--Info 2-->
			<!--Info 2 From-->
			<div class="col-md-6 col-sm-12">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h4 class="text-center">Voltage in <?php echo $nameFrom?></h4>
				  </div>
				  <div class="panel-body"><p class="text-center"><?php echo $nameFrom ?> uses <h3 class="text-center"><?php echo $voltageFrom ?>V</h3></p></div>
				</div>
			</div>
			<!-- End Info 2 From-->
			<!--Info 2 To-->
			<div class="col-md-6 col-sm-12">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h4 class="text-center">Voltage in <?php echo $nameTo?></h4>
				  </div>
				  <div class="panel-body"><p class="text-center"><?php echo $nameTo ?> uses <h3 class="text-center"><?php echo $voltageTo ?>V</h3></p></div>
				</div>
			</div>
			<!--End Info 2-->
			<!--Info 2 Compare-->
			<div class="col-md-12 col-sm-12">
				<div class="panel <?php if ($voltageFrom == $voltageTo) {echo "panel-success";} else {echo "panel-danger";} ?>">
				  <div class="panel-heading">
				    <h5 class="text-center">Voltage comparison between <?php echo $nameFrom . " and " . $nameTo; ?></h5>
				  </div>
				  <div class="panel-body"><p class="text-center"><?php if ($voltageFrom == $voltageTo) {echo "Both countries use the same voltage.";} else {echo "ERROR!";} ?></p></div>
				</div>
			</div>
			<!--End Info 2 Compare-->
			<!--End Info 2-->
			<!--Info 3-->
			<!--Info 3 From-->
			<div class="col-md-6 col-sm-12">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h4 class="text-center">Currency in <?php echo $nameFrom?></h4>
				  </div>
				  <div class="panel-body"><p class="text-center"><?php echo $nameFrom ?> uses <h3 class="text-center"><?php echo $currencyFrom ?></h3></p></div>
				</div>
			</div>
			<!-- End Info 3 From-->
			<!--Info 3 To-->
			<div class="col-md-6 col-sm-12">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h4 class="text-center">Currency in <?php echo $nameTo?></h4>
				  </div>
				  <div class="panel-body"><p class="text-center"><?php echo $nameTo ?> uses <h3 class="text-center"><?php echo $currencyTo ?></h3></p></div>
				</div>
			</div>
			<!--End Info 3-->
			<!--Info 3 Compare-->
			<div class="col-md-12 col-sm-12">
				<div class="panel panel-warning">
				  <div class="panel-heading">
				    <h5 class="text-center">Currency comparison between <?php echo $nameFrom . " and " . $nameTo; ?></h5>
				  </div>
				  <div class="panel-body">
				  	<p class="text-center">1 <?php echo $currencyTo . " equals " . $ExRateFinal . " " . $currencyFrom ?></p>
				  	<p class="text-center">Currency calculator with input is not yet available as I need to pay the API usage for that. Also, I'm limited to only 1.000 conversions per month. If you want to see this feature implemented and unlimited, consider donating. Thanks!</p>
				  </div>
				</div>
			</div>
			<!--End Info 3 Compare-->
			<!--End Info 3-->
			<!--Info 4-->
			<!--Info 4 From-->
			<div class="col-md-6 col-sm-12">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h4 class="text-center">Driving side in <?php echo $nameFrom?></h4>
				  </div>
				  <div class="panel-body"><p class="text-center"><?php echo $nameFrom ?> Drives on the <h3 class="text-center"><?php echo $roadFrom ?></h3></p></div>
				</div>
			</div>
			<!-- End Info 4 From-->
			<!--Info 4 To-->
			<div class="col-md-6 col-sm-12">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h4 class="text-center">Driving side in <?php echo $nameTo?></h4>
				  </div>
				  <div class="panel-body"><p class="text-center"><?php echo $nameTo ?> Drives on the <h3 class="text-center"><?php echo $roadTo ?></h3></p></div>
				</div>
			</div>
			<!--End Info 4-->
			<!--Info 4 Compare-->
			<div class="col-md-12 col-sm-12">
				<div class="panel <?php if ($roadFrom == $roadTo) {echo "panel-success";} else {echo "panel-danger";} ?>">
				  <div class="panel-heading">
				    <h5 class="text-center">Road driving side comparison between <?php echo $nameFrom . " and " . $nameTo; ?></h5>
				  </div>
				  <div class="panel">
				  	<p class="text-center"><?php if ($roadFrom == $roadTo) {echo "You are good to go! Both countries drive on the " . $roadFrom . ".";} else {echo "Be careful! In " . $nameFrom . " people drive on the " . $roadFrom . " meanwhile in " . $nameTo . " people drive on the " . $roadTo . ".";} ?></p>
				  	<p class="text-center">You may also want to check for special tourist driving licenses. We're working on getting that info.</p>
				  </div>
				</div>
			</div>
			<!--End Info 4 Compare-->
			<!--End Info 4-->
		</div>
	</div>
 </body>

 </html> 