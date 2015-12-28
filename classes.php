<?php

class Country {
	public $ID;
	public $ISO;
	public $Name;
	public $Capital;
	public $PhoneCode;
	public $DrivingSide;
	public $VoltagePrimary;
	public $VoltageSecondary;
	public $PlugList;
	public $CurrencyID;
	public $CurrencyCode;
	public $CurrencyName;
	public $CurrencyOfficial;
	public $LanguageID;
	public $LanguageName;
	public $LanguageCode;
	public $LanguageHello;
	public $LanguageGoodbye;
	public $LanguageBathroom;
	public $LanguagePlace;
	public $LanguageNoSpeak;

	function __construct($ISO){
		include('config.php');
		$conn->set_charset("utf8");
		$CountryQuery = "SELECT * FROM `Country` WHERE `ISO` LIKE'" . $ISO . "'";
  	$CountryResult = mysqli_query($conn, $CountryQuery);
  	while($CountryRow = mysqli_fetch_array($CountryResult)) {
  		$this->ID 							= $CountryRow["idCountry"];
  		$this->ISO 							= $CountryRow["ISO"];
  		$this->Name 						= $CountryRow["Name"];
  		$this->Capital 					= $CountryRow["Capital"];
  		$this->PhoneCode 				= $CountryRow["Phone_Code"];
  		$this->DrivingSide 			= $CountryRow["Driving_Side"];
  		$this->VoltagePrimary 	= $CountryRow["Voltage_Primary"];
  		$this->VoltageSecondary = $CountryRow ["Voltage_Secondary"];
  		$this->PlugList 				= $CountryRow ["Plug_List"];
  	}

	  $currencyQuery = "SELECT * FROM CurrencyVotes JOIN Currency WHERE CurrencyVotes.idCountry = " . $this->ID . " AND Currency.idCurrency = CurrencyVotes.idCurrency AND CurrencyVotes.Official = TRUE";
	  $currencyResult = mysqli_query($conn, $currencyQuery);
	  if (mysqli_num_rows($currencyResult)!=0){
	    while($CurrencyRow = mysqli_fetch_array($currencyResult)){
	      $this->CurrencyID 			= $CurrencyRow["idCurrency"];
	      $this->CurrencyCode			= $CurrencyRow["Code"];
	      $this->CurrencyName 		= $CurrencyRow["Name"];
	      $this->CurrencyOfficial = $CurrencyRow["Official"];
	    };
	  }
	  elseif(mysqli_num_rows($currencyResult)==0) {
	  	$currencyQuery = "SELECT * FROM CurrencyVotes JOIN Currency WHERE CurrencyVotes.idCountry = " . $this->ID . " AND Currency.idCurrency = CurrencyVotes.idCurrency ORDER BY CurrencyVotes.Points DESC LIMIT 1";
	    $currencyResult = mysqli_query($conn, $currencyQuery);
	    if(mysqli_num_rows($currencyResult)!=0){
	      while($CurrencyRow = mysqli_fetch_array($currencyResult)){
	        $this->CurrencyID 			= $CurrencyRow["idCurrency"];
	        $this->CurrencyCode 		= $CurrencyRow["Code"];
	        $this->CurrencyName 		= $CurrencyRow["Name"];
	        $this->CurrencyOfficial = $CurrencyRow["Official"];
	      }
	    }
	    else {
	      $this->CurrencyID 			= "Unavailable";
	      $this->CurrencyCode 		= "Unavailable";
	      $this->CurrencyName 		= "Unavailable";
	      $this->CurrencyOfficial = "0";
	    };
		};

		$languageQuery = "SELECT * FROM LanguageVotes JOIN Language WHERE LanguageVotes.idCountry = " . $this->ID . " AND Language.idLanguage = LanguageVotes.idLanguage AND LanguageVotes.Official = TRUE";
	  $languageResult = mysqli_query($conn, $languageQuery);
	  if (mysqli_num_rows($languageResult)!=0){
	    while($LanguageRow = mysqli_fetch_array($languageResult)){
	    	$this->LanguageID 			= $LanguageRow["idLanguage"];
				$this->LanguageName 		= $LanguageRow["Name"];
				$this->LanguageCode 		= $LanguageRow["ISO"];
				$this->LanguageHello 		= $LanguageRow["Hello"];
				$this->LanguageGoodbye 	= $LanguageRow["Goodbye"];
				$this->LanguageBathroom = $LanguageRow["Bathroom"];
				$this->LanguagePlace 		= $LanguageRow["Place"];
				$this->LanguageNoSpeak 	= $LanguageRow["NoSpeak"];
				$this->LanguageOfficial = $LanguageRow["Official"];
	    };
	  }
	  elseif(mysqli_num_rows($languageResult)==0) {
	  	$languageQuery = "SELECT * FROM LanguageVotes JOIN Language WHERE LanguageVotes.idCountry = " . $this->ID . " AND Language.idLanguage = LanguageVotes.idLanguage ORDER BY LanguageVotes.Points DESC LIMIT 1";
	    $languageResult = mysqli_query($conn, $languageQuery);
	    if(mysqli_num_rows($languageResult)!=0){
	      while($LanguageRow = mysqli_fetch_array($languageResult)){
	      	$this->LanguageID 			= $LanguageRow["idLanguage"];
					$this->LanguageName 		= $LanguageRow["Name"];
					$this->LanguageCode 		= $LanguageRow["ISO"];
					$this->LanguageHello 		= $LanguageRow["Hello"];
					$this->LanguageGoodbye 	= $LanguageRow["Goodbye"];
					$this->LanguageBathroom = $LanguageRow["Bathroom"];
					$this->LanguagePlace 		= $LanguageRow["Place"];
					$this->LanguageNoSpeak 	= $LanguageRow["NoSpeak"];
					$this->LanguageOfficial = $LanguageRow["Official"];
	      }
	    }
	    else {
	    	$this->LanguageID 			= "Unavailable";
				$this->LanguageName 		= "Unavailable";
				$this->LanguageCode 		= "Unavailable";
				$this->LanguageHello 		= "Unavailable";
				$this->LanguageGoodbye 	= "Unavailable";
				$this->LanguageBathroom = "Unavailable";
				$this->LanguagePlace 		= "Unavailable";
				$this->LanguageNoSpeak 	= "Unavailable";
				$this->LanguageOfficial = "Unavailable";
	    };
		};
	}
}


