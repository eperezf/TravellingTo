<?php

session_start(); 
define("FromFile", TRUE);
include 'config.php';

$countryQuery ="SELECT Name, ISO FROM `Country`";
$countryResult = mysqli_query($conn, $countryQuery)

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
		    <li><a href="/index.php">Home</a></li>
		    <li><a href="/about.php">About Us</a></li>
		    <li><a href="/disclaimer.php">Disclaimer</a></li>
		    <li><a href="/contribute">Contribute</a></li>
				<li><a href="/contact.php">Contact Us</a></li>
		  </ul>
		  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="navbar-form navbar-right">
        <div class="form-group">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="SH7D727QBBHWE">
          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!">
          <img alt="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
        </div>
      </form>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
	  		<h1>Contribute</h1>
	  		<p>We have more than 200 countries but we are missing some information about them. Help us complete it!</p>
			</div>
		</div>
		<div class="col-md-12">
			<form action="view.php" method="get">
			<div class="col-md-12 col-lg-6">
				<h4><p class="text-center">Select Information</p></h4>
				<select class="form-control" id="data" name="data">
						<option value="curr">Currency</option>
						<option value="lang">Language</option>
					</select>
					<br/>
					<br/>
				</div>
				<div class="col-md-12 col-lg-6">
					<h4><p class="text-center">Select country</p></h4>
					<select class="form-control" id="country" name="country">
						<?php while ($row = mysqli_fetch_array($countryResult)): ?>
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
	</div>
</div>
</body>
</html>