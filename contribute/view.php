<?php
	define('FromFile', TRUE);
	include($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/classes.php');

	$General = new GeneralFunctions ();

	$Country = new Country($_GET["country"]);

	$View = new SingleView ();
	$View->GetType($_GET["data"]);
	$View->SetTable ();
	

?>

<html>
<head>
	<title>TravellingTo | Travel planning done simple</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/superhero/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <style type="text/css">
  	body { 
	   	background: url('/images/background.png'); 
	   	background-size: cover; 
	   	background-repeat: no-repeat; 
	   	background-attachment: fixed; 
	   	!important; 
   	}
   	.navbar-default { 
	   	background-color: rgba(78,93,108,0.35); 
	   	!important 
   	} 
   	.btn-success {
	   	background-color: rgba(92,184,92,0.5);
	   	!important 
   	}
   	.panel {
	   	background-color: rgba(78, 93, 108, 0);
	   	box-shadow: 0 3px 14px rgba(0,0,0,0.5);
	   	!important 
   	}
   	.list-group-item {
	   	background-color: rgba(78,93,108,0.5);
	   	!important 
   	}
	</style>
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
		    <li class="active"><a href="#">Contribute</a></li>
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
		<legend>Viewing the <?php echo strtolower($General->ReturnDataType ($_GET["data"])) ?> data of <?php echo $Country->Name ?></legend>
	</div>
	<div class="row">
		<table class="table table-bordered table-striped">
			<tr>
				<?php echo $View->TableTitles ?>
			</tr>
			<?php $View->GetEntryList ($Country->ID); ?>
		</table>
	</div>
	<div class="row">
		<p><h1><?php echo $View->MainText ?></h1></p>
		<legend></legend>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-12">
			<form>
	  		<div class="form-group">
	  			<label for="data">Select the correct <?php echo $General->ReturnDataType($_GET["data"]) ?> for <?php echo $Country->Name ?></label>
	  			<select class="form-control" id="data" name="data">
	  				<option>DATA!</option>
	  				<option>DATA!</option>
	  				<option>DATA!</option>
	  			</select>
	  		</div>
	  	</form>
	  </div>
	</div>
</div>

</body>
</html>