class Relation {

	public $ISOFrom;
	public $ISOTo;
	public $Points;
	public $SpecialNotes;
	public $RelationID;

	function __construct($From, $To){
		include('config.php');
		$this->Points = 0;
  	$relationQuery = "SELECT * FROM `Relation` WHERE `Origin` ='" . $From ."' AND `Destination` ='" . $To . "'";
  	$relationResult = mysqli_query($conn, $relationQuery);
  	while ($row = mysqli_fetch_array($relationResult)) {
    	$this->RelationID = $row["idRelation"];
    	$this->ISOFrom 		= $row["Origin"];
    	$this->ISOTo 			= $row["Destination"];
    	$this->Points 		= $row["Points"];
  	}
	}

	function AddPoints (){
		include('config.php');
		$this->Points = $this->Points + 1;
  	$pointsQuery 	= "UPDATE `Relation` SET `Points` =" . $this->Points . " WHERE `idRelation` =" . $this->RelationID;
  	if (mysqli_query($conn, $pointsQuery)){
  	}
  	else {
  		echo "ERROR";
  	};
	}
}

class Currency {

	public $Status;
	public $FromUSD;
	public $ToUSD;
	public $ExchangeRateInverse;
	public $ExchangeRateNormal;
	public $ExchangeRate;
	public $BarColor;
	public $Response;
	public $CurrencyISOFrom;
	public $CurrencyISOTo;
	public $CurrencyNameFrom;
	public $CurrencyNameTo;

	function __construct($CurrencyISOFrom, $CurrencyISOTo, $CurrencyNameFrom, $CurrencyNameTo){

		$this->CurrencyISOFrom 	= $CurrencyISOFrom;
		$this->CurrencyISOTo 		= $CurrencyISOTo;
		$this->CurrencyNameFrom = $CurrencyNameFrom;
		$this->CurrencyNameTo 	= $CurrencyNameTo;

		if ($this->CurrencyISOFrom != $this->CurrencyISOTo && $this->CurrencyISOFrom != "Unavailable" && $this->CurrencyISOTo != "Unavailable"){
			$exchangeGet 							 = file_get_contents('https://openexchangerates.org/api/latest.json?app_id=966590d55d6b4e70aac796e18d3182a3');
		  $exchangeResult 					 = json_decode($exchangeGet, true);
		  $this->FromUSD 						 = $exchangeResult['rates'][$this->CurrencyISOFrom];
	    $this->ToUSD 							 = $exchangeResult['rates'][$this->CurrencyISOTo];
	    $this->ExchangeRateInverse = round($this->FromUSD / $this->ToUSD, 2);
		  $this->ExchangeRateNormal  = round($this->ToUSD / $this->FromUSD, 2);
 	  }
	}

	function GetStatus (){
		if ($this->CurrencyISOFrom != $this->CurrencyISOTo){
			if ($this->CurrencyISOFrom == "Unavailable"){
				$this->Status = "FromUnavailable";
			}
			elseif ($this->CurrencyISOTo == "Unavailable"){
				$this->Status = "ToUnavailable";
			}
			else {
		    if ($this->ExchangeRateNormal > $this->ExchangeRateInverse) {
		    	$this->Status = "Different";
		    }
		    else {
		    	$this->Status = "Different";
		    }
	  	}
 	  }
 	  elseif ($this->CurrencyISOFrom == $this->CurrencyISOTo){
			if ($this->CurrencyISOFrom == "Unavailable" && $this->CurrencyISOTo == "Unavailable"){
				$this->Status = "BothUnavailable";
			}
			else {
				$this->Status = "Same";
			}
		}
	}

	function GetBarColor (){
		if ($this->Status == "FromUnavailable"){
			$this->BarColor = "danger";
		}
		elseif ($this->Status == "ToUnavailable"){
			$this->BarColor = "danger";
		}
		elseif ($this->Status == "BothUnavailable"){
			$this->BarColor = "danger";
		}
		elseif ($this->Status == "Different"){
			$this->BarColor = "warning";
		}
		elseif ($this->Status == "Same"){
			$this->BarColor = "success";
		}
	}

