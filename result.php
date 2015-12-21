<?php

session_start(); 
//Check if country codes are empty or equal BEGIN
if (empty($_GET) || $_GET['cfrom'] == $_GET['cto'] || $_GET['cfrom'] == "" || $_GET['cto'] == ""){
  header("Location: /");
  die();
};

//Check if country codes are empty or equal END

define('FromFile', TRUE);

require_once('classes.php');

$From = new Country($_GET["cfrom"]);
$To = new Country ($_GET["cto"]);

$Relation = new Relation ($From->ISO, $To->ISO);
$Relation->AddPoints();

$Currency = new Currency ($From->CurrencyCode, $To->CurrencyCode, $From->CurrencyName, $To->CurrencyName);
$Currency->GetStatus ();
$Currency->GetBarColor ();
$Currency->GetResponse ($From->Name, $To->Name);

$Voltage = new Voltage ($From->VoltagePrimary, $From->VoltageSecondary, $To->VoltagePrimary, $To->VoltageSecondary);
$Voltage->GetRange ();
$Voltage->GetBarColor ();
$Voltage->GetResponse ($From->Name, $To->Name);

$Driving = new Driving ($From->DrivingSide, $To->DrivingSide);
$Driving->GetBarColor ();
$Driving->GetResponse ($From->Name, $To->Name);

$Plugs = new Plugs ();
$Plugs->GetArray ($From->PlugList, $To->PlugList);
$Plugs->GetResponse ();
$Plugs->GetBarColor ();



?>
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
  <style type="text/css">
    body { 
      background: url('images/background.png'); 
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
      background-color: rgba(78, 93, 108, 0.5);
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
			<h1><p class="text-center"><small>Travelling from</small> <?php echo $From->Name ?> <small>to</small> <?php echo $To->Name ?></p></h1>
		</div>
	</div>
	<!--COUNTRY FROM GENERIC INFO-->
  <div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-home"></i> Information of <strong><?php echo $From->Name ?></strong></h3>
        </div>
        <div class="panel-body">
          <img src="http://www.geonames.org/flags/x/<?php echo strtolower($From->ISO) ?>.gif" class="img-responsive center-block" style="width: auto; height: 8em"></br>
          <ul class="list-group">
          	<li class="list-group-item">Country code: <?php echo $From->ISO ?></li>
            <li class="list-group-item">Capital: <?php echo $From->Capital ?></li>
            <li class="list-group-item">Phone code: +<?php echo $From->PhoneCode ?></li>
            <li class="list-group-item">Currency: <?php echo $From->CurrencyName . " (" . $From->CurrencyOfficial . ")" ?></li>
            <li class="list-group-item">Main language: <?php echo $From->LanguageName ?></li>
          </ul>
        </div>
      </div>
    </div>
    <!--COUNTRY FROM GENERIC INFO END-->

    <!--COUNTRY TO GENERIC INFO-->
    <div class="col-md-6 col-lg-6 col-sm-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-plane"></i> Information of <strong><?php echo $To->Name ?></strong></h3>
        </div>
        <div class="panel-body">
         <img src="http://www.geonames.org/flags/x/<?php echo strtolower($To->ISO) ?>.gif" class="img-responsive center-block" style="width: auto; height: 8em"></br>
          <ul class="list-group">
          	<li class="list-group-item">Country code: <?php echo $To->ISO ?></li>
            <li class="list-group-item">Capital: <?php echo $To->Capital ?></li>
            <li class="list-group-item">Phone code: +<?php echo $To->PhoneCode ?></li>
            <li class="list-group-item">Currency: <?php echo $To->CurrencyName . " (" . $To->CurrencyOfficial . ")" ?></li>
            <li class="list-group-item">Main language: <?php echo $To->LanguageName ?></li>
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
          <h3 class="panel-title"><i class="fa fa-globe"></i> Language comparison between <?php echo $From->Name ?> and <?php echo $To->Name ?></h3>
        </div>
        <div class="panel-body">
          Coming Soon. Help us complete this information here: <a href="/contribute/view.php?data=lang&country=<?php echo $From->ISO ?>"><?php echo $From->Name ?></a> or <a href="/contribute/view.php?data=lang&country=<?php echo $To->ISO ?>"><?php echo $To->Name ?></a>
        </div>
      </div>
    </div>
  </div>
    <!--COUNTRY LANGUAGE COMPARISON END-->

    <!--COUNTRY MONEY COMPARISON-->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-<?php echo $Currency->BarColor ?>">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-usd"></i> Currency comparison between <?php echo $From->Name ?> and <?php echo $To->Name ?></h3>
        </div>
        <div class="panel-body">
          <?php echo $Currency->Response ?>
        </div>
      </div>
    </div>
  </div>
    <!--COUNTRY MONEY COMPARISON END-->

    <!--COUNTRY VOLTAGE COMPARISON-->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-<?php echo $Voltage->BarColor ?>">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-bolt"></i> Voltage comparison between <?php echo $From->Name ?> and <?php echo $To->Name ?></h3>
        </div>
        <div class="panel-body">
        	<?php echo $Voltage->Response ?>
        </div>
      </div>
    </div>
  </div>
    <!--COUNTRY VOLTAGE COMPARISON END-->

    <!--COUNTRY PLUG COMPARISON-->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-<?php echo $Plugs->BarColor ?>">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-plug"></i> Plug comparison between <?php echo $From->Name ?> and <?php echo $To->Name ?></h3>
        </div>
        <div class="panel-body">
          <?php if ($Plugs->Plug_Both_Response != ""): ?>
            <div class="row">
              <div class="col-md-12">
                <h4>Plugs used in both countries:</h4>
              </div>
            </div>
            <div class="row">
              <?php echo $Plugs->Plug_Both_Response ?>
            </div>
          <?php endif; ?>
          <?php if ($Plugs->Plug_From_Response != ""): ?>
            <div class="row">
              <div class="col-md-12">
                <h4>Plugs used only in <?php echo $From->Name ?>:</h4>
              </div>
            </div>
            <div class="row">
              <?php echo $Plugs->Plug_From_Response ?>
            </div>
          <?php endif; ?>
          <?php if ($Plugs->Plug_To_Response != ""): ?>
            <div class="row">
              <div class="col-md-12">
                <h4>Plugs used only in <?php echo $To->Name ?>:</h4>
              </div>
            </div>
            <div class="row">
              <?php echo $Plugs->Plug_To_Response ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
    <!--COUNTRY PLUG COMPARISON END-->

    <!--COUNTRY ROAD COMPARISON-->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-<?php echo $Driving->BarColor ?>">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-car"></i> Driving side comparsion between <?php echo $From->Name ?> and <?php echo $To->Name ?></h3>
        </div>
        <div class="panel-body">
          <?php echo $Driving->Response ?>
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
          Coming soon. Help us complete this information <a href="/contribute/doubleview.php?data=embass&cfrom=<?php echo $From->ISO ?>&cto=<?php echo $To->ISO ?>">here</a>
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
          Coming soon. Help us complete this information <a href="/contribute/doubleview.php?data=legal&cfrom=<?php echo $From->ISO ?>&cto=<?php echo $To->ISO ?>">here</a>
        </div>
      </div>
    </div>
  </div>
    <!--LEGAL PAPERS END-->
	</div>
</div>
</body>
</html>