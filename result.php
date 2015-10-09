<?php 

session_start(); 

	//Check if country codes are empty or equal BEGIN
  if (empty($_GET)){
    header("Location: /");
    die();
  };
  if ($_GET['cfrom'] == $_GET['cto'] || $_GET['cfrom'] == "" || $_GET['cto'] == ""){
    header("Location: /");
    die();
  }
	//Check if country codes are empty or equal END

  define('FromFile', TRUE);

  include 'config.php';

  //Relation Query + declaration BEGIN
  $Points = 0;
  $relationQuery = "SELECT * FROM `Relation` WHERE `Origin` ='" . $_GET['cfrom'] ."' AND `Destination` ='" . $_GET['cto'] . "'";
  $relationResult = mysqli_query($conn, $relationQuery);
  while ($row = mysqli_fetch_array($relationResult)) {
    $id_Relation = $row["idRelation"];
    $From = $row["Origin"];
    $To = $row["Destination"];
    $Points = $row["Points"];
  }
  //Relation Query + declaration BEGIN

  //Relation point assignation BEGIN
  $Points = $Points + 1;
  $PointsQuery = "UPDATE `Relation` SET `Points` =" . $Points . " WHERE `idRelation` =" . $id_Relation;
  if (mysqli_query($conn, $PointsQuery)){
  }
  else {
  	echo "ERROR";
  };
  //Relation point assignation END

  //Country From Query + declaration BEGIN
  $countryFromQuery = "SELECT * FROM `Country` WHERE `ISO` LIKE'" . $_GET['cfrom'] . "'";
  $countryFromResult = mysqli_query($conn, $countryFromQuery);
  while($row = mysqli_fetch_array($countryFromResult)) {
    $id_From                =   $row["idCountry"]; //DEBUG ONLY DO NOT USE
    $ISO_From               =   $row["ISO"];
    $Name_From              =   $row["Name"];
    $Capital_From           =   $row["Capital"];
    $Phone_Code_From        =   $row["Phone_Code"];
    $Driving_Side_From      =   $row["Driving_Side"];
    $Voltage_Primary_From   =   $row["Voltage_Primary"];
    $Voltage_Secondary_From =   $row["Voltage_Secondary"];
    $Plug_List_From         =   $row["Plug_List"];
  };
  //Country From Query + declaration END
  
  //Country To Query + declaration BEGIN
  $countryToQuery = "SELECT * FROM `Country` WHERE `ISO` LIKE'" . $_GET['cto'] . "'";
  $countryToResult = mysqli_query($conn, $countryToQuery);
  while($row = mysqli_fetch_array($countryToResult)) {
    $id_To                =   $row["idCountry"]; //DEBUG ONLY DO NOT USE
    $ISO_To               =   $row["ISO"];
    $Name_To              =   $row["Name"];
    $Capital_To           =   $row["Capital"];
    $Phone_Code_To        =   $row["Phone_Code"];
    $Driving_Side_To      =   $row["Driving_Side"];
    $Voltage_Primary_To   =   $row["Voltage_Primary"];
    $Voltage_Secondary_To =   $row["Voltage_Secondary"];
    $Plug_List_To         =   $row["Plug_List"];
  };
  //Country To Query + declaration END

  include 'dataget/currency.php';
  include 'dataget/currency_convert.php';
  include 'dataget/voltage.php';
  include 'dataget/driving.php';
  include 'dataget/plugs.php';

  ?>

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
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
		    <li><a href="index.php">Home</a></li>
		    <li><a href="about.php">About Us</a></li>
		    <li><a href="disclaimer.php">Disclaimer</a></li>
		    <li><a href="/contribute">Contribute</a></li>
				<li><a href="contact.php">Contact Us</a></li>
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
			<h1><p class="text-center"><small>Travelling from</small> <?php echo $Name_From ?> <small>to</small> <?php echo $Name_To ?></p></h1>
		</div>
	</div>
	<!--COUNTRY FROM GENERIC INFO-->
  <div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-home"></i> Information of <strong><?php echo $Name_From ?></strong></h3>
        </div>
        <div class="panel-body">
          <img src="http://placehold.it/300x200" class="img-responsive center-block"></br>
          <ul class="list-group">
          	<li class="list-group-item">Country code: <?php echo $ISO_From ?></li>
            <li class="list-group-item">Capital: <?php echo $Capital_From ?></li>
            <li class="list-group-item">Phone code: +<?php echo $Phone_Code_From ?></li>
            <li class="list-group-item">Currency: <?php echo $Currency_Name_From ?></li>
            <li class="list-group-item">Main language: Unavailable</li>
          </ul>
        </div>
      </div>
    </div>
    <!--COUNTRY FROM GENERIC INFO END-->

    <!--COUNTRY TO GENERIC INFO-->
    <div class="col-md-6 col-lg-6 col-sm-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-plane"></i> Information of <strong><?php echo $Name_To ?></strong></h3>
        </div>
        <div class="panel-body">
         <img src="http://placehold.it/300x200" class="img-responsive center-block"></br>
          <ul class="list-group">
          	<li class="list-group-item">Country code: <?php echo $ISO_To ?></li>
            <li class="list-group-item">Capital: <?php echo $Capital_To ?></li>
            <li class="list-group-item">Phone code: +<?php echo $Phone_Code_To ?></li>
            <li class="list-group-item">Currency: <?php echo $Currency_Name_To ?></li>
            <li class="list-group-item">Main language: Unavailable</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
    <!--COUNTRY TO GENERIC INFO END-->
    <!--COUNTRY LANGUAGE COMPARISON-->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-globe"></i> Language comparison between <?php echo $Name_From ?> and <?php echo $Name_To ?></h3>
        </div>
        <div class="panel-body">
          Coming Soon. Help us complete this information here: <a href="/contribute/view.php?data=lang&country=<?php echo $ISO_From ?>"><?php echo $Name_From ?></a> or <a href="/contribute/view.php?data=lang&country=<?php echo $ISO_To ?>"><?php echo $Name_To ?></a>
        </div>
      </div>
    </div>
  </div>
    <!--COUNTRY LANGUAGE COMPARISON END-->

    <!--COUNTRY MONEY COMPARISON-->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-<?php echo $Currency_Frame ?>">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-usd"></i> Currency comparison between <?php echo $Name_From ?> and <?php echo $Name_To ?></h3>
        </div>
        <div class="panel-body">
          <?php echo $Exchange_Response ?>
        </div>
      </div>
    </div>
  </div>
    <!--COUNTRY MONEY COMPARISON END-->

    <!--COUNTRY VOLTAGE COMPARISON-->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-<?php echo $Voltage_Frame ?>">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-bolt"></i> Voltage comparison between <?php echo $Name_From ?> and <?php echo $Name_To ?></h3>
        </div>
        <div class="panel-body">
        	<?php echo $Voltage_Response ?>
        </div>
      </div>
    </div>
  </div>
    <!--COUNTRY VOLTAGE COMPARISON END-->

    <!--COUNTRY PLUG COMPARISON-->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-<?php echo $Plug_Frame ?>">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-plug"></i> Plug comparison between <?php echo $Name_From ?> and <?php echo $Name_To ?></h3>
        </div>
        <div class="panel-body">
          <?php echo $Plug_Response ?>
        </div>
      </div>
    </div>
  </div>
    <!--COUNTRY PLUG COMPARISON END-->

    <!--COUNTRY ROAD COMPARISON-->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-<?php echo $Driving_Frame ?>">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-car"></i> Driving side comparsion between <?php echo $Name_From ?> and <?php echo $Name_To ?></h3>
        </div>
        <div class="panel-body">
          <?php echo $Driving_Response ?>
        </div>
      </div>
    </div>
  </div>
    <!--COUNTRY ROAD COMPARISON END-->

    <!--EMBASSY LISTING BEGIN-->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-university"></i> Embassies and consulates</h3>
        </div>
        <div class="panel-body">
          Coming soon. Help us complete this information <a href="/contribute/doubleview.php?data=embass&cfrom=<?php echo $ISO_From ?>&cto=<?php echo $ISO_To ?>">here</a>
        </div>
      </div>
    </div>
  </div>
    <!--EMBASSY LISTING END-->

    <!--LEGAL PAPERS BEGIN-->
    <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> Legal papers</h3>
        </div>
        <div class="panel-body">
          Coming soon. Help us complete this information <a href="/contribute/doubleview.php?data=legal&cfrom=<?php echo $ISO_From ?>&cto=<?php echo $ISO_To ?>">here</a>
        </div>
      </div>
    </div>
  </div>
    <!--LEGAL PAPERS END-->
	</div>
</div>
</body>
</html>