	function GetResponse ($NameFrom, $NameTo){
		if ($this->CurrencyISOFrom != $this->CurrencyISOTo){
			if ($this->CurrencyISOFrom == "Unavailable"){
				$this->Response = "There's no currency available for " . $NameFrom . ". You can help us adding one HERE";
			}
			elseif ($this->CurrencyISOTo == "Unavailable"){
				$this->Response = "There's no currency available for " . $NameTo . ". You can help us adding one HERE";
			}
			else {
		    if ($this->ExchangeRateNormal > $this->ExchangeRateInverse) {
		    	$this->Response = "1 " . $this->CurrencyNameFrom . " (".  $this->CurrencyISOFrom . ") = " . $this->ExchangeRateNormal . " " . $this->CurrencyNameTo . "s (" . $this->CurrencyISOTo . ")";
		    }
		    else {
		    	$this->Response = "1 " . $this->CurrencyNameTo . " (".  $this->CurrencyISOTo . ") = " . $this->ExchangeRateInverse . " " . $this->CurrencyNameFrom . "s (" . $this->CurrencyISOFrom . ")";
		    }
	  	}
 	  }
 	  elseif ($this->CurrencyISOFrom == $this->CurrencyISOTo){
 	  	if ($this->CurrencyISOFrom == "Unavailable" && $this->CurrencyISOTo == "Unavailable"){
				$this->Response = "There's no currency available for " . $NameFrom . " and " . $NameTo .  ". You can help us adding one HERE";
			}
			else {
				$this->Response = "Both countries use the same currency. There's no need to convert it.";
			}

 	  	
 	  }
	}
}

class Voltage {
	public $VoltagePrimaryFrom;
	public $VoltagePrimaryTo;
	public $VoltageSecondaryFrom;
	public $VoltageSecondaryTo;
	public $VoltagePrimaryRangeFrom;
	public $VoltagePrimaryRangeTo;
	public $VoltageSecondaryRangeFrom;
	public $VoltageSecondaryRangeTo;
	public $BarColor;
	public $Response;

	function __construct ($VoltagePrimaryFrom, $VoltageSecondaryFrom, $VoltagePrimaryTo, $VoltageSecondaryTo){
		$this->VoltagePrimaryFrom = $VoltagePrimaryFrom;
		$this->VoltageSecondaryFrom = $VoltageSecondaryFrom;
		$this->VoltagePrimaryTo = $VoltagePrimaryTo;
		$this->VoltageSecondaryTo = $VoltageSecondaryTo;
	}

	function GetRange (){
		//Voltaje secundario de origen
		if ($this->VoltageSecondaryFrom == 0){
			$this->VoltageSecondaryFrom = "None";
		}
		else {
		};
		//Voltaje secundario de destino
		if ($this->VoltageSecondaryTo == 0){
			$this->VoltageSecondaryTo = "None";
		}
		else{
		};
		//Rango de voltaje primario de origen
		if ($this->VoltagePrimaryFrom >= 100 && $this->VoltagePrimaryFrom <= 150){
			$this->VoltagePrimaryRangeFrom = "L";
		}
		else {
			$this->VoltagePrimaryRangeFrom = "H";
		};
		//Rango de voltaje primario de destino
		if ($this->VoltagePrimaryTo >= 100 && $this->VoltagePrimaryTo <= 150){
			$this->VoltagePrimaryRangeTo = "L";
		}
		else {
			$this->VoltagePrimaryRangeTo = "H";
		};
		//Rango de voltaje secundario de origen
		if ($this->VoltageSecondaryFrom != "None"){
			if ($this->VoltageSecondaryFrom >= 100 && $this->VoltageSecondaryFrom <= 150){

				$this->VoltagePrimaryRangeFrom = "L";
			}
			else {
				$this->VoltageSecondaryRangeFrom = "H";
			};
		}
		else {
			$this->VoltageSecondaryRangeFrom ="N";
		};
		//rango de voltaje secundario de destino
		if ($this->VoltageSecondaryTo != "None"){
			if ($this->VoltageSecondaryTo >= 100 && $this->VoltageSecondaryTo <= 150){

				$this->VoltagePrimaryRangeTo = "L";
			}
			else {
				$this->VoltageSecondaryRangeTo = "H";
			};
		}
		else {
			$this->VoltageSecondaryRangeTo ="N";
		};
	}

