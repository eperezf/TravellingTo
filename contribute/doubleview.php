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
			<h1><p class="text-center">COMPARISON TITLE (DUMMY PAGE)</p></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<tr>
					<td>DATA 1</td>
					<td>DATA 2</td>
					<td>DATA 3</td>
					<td>DATA 4</td>
					<td>ACTION</td>
				</tr>
				<tr>
					<td>DEMO</td>
					<td>DEMO</td>
					<td>DEMO</td>
					<td>DEMO</td>
					<td>DEMO</td>
				</tr>
				<tr>
					<td>DEMO</td>
					<td>DEMO</td>
					<td>DEMO</td>
					<td>DEMO</td>
					<td>DEMO</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Is the list empty or you have a better suggestion? You can add one!</h2>
		</div>
		<div class="col-md-6 col-lg-4 col-sm-12">
			<form action="doublesubmit.php" method="POST">
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