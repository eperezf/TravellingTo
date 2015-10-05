<?php
session_start(); 

define("FromFile", TRUE);
include 'config.php';
$countryQuery = "SELECT Name FROM Country WHERE ISO ='" . $_GET["country"] . "'";
$countryResult = mysqli_query($conn, $countryQuery);
while ($row = mysqli_fetch_array($countryResult)){
	$Country_Name = $row["Name"];
};
$_SESSION["ISO"] = $_GET["country"];

if ($_GET["data"]=="curr"){
	$dataQuery="SELECT Country.name as CountryName, Currency.Name as CurrencyName, Currency.Code as CurrencyCode, Points, Official FROM `CurrencyVotes` JOIN `Country` JOIN `Currency` WHERE CurrencyVotes.idCurrency = Currency.idCurrency AND CurrencyVotes.idCountry = Country.idCountry AND Country.ISO = '" . $_GET["country"] . "'";
	$Data = "currency";
	$formQuery="SELECT Name from `Currency` ORDER BY Name ASC";
	$_SESSION["Data"] = "curr";
}
elseif ($_GET["data"]=="lang"){
	$dataQuery = "SELECT Country.Name as CountryName, Language.Name as LanguageName, Points, Official FROM `LanguageVotes` JOIN `Country` JOIN `Language` WHERE LanguageVotes.idLanguage = Language.idLanguage AND LanguageVotes.idCountry = Country.idCountry AND Country.ISO = '" . $_GET["country"] . "'";
	$Data = "language";
	$formQuery="SELECT Name from `Language` ORDER BY Name ASC";
	$_SESSION["Data"] = "lang";
};
$dataResult = mysqli_query($conn, $dataQuery);
$formResult = mysqli_query($conn, $formQuery);

?>
<html>
<head>
	<title>TravellingTo | Trip planning done simple</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/darkly/bootstrap.min.css" rel="stylesheet">
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		    <span class="sr-only">Toggle navigation</span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">TravellingTo</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
		    <li><a href="/index.php">Index</a></li>
		    <li><a href="/about.php">About Us</a></li>
		    <li><a href="/disclaimer.php">Disclaimer</a></li>
		    <li><a href="/contribute">Contribute</a></li>
				<li><a href="/contact.php">Contact Us</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<div class="container">
	<?php 
		if (isset($_SESSION["NOTICE"])){
			if ($_SESSION["NOTICE"] == "Captcha"){
				echo '<div class="row"><div class="col-md-12"><div class="alert alert-danger" role="alert">';
				echo "Please resolve the Captcha";
				echo '</div></div></div>';
			}
			elseif ($_SESSION["NOTICE"] == "Duplicate"){
				echo '<div class="row"><div class="col-md-12"><div class="alert alert-danger" role="alert">';
				echo "The information you entered is duplicate";
				echo '</div></div></div>';
			}
			elseif ($_SESSION["NOTICE"] == "Success"){
				echo '<div class="row"><div class="col-md-12"><div class="alert alert-success" role="alert">';
				echo "Information added succesfully!";
				echo '</div></div></div>';
			};
		};
		$_SESSION["NOTICE"] = "None";
	?>
	<div class="row">
		<div class="col-md-12">
			<h1><p class="text-center"><small>Viewing</small> <?php echo $Data ?> <small>of</small> <?php echo $Country_Name ?></p></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<?php if ($Data == "currency"): ?>
				<tr>
					<td>Name</td>
					<td>ISO Code</td>
					<td>Points</td>
					<td>Official</td>
					<td>Action</td>
				</tr>
				<?php while ($row= mysqli_fetch_array($dataResult)): ?>
				<tr>
					<td><?php echo $row["CurrencyName"] ?></td>
					<td><?php echo $row["CurrencyCode"] ?></td>
					<td><?php echo $row["Points"] ?></td>
					<td><?php if ($row["Official"] == 1){ echo "Yes";} else {echo "No";}; ?></td>
					<td>ACTION</td>
				</tr>

				<?php 
					endwhile;
					endif;
					if ($Data == "language"):
				 ?>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Points</td>
					<td>Official</td>
					<td>Action</td>
				</tr>
				<tr>
					<td>DEMO</td>
					<td>DEMO</td>
					<td>DEMO</td>
					<td>DEMO</td>
					<td>DEMO</td>
				</tr>
				<?php endif ?>

			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Is the list empty or you have a better suggestion? You can add one!</h2>
		</div>
		<div class="col-md-6 col-lg-4 col-sm-12">
			<form action="submit.php" method="POST">
				<div class="form-group">
    			<label for="name">Name</label>
    			<select class="form-control" id="name" name="name">
    				<?php while ($row = mysqli_fetch_array($formResult)): ?>
    				<option value="<?php echo $row['Name'] ?>"><?php echo $row["Name"] ?></option>
    				<?php endwhile ?>
  				</select>
  			</div>
  			<div class="form-group">
					<div class="g-recaptcha" data-sitekey="6Lek8w0TAAAAAOSBqOkBWz73ttyF1nuArJDcLM93"></div>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</div>