	function GetBarColor (){
		if ($this->VoltageSecondaryRangeFrom == "N" && $this->VoltageSecondaryRangeTo == "N"){
			if ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H"){ 
	 			$this->BarColor = "success";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L"){
				$this->BarColor="danger";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H"){ 
				$this->BarColor="danger";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L"){
				$this->BarColor = "success";
			}
		}
		elseif ($this->VoltageSecondaryRangeFrom == "N" && $this->VoltageSecondaryRangeTo != "N"){ 
			if ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "H"){ 
				$this->BarColor = "success";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "L"){ 
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "H"){ 
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "L"){ 
				$this->BarColor="danger";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "H"){ 
				$this->BarColor="danger";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "L"){ 
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "H"){ 
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "L"){ 
				$this->BarColor = "success";
			}
		}
		elseif ($this->VoltageSecondaryRangeFrom != "N" && $this->VoltageSecondaryRangeTo == "N"){ 
			if ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltageSecondaryRangeTo == "H"){ 
				$this->BarColor = "success";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L"){ 
				$this->BarColor="danger";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H"){ 
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L"){ 
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H"){ 
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L"){ 
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H"){ 
				$this->BarColor="danger";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L"){ 
				$this->BarColor = "success";
			}
		}
		elseif ($this->VoltageSecondaryRangeFrom != "N" && $this->VoltageSecondaryRangeTo != "N"){
			if ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "H"){
				$this->BarColor = "success";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "L"){
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "H"){
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "L"){
				$this->BarColor="danger";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "H"){
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "L"){
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "H"){
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "L"){
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "H"){
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "L"){
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "H"){
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "L"){
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "H"){
				$this->BarColor="danger";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "L"){
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "H"){
				$this->BarColor = "warning";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "L"){
				$this->BarColor = "success";
			}
		}
		else {
		};
	}

	function GetResponse ($NameFrom, $NameTo){
		if ($this->VoltageSecondaryRangeFrom == "N" && $this->VoltageSecondaryRangeTo == "N"){
			if ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H"){ 
			 $this->Response= "Voltage in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V.</strong><br>Voltage in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V.</strong><br><strong> You don't need a voltage transformer.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L"){
				$this->Response= "Voltage in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V.</strong><br>Voltage in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V.</strong><br><strong> You need a voltage transformer that increases the voltage output.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H"){ 
				$this->Response= "Voltage in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V.</strong><br>Voltage in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V.</strong><br><strong> You need a voltage transformer that reduces the voltage output.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L"){
				$this->Response= "Voltage in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V.</strong><br>Voltage in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V.</strong><br><strong> You don't need a voltage transformer.</strong> Check for plug compatibility below.";
			}
		}
		elseif ($this->VoltageSecondaryRangeFrom == "N" && $this->VoltageSecondaryRangeTo != "N"){ 
			if ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "H"){ 
				$this->Response = "Voltage in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V.</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>You don't need a voltage transformer.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "L"){ 
				$this->Response = "Voltage in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V.</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "H"){ 
				$this->Response = "Voltage in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V.</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "L"){ 
				$this->Response = "Voltage in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V.</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>You need a voltage transformer that increases the voltage output.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "H"){ 
				$this->Response = "Voltage in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V.</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>You need a voltage transformer that reduces the voltage output.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "L"){ 
				$this->Response = "Voltage in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V.</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "H"){ 
				$this->Response = "Voltage in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V.</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "L"){ 
				$this->Response = "Voltage in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V.</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>You don't need a voltage transformer.</strong> Check for plug compatibility below.";
			}

		}
		elseif ($this->VoltageSecondaryRangeFrom != "N" && $this->VoltageSecondaryRangeTo == "N"){ 
			if ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltageSecondaryRangeTo == "H"){ 
				$this->Response = "HHHN. OK. Voltages in " . $NameFrom . ": " . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V.<br> Voltage in " . $NameTo . ": " . $this->VoltagePrimaryTo . "V.<br><strong>You don't need a voltage transformer.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L"){ 
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V.</strong><br> Voltage in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V.</strong><br><strong>You need a voltage transformer that increases the voltage output.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H"){ 
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V.</strong><br> Voltage in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L"){ 
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V.</strong><br> Voltage in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H"){ 
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V.</strong><br> Voltage in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L"){ 
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V.</strong><br> Voltage in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H"){ 
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V.</strong><br> Voltage in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V.</strong><br><strong>You need a voltage transformer that reduces the voltage output.</strong> Check for plug compatibility below.";
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L"){ 
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V.</strong><br> Voltage in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V.</strong><br><strong>You don't need a voltage transformer.</strong> Check for plug compatibility below.";
			}

		}
		elseif ($this->VoltageSecondaryRangeFrom != "N" && $this->VoltageSecondaryRangeTo != "N"){
			if ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "H"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><st</strong>rong>You don't nee<strong>d a voltage tran</strong>sf<strong>ormer.</strong> Check for plu</strong>g compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "L"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "H"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "L"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>You need a voltage transformer that increases the voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "H"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "L"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>Check for specific voltages in places you are going to visit. You may need a transformer that reduces or increase voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "H"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>Check for specific voltages in places you are going to visit. You may need a transformer that reduces or increase voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "H" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "L"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "H"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "L"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>Check for specific voltages in places you are going to visit. You may need a transformer that reduces or increase voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "H"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>Check for specific voltages in places you are going to visit. You may need a transformer that reduces or increase voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "H" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "L"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>You need a voltage transformer that increases the voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "H"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>You need a voltage transformer that reduces the voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "H" && $this->VoltageSecondaryRangeTo == "L"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "H"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output.</strong> Check for plug compatibility below." ;
			}
			elseif ($this->VoltagePrimaryRangeFrom == "L" && $this->VoltageSecondaryRangeFrom == "L" && $this->VoltagePrimaryRangeTo == "L" && $this->VoltageSecondaryRangeTo == "L"){
				$this->Response = "Voltages in <strong>" . $NameFrom . "</strong>: <strong>" . $this->VoltagePrimaryFrom . "V and " . $this->VoltageSecondaryFrom . "V</strong><br> Voltages in <strong>" . $NameTo . "</strong>: <strong>" . $this->VoltagePrimaryTo . "V and " . $this->VoltageSecondaryTo . "V.</strong><br><strong>You don't need a voltage transformer.</strong> Check for plug compatibility below." ;
			}
		}
		else {
		};
	}
}

