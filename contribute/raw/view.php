<?php 
	define("FromFile", TRUE);
	include 'config.php';
	if ($_GET["data"]=="curr"){
		$dataQuery="SELECT Country.name as CountryName, Currency.Name as CurrencyName, Currency.Code as CurrencyCode, Points, Official FROM `CurrencyVotes` JOIN `Country` JOIN `Currency` WHERE CurrencyVotes.idCurrency = Currency.idCurrency AND CurrencyVotes.idCountry = Country.idCountry AND Country.ISO = '" . $_GET["cfrom"] . "'";
	}
	elseif ($_GET["data"]=="lang"){
		$dataQuery = "SELECT Country.Name as CountryName, Language.Name as LanguageName, Points, Official FROM `LanguageVotes` JOIN `Country` JOIN `Language` WHERE LanguageVotes.idLanguage = Language.idLanguage AND LanguageVotes.idCountry = Country.idCountry AND Country.ISO = '" . $_GET["cfrom"] . "'";
	}

?>

<html>
<head>
</head>
<body>
	<?php 
	$dataResult = mysqli_query($conn, $dataQuery);
	while ($row = mysqli_fetch_array($dataResult)){
		echo "Country: " . $row["CountryName"];
		echo " Code: " . $row["CurrencyCode"];
		echo " Currency Name: " . $row["CurrencyName"];
		echo " Points: " . $row["Points"];
		if ($row["Official"] == 1){
			echo " Official: YES";
		}
		else {
			echo " Official: NO";
		};
	};

	?>

</body>
</html>