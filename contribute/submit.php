<?php

//Define stuff:
define("FromFile", TRUE);
session_start(); 
include 'config.php';
$URL = "https://www.google.com/recaptcha/api/siteverify";
$SECRET ="6Lek8w0TAAAAAPCMz2A8JgBSz9DgeuE67AlXeqoS";
$RESPONSE = $_POST["g-recaptcha-response"];
$DATA = array('secret' => "6Lek8w0TAAAAAPCMz2A8JgBSz9DgeuE67AlXeqoS", 'response' => $_POST["g-recaptcha-response"]);
$ch = curl_init();
$duplicate = FALSE;

//Set cURL data:
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$DATA);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Get reCAPTCHA response:
$response = curl_exec ($ch);
curl_close ($ch);
$responseJSON = json_decode($response);
if ($responseJSON->success == 1){
	$CaptchaOK = "OK";
	//echo "Captcha OK! </br>"; //DEBUG
}
else {
	$CaptchaOK = "ERROR";
	//echo "Captcha ERROR! </br>"; //DEBUG
	$_SESSION["NOTICE"] = "Captcha";
};

//Get the Country ID for adding purposes:
$countryQuery = "SELECT * FROM `Country` WHERE ISO ='" . $_SESSION["ISO"] . "'";
$countryResult = mysqli_query($conn, $countryQuery);
while ($row = mysqli_fetch_array($countryResult)){
	$idCountry = $row["idCountry"];
};

//If the data is a Currency:
if ($_SESSION["Data"]=="curr"){
	//echo "Data is Currency! </br>"; //DEBUG

	//Get the Currency ID for adding purposes:
	$currencyQuery = "SELECT * FROM `Currency` WHERE Name = '" . $_POST["name"] . "'";
	$currencyResult = mysqli_query($conn, $currencyQuery);
	while ($row = mysqli_fetch_array($currencyResult)){
		$idCurrency = $row["idCurrency"];
	};
	
	//Get if there's a currency already setted and if it's duplicate:
	$dataQuery="SELECT Country.name as CountryName, Currency.Name as CurrencyName, Currency.Code as CurrencyCode, Points, Official FROM `CurrencyVotes` JOIN `Country` JOIN `Currency` WHERE CurrencyVotes.idCurrency = Currency.idCurrency AND CurrencyVotes.idCountry = Country.idCountry AND Country.ISO = '" . $_SESSION["ISO"] . "'";
	$dataResult = mysqli_query($conn, $dataQuery);
	while ($row = mysqli_fetch_array($dataResult)){
		if ($row["CurrencyName"] == $_POST["name"]){
			$duplicate = TRUE;
			//echo "Entered currency is duplicate! </br>"; //DEBUG
			//Redirect to the viewer and POST and error:
			$_SESSION["NOTICE"] = "Duplicate";
		}
		else {
			$duplicate = FALSE;
			//echo "Entered currency is not duplicate! </br>"; //DEBUG
		};
	};

	//If the captcha response is OK and it's not a dupicate, do the query:
	if ($CaptchaOK == "OK" && $duplicate == FALSE){
		$insertQuery = "INSERT INTO `CurrencyVotes` (idCountry, idCurrency, Points, Official) VALUES (" . $idCountry . ", " . $idCurrency .  ", 0, 0)";
		mysqli_query($conn, $insertQuery);
		//echo "Both captcha and duplicate checking are OK. Query done! </br>"; //DEBUG
		$_SESSION["NOTICE"] == "Success";
	}
	else {
		//Redirect to the viewer and POST an error:
		//echo "Either the captcha was not OK or it was a duplicate. Query aborted! </br>"; //DEBUG
	};


}

//If the data is a Language:
elseif ($_SESSION["Data"]=="lang"){
	$dataQuery = "SELECT Country.Name as CountryName, Language.Name as LanguageName, Points, Official FROM `LanguageVotes` JOIN `Country` JOIN `Language` WHERE LanguageVotes.idLanguage = Language.idLanguage AND LanguageVotes.idCountry = Country.idCountry AND Country.ISO = '" . $_SESSION["ISO"] . "'";
};


//If everything was OK, it will redirect to the previous page and say it was OK:
//echo "System finished!</br>";//DEBUG
//echo '<a href="view.php?data=' . $_SESSION["Data"] . '&country=' . $_SESSION["ISO"] . '">Return to previous page</a>'; //DEBUG
$redirect = 'Location: /contribute/view.php?data=' . $_SESSION["Data"] . '&country=' . $_SESSION["ISO"];
$_SESSION["Data"] = "";
$_SESSION["ISO"] = "";

header($redirect);
?>