class Driving {
	public $BarColor;
	public $Response;
	public $DrivingSideFrom;
	public $DrivingSideTo;

	function __construct ($DrivingSideFrom, $DrivingSideTo){
		$this->DrivingSideFrom = $DrivingSideFrom;
		$this->DrivingSideTo = $DrivingSideTo;
	}

	function GetBarColor (){
		if ($this->DrivingSideFrom == $this->DrivingSideTo){
			$this->BarColor = "success";  
		}
		else {
			$this->BarColor = "danger";  
		}
	}

	function GetResponse ($NameFrom, $NameTo){
		if ($this->DrivingSideFrom == $this->DrivingSideTo){
			$this->Response = "Both " . $NameFrom . " and " . $NameTo . " driving sides are " . strtolower($this->DrivingSideFrom) . ".";
		}
		else {
			$this->Response = "Be careful! In " . $NameFrom . " people drive on the " . strtolower($this->DrivingSideFrom) . " meanwhile in " . $NameTo . " people drive on the " . strtolower($this->DrivingSideTo) . ".";
		}
	}
}

class Plugs {

	public $Plug_Amount_From = 0;
	public $Plug_Amount_To =0;

	public $A_Type_From = FALSE;
	public $B_Type_From = FALSE;
	public $C_Type_From = FALSE;
	public $D_Type_From = FALSE;
	public $E_Type_From = FALSE;
	public $F_Type_From = FALSE;
	public $G_Type_From = FALSE;
	public $H_Type_From = FALSE;
	public $I_Type_From = FALSE;
	public $J_Type_From = FALSE;
	public $K_Type_From = FALSE;
	public $L_Type_From = FALSE;
	public $M_Type_From = FALSE;
	public $N_Type_From = FALSE;
	public $O_Type_From = FALSE;
	public $A_Type_To = FALSE;
	public $B_Type_To = FALSE;
	public $C_Type_To = FALSE;
	public $D_Type_To = FALSE;
	public $E_Type_To = FALSE;
	public $F_Type_To = FALSE;
	public $G_Type_To = FALSE;
	public $H_Type_To = FALSE;
	public $I_Type_To = FALSE;
	public $J_Type_To = FALSE;
	public $K_Type_To = FALSE;
	public $L_Type_To = FALSE;
	public $M_Type_To = FALSE;
	public $N_Type_To = FALSE;
	public $O_Type_To = FALSE;

	public $Plug_Array_From;
	public $Plug_Array_To;

	public $List_Both = "";
	public $List_From = "";
	public $List_To = "";
	public $Plug_Response = "";
	public $Plug_Both_Response = "";
	public $Plug_From_Response = "";
	public $Plug_To_Response = "";

	public $BarColor;

