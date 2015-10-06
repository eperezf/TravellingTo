<?php
	define('FromFile', TRUE);
	include 'config.php';

	//Relation Query + declaration BEGIN
  $Points = 0;
  $relationQuery = "SELECT * FROM `Relation` WHERE `Points` >= 1 ORDER BY `Points` DESC LIMIT 5";
  $relationResult = mysqli_query($conn, $relationQuery);
  //Relation Query + declaration BEGIN

  $countryQuery ="SELECT Name, ISO FROM `Country`";
	$countryResult = mysqli_query($conn, $countryQuery);
	$countryQueryTwo ="SELECT Name, ISO FROM `Country`";
	$countryResultTwo = mysqli_query($conn, $countryQueryTwo);

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
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/superhero/bootstrap.min.css" rel="stylesheet">
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
		    <li><a href="index.php">Index</a></li>
		    <li><a href="about.php">About Us</a></li>
		    <li><a href="disclaimer.php">Disclaimer</a></li>
		    <li><a href="/contribute">Contribute</a></li>
				<li><a href="contact.php">Contact Us</a></li>
		  </ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-12">
	  	<h1><p class="text-center">TravellingTo</p></h1>
		</div>
		<div class="col-md-12">
			<h4><p class="text-center">Trip planning done simple</p></h4>
		</div>
	</div>
	<div class="row">
		<form action="result.php" method="get">
			<div class="col-md-12 col-lg-6">
				<h4><p class="text-center">Select your country</p></h4>
				<select class="form-control" id="cfrom" name="cfrom">
					<?php while ($row = mysqli_fetch_array($countryResult)): ?>
						<option value="<?php echo $row['ISO']; ?>"><?php echo $row["Name"] ?></option>
					<?php endwhile; ?>
				</select>
					<br/>
					<br/>
				</div>
				<div class="col-md-12 col-lg-6">
					<h4><p class="text-center">Select your destination</p></h4>
					<select class="form-control" id="cto" name="cto">
						<?php while ($row = mysqli_fetch_array($countryResultTwo)): ?>
							<option value="<?php echo $row['ISO']; ?>"><?php echo $row["Name"] ?></option>
						<?php endwhile; ?>
					</select>
					<br/>
					<br/>
				</div>
				<div class="col-md-12 col-lg-12">
					<button type="submit" class="btn btn-success center-block">Submit</button>
				</div>
			</form>
		</div>
		<div class="row">
		</br>
			<div class="col-sm-12 col-lg-6 col-lg-offset-3">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title"><i class="fa fa-globe"></i> 5 Most searched trips</h3>
				  </div>
				  <div class="list-group">
				    <?php 
				    while ($row = mysqli_fetch_array($relationResult)) {
				    	echo '<a href="/result.php?cfrom=' . $row["Origin"] . '&cto=' . $row["Destination"] . '" class="list-group-item"><i class="fa fa-plane"></i> ';
				    	$countryFromQuery = "SELECT * FROM `Country` WHERE `ISO` LIKE'" . $row["Origin"] . "'";
				    	$countryFromResult = mysqli_query($conn, $countryFromQuery);
  						while($data = mysqli_fetch_array($countryFromResult)) {
  							echo "From " . $data["Name"];
  						};
  						$countryToQuery = "SELECT * FROM `Country` WHERE `ISO` LIKE'" . $row["Destination"] . "'";
				    	$countryToResult = mysqli_query($conn, $countryToQuery);
  						while($data = mysqli_fetch_array($countryToResult)) {
  							echo " to " . $data["Name"];
  						};
  						echo '<span class="badge">' . $row["Points"] . '</span></a>';
						  };
						  ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