	function GetArray ($PlugListFrom, $PlugListTo){
		$this->Plug_Array_From = explode(", ", $PlugListFrom);
		foreach($this->Plug_Array_From As $this->PlugArray){
			$this->Plug_Amount_From = $this->Plug_Amount_From + 1;
		};

		$this->Plug_Array_To =explode(", ", $PlugListTo);
		foreach($this->Plug_Array_To As $this->PlugArray){
			$this->Plug_Amount_To = $this->Plug_Amount_To + 1;
		};

		foreach ($this->Plug_Array_From as $Plug_Array) {
			if ($Plug_Array == "A"){
				$this->A_Type_From = TRUE;
				//echo "FROM HAS A</br>";	
			}
			elseif ($Plug_Array == "B") {
				$this->B_Type_From = TRUE;
				//echo "FROM HAS B</br>";	
			}
			elseif ($Plug_Array == "C") {
				$this->C_Type_From = TRUE;
				//echo "FROM HAS C</br>";	
			}
			elseif ($Plug_Array == "D") {
				$this->D_Type_From = TRUE;
				//echo "FROM HAS D</br>";	
			}
			elseif ($Plug_Array == "E") {
				$this->E_Type_From = TRUE;
				//echo "FROM HAS E</br>";	
			}
			elseif ($Plug_Array == "F") {
				$this->F_Type_From = TRUE;
				//echo "FROM HAS F</br>";	
			}
			elseif ($Plug_Array == "G") {
				$this->G_Type_From = TRUE;
				//echo "FROM HAS G</br>";	
			}
			elseif ($Plug_Array == "H") {
				$this->H_Type_From = TRUE;
				//echo "FROM HAS H</br>";	
			}
			elseif ($Plug_Array == "I") {
				$this->I_Type_From = TRUE;
				//echo "FROM HAS I</br>";	
			}
			elseif ($Plug_Array == "J") {
				$this->J_Type_From = TRUE;
				//echo "FROM HAS J</br>";	
			}
			elseif ($Plug_Array == "K") {
				$this->K_Type_From = TRUE;
				//echo "FROM HAS K</br>";	
			}
			elseif ($Plug_Array == "L") {
				$this->L_Type_From = TRUE;
				//echo "FROM HAS L</br>";	
			}
			elseif ($Plug_Array == "M") {
				$this->M_Type_From = TRUE;
				//echo "FROM HAS M</br>";	
			}
			elseif ($Plug_Array == "N") {
				$this->N_Type_From = TRUE;
				//echo "FROM HAS N</br>";	
			}
			elseif ($Plug_Array == "O") {
				$this->O_Type_From = TRUE;
				//echo "FROM HAS O</br>";	
			};
		};

		foreach ($this->Plug_Array_To as $Plug_Array) {
			if ($Plug_Array == "A"){
				$this->A_Type_To = TRUE;
				//echo "TO HAS A</br>";	
			}
			elseif ($Plug_Array == "B") {
				$this->B_Type_To = TRUE;
				//echo "TO HAS B</br>";	
			}
			elseif ($Plug_Array == "C") {
				$this->C_Type_To = TRUE;
				//echo "TO HAS C</br>";	
			}
			elseif ($Plug_Array == "D") {
				$this->D_Type_To = TRUE;
				//echo "TO HAS D</br>";	
			}
			elseif ($Plug_Array == "E") {
				$this->E_Type_To = TRUE;
				//echo "TO HAS E</br>";	
			}
			elseif ($Plug_Array == "F") {
				$this->F_Type_To = TRUE;
				//echo "TO HAS F</br>";	
			}
			elseif ($Plug_Array == "G") {
				$this->G_Type_To = TRUE;
				//echo "TO HAS G</br>";	
			}
			elseif ($Plug_Array == "H") {
				$this->H_Type_To = TRUE;
				//echo "TO HAS H</br>";	
			}
			elseif ($Plug_Array == "I") {
				$this->I_Type_To = TRUE;
				//echo "TO HAS I</br>";	
			}
			elseif ($Plug_Array == "J") {
				$this->J_Type_To = TRUE;
				//echo "TO HAS J</br>";	
			}
			elseif ($Plug_Array == "K") {
				$this->K_Type_To = TRUE;
				//echo "TO HAS K</br>";	
			}
			elseif ($Plug_Array == "L") {
				$this->L_Type_To = TRUE;
				//echo "TO HAS L</br>";	
			}
			elseif ($Plug_Array == "M") {
				$this->M_Type_To = TRUE;
				//echo "TO HAS M</br>";	
			}
			elseif ($Plug_Array == "N") {
				$this->N_Type_To = TRUE;
				//echo "TO HAS N</br>";	
			}
			elseif ($Plug_Array == "O") {
				$this->O_Type_To = TRUE;
				//echo "TO HAS O</br>";	
			};
		};
	}

	function GetResponse () {
		//Both responses
		if ($this->A_Type_From == TRUE && $this->A_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/A.png"><div class="caption"><h4>A type</h4></div></div></div>';
			//echo "BOTH HAVE A</br>";
		};
		if ($this->B_Type_From == TRUE && $this->B_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/B.png"><div class="caption"><h4>B type</h4></div></div></div>';
			//echo "BOTH HAVE B</br>";
		};
		if ($this->C_Type_From == TRUE && $this->C_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/C.png"><div class="caption"><h4>C type</h4></div></div></div>';
			//echo "BOTH HAVE C</br>";
		};
		if ($this->D_Type_From == TRUE && $this->D_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/D.png"><div class="caption"><h4>D type</h4></div></div></div>';
			//echo "BOTH HAVE D</br>";
		};
		if ($this->E_Type_From == TRUE && $this->E_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/E.png"><div class="caption"><h4>E type</h4></div></div></div>';
			//echo "BOTH HAVE E</br>";
		};
		if ($this->F_Type_From == TRUE && $this->F_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/F.png"><div class="caption"><h4>F type</h4></div></div></div>';
			//echo "BOTH HAVE F</br>";
		};
		if ($this->G_Type_From == TRUE && $this->G_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/G.png"><div class="caption"><h4>G type</h4></div></div></div>';
			//echo "BOTH HAVE G</br>";
		};
		if ($this->H_Type_From == TRUE && $this->H_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/H.png"><div class="caption"><h4>H type</h4></div></div></div>';
			//echo "BOTH HAVE H</br>";
		};
		if ($this->I_Type_From == TRUE && $this->I_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/I.png"><div class="caption"><h4>I type</h4></div></div></div>';
			//echo "BOTH HAVE I</br>";
		};
		if ($this->J_Type_From == TRUE && $this->J_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/J.png"><div class="caption"><h4>J type</h4></div></div></div>';
			//echo "BOTH HAVE J</br>";
		};
		if ($this->K_Type_From == TRUE && $this->K_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/K.png"><div class="caption"><h4>K type</h4></div></div></div>';
			//echo "BOTH HAVE K</br>";
		};
		if ($this->L_Type_From == TRUE && $this->L_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/L.png"><div class="caption"><h4>L type</h4></div></div></div>';
			//echo "BOTH HAVE L</br>";
		};
		if ($this->M_Type_From == TRUE && $this->M_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/M.png"><div class="caption"><h4>M type</h4></div></div></div>';
			//echo "BOTH HAVE M</br>";
		};
		if ($this->N_Type_From == TRUE && $this->N_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/N.png"><div class="caption"><h4>N type</h4></div></div></div>';
			//echo "BOTH HAVE N</br>";
		};
		if ($this->O_Type_From == TRUE && $this->O_Type_To == TRUE){
			$this->Plug_Both_Response = $this->Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/O.png"><div class="caption"><h4>O type</h4></div></div></div>';
			//echo "BOTH HAVE O</br>";
		};
		//From responses
		if ($this->A_Type_From == TRUE && $this->A_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/A.png"><div class="caption"><h4>A type</h4></div></div></div>';
			//echo "ONLY FROM HAS A</br>";
		};
		if ($this->B_Type_From == TRUE && $this->B_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/B.png"><div class="caption"><h4>B type</h4></div></div></div>';
			//echo "ONLY FROM HAS B</br>";
		};
		if ($this->C_Type_From == TRUE && $this->C_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/C.png"><div class="caption"><h4>C type</h4></div></div></div>';
			//echo "ONLY FROM HAS C</br>";
		};
		if ($this->D_Type_From == TRUE && $this->D_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/D.png"><div class="caption"><h4>D type</h4></div></div></div>';
			//echo "ONLY FROM HAS D</br>";
		};
		if ($this->E_Type_From == TRUE && $this->E_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/E.png"><div class="caption"><h4>E type</h4></div></div></div>';
			//echo "ONLY FROM HAS E</br>";
		};
		if ($this->F_Type_From == TRUE && $this->F_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/F.png"><div class="caption"><h4>F type</h4></div></div></div>';
			//echo "ONLY FROM HAS F</br>";
		};
		if ($this->G_Type_From == TRUE && $this->G_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/G.png"><div class="caption"><h4>G type</h4></div></div></div>';
			//echo "ONLY FROM HAS G</br>";
		};
		if ($this->H_Type_From == TRUE && $this->H_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/H.png"><div class="caption"><h4>H type</h4></div></div></div>';
			//echo "ONLY FROM HAS H</br>";
		};
		if ($this->I_Type_From == TRUE && $this->I_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/I.png"><div class="caption"><h4>I type</h4></div></div></div>';
			//echo "ONLY FROM HAS I</br>";
		};
		if ($this->J_Type_From == TRUE && $this->J_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/J.png"><div class="caption"><h4>J type</h4></div></div></div>';
			//echo "ONLY FROM HAS J</br>";
		};
		if ($this->K_Type_From == TRUE && $this->K_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/K.png"><div class="caption"><h4>K type</h4></div></div></div>';
			//echo "ONLY FROM HAS K</br>";
		};
		if ($this->L_Type_From == TRUE && $this->L_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/L.png"><div class="caption"><h4>L type</h4></div></div></div>';
			//echo "ONLY FROM HAS L</br>";
		};
		if ($this->M_Type_From == TRUE && $this->M_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/M.png"><div class="caption"><h4>M type</h4></div></div></div>';
			//echo "ONLY FROM HAS M</br>";
		};
		if ($this->N_Type_From == TRUE && $this->N_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/N.png"><div class="caption"><h4>N type</h4></div></div></div>';
			//echo "ONLY FROM HAS N</br>";
		};
		if ($this->O_Type_From == TRUE && $this->O_Type_To == FALSE){
			$this->Plug_From_Response = $this->Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/O.png"><div class="caption"><h4>O type</h4></div></div></div>';
			//echo "ONLY FROM HAS O</br>";
		};
		//TO responses
		if ($this->A_Type_From == FALSE && $this->A_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/A.png"><div class="caption"><h4>A type</h4></div></div></div>';
			//echo "ONLY TO HAS A</br>";
		};
		if ($this->B_Type_From == FALSE && $this->B_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/B.png"><div class="caption"><h4>B type</h4></div></div></div>';
			//echo "ONLY TO HAS B</br>";
		};
		if ($this->C_Type_From == FALSE && $this->C_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/C.png"><div class="caption"><h4>C type</h4></div></div></div>';
			//echo "ONLY TO HAS C</br>";
		};
		if ($this->D_Type_From == FALSE && $this->D_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/D.png"><div class="caption"><h4>D type</h4></div></div></div>';
			//echo "ONLY TO HAS D</br>";
		};
		if ($this->E_Type_From == FALSE && $this->E_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/E.png"><div class="caption"><h4>E type</h4></div></div></div>';
			//echo "ONLY TO HAS E</br>";
		};
		if ($this->F_Type_From == FALSE && $this->F_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/F.png"><div class="caption"><h4>F type</h4></div></div></div>';
			//echo "ONLY TO HAS F</br>";
		};
		if ($this->G_Type_From == FALSE && $this->G_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/G.png"><div class="caption"><h4>G type</h4></div></div></div>';
			//echo "ONLY TO HAS G</br>";
		};
		if ($this->H_Type_From == FALSE && $this->H_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/H.png"><div class="caption"><h4>H type</h4></div></div></div>';
			//echo "ONLY TO HAS H</br>";
		};
		if ($this->I_Type_From == FALSE && $this->I_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/I.png"><div class="caption"><h4>I type</h4></div></div></div>';
			//echo "ONLY TO HAS I</br>";
		};
		if ($this->J_Type_From == FALSE && $this->J_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/J.png"><div class="caption"><h4>J type</h4></div></div></div>';
			//echo "ONLY TO HAS J</br>";
		};
		if ($this->K_Type_From == FALSE && $this->K_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/K.png"><div class="caption"><h4>K type</h4></div></div></div>';
			//echo "ONLY TO HAS K</br>";
		};
		if ($this->L_Type_From == FALSE && $this->L_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/L.png"><div class="caption"><h4>L type</h4></div></div></div>';
			//echo "ONLY TO HAS L</br>";
		};
		if ($this->M_Type_From == FALSE && $this->M_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/M.png"><div class="caption"><h4>M type</h4></div></div></div>';
			//echo "ONLY TO HAS M</br>";
		};
		if ($this->N_Type_From == FALSE && $this->N_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/N.png"><div class="caption"><h4>N type</h4></div></div></div>';
			//echo "ONLY TO HAS N</br>";
		};
		if ($this->O_Type_From == FALSE && $this->O_Type_To == TRUE){
			$this->Plug_To_Response = $this->Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/O.png"><div class="caption"><h4>O type</h4></div></div></div>';
			//echo "ONLY TO HAS O</br>";
		};
	}

	function GetBarColor (){
		if ($this->Plug_Both_Response == ""){
			$this->BarColor = "danger";
		};
		if ($this->Plug_From_Response == "" && $this->Plug_To_Response == ""){
			$this->BarColor = "success";
		};
		if ($this->Plug_Both_Response != "" && $this->Plug_From_Response != "" || $this->Plug_To_Response != ""){
			$this->BarColor = "warning";
		};
	}
}

class GeneralFunctions {

	function ListCountries (){
		include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
		$countryQuery ="SELECT Name, ISO FROM `Country`";
		$countryResult = mysqli_query($conn, $countryQuery);
		while ($row = mysqli_fetch_array($countryResult)) {
			echo '<option value="' . $row['ISO'] . '">' . $row['Name'] . '</option>';
		}
	}

	function ReturnDataType ($data){
		if ($data == "curr"){
			return "Currency";
		}
		if ($data == "lang"){
			return "Language";
		}
		if ($data == "embas"){
			return "Embassy";
		}
		if ($data == "legal"){
			return "Legal papers";
		}
	}

}

class SingleView {
	public $type;
	public $ID;
	public $Points;
	public $TableTitles;
	public $MainText;
	public $DataList;

	function GetType($data){
		if ($data == "curr"){
			$this->type = "Currency";
		}
		if ($data == "lang"){
			$this->type = "Language";
		}
		if ($data == "embas"){
			$this->type = "Embassy";
		}
		if ($data == "legal"){
			$this->type = "Legal papers";
		}
	}

	function SetTable (){
		if ($this->type == "Currency"){
			$this->TableTitles = "<td><h4>ID</h4></td><td><h4>Name</h4></td><td><h4>ISO Code</h4></td><td><h4>Votes</h4></td><td><h4>Official</h4></td><td><h4>Action</h4></td>";
		}
	}

	function GetEntryList ($country){
		include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
		if ($this->type == "Currency"){
			$ListQuery = "SELECT * FROM CurrencyVotes as CV join Currency as C WHERE CV.idCountry = " . $country . " and C.idCurrency = CV.idCurrency";
			$ListResult = mysqli_query ($conn, $ListQuery);
			while ($row = mysqli_fetch_array($ListResult)){
				if ($row["Official"] == "1"){
					$Official = "YES";
				}
				else {
					$Official = "NO";
				};
				echo "<tr><td>" . $row["idCurrencyVotes"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Code"] . "</td><td>" . $row["Points"] . "</td><td>" . $Official . '</td><td><button type="button" class="btn btn-default"><i class="fa fa-thumbs-up"></i></button><button type="button" class="btn btn-default"><i class="fa fa-thumbs-down"></i></button><button type="button" class="btn btn-default"><i class="fa fa-exclamation-circle"></i></button></td></tr>';
			}
			if (empty($row)){
				$this->MainText = "There is no data in the list. Be the first and add one below!";
			}
			else {
				$this->MainText = "Is the information above incorrect? Add the correct below!";
			}
		}	
	}

	function GetDataList (){
		if ($this->type == "Currency"){
			include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
			$DataQuery = "SELECT * FROM Currency";
			$DataResult = mysqli_query ($conn, $DataQuery);
			while ($row = mysqli_fetch_array($DataResult)){
				$DataList = $DataList . '<option value="' . $row["idCurrency"] . '">' . $row["Name"] . '(' . $row["Code"] . ')</option>';
			}
		}
	}
}




?>