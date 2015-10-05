<?php

  //Check if country codes are empty or equal BEGIN
  if (empty($_GET)){
    header("Location: /raw");
    die();
  };
  if ($_GET['cfrom'] == $_GET['cto'] || $_GET['cfrom'] == "" || $_GET['cto'] == ""){
    header("Location: /raw");
    die();
  }
  echo "<p>--Country code checking--</p>";  //FOR DEBUG ONLY
  echo "<p>Country codes are different and not null</p>"; //FOR DEBUG ONLY
  echo "<p>-------------------------</p>"; //FOR DEBUG ONLY
  //Check if country codes are empty or equal END
  define('FromFile', TRUE);

  include 'config.php';

  //Relation Query + declaration BEGIN
  $relationQuery = "SELECT * FROM `Relation` WHERE `From` ='" . $_GET['cfrom'] ."' AND `To` ='" . $_GET['cto'] . "'";
  $relationResult = mysqli_query($conn, $relationQuery);
  while ($row = mysqli_fetch_array($relationResult)) {
    $id_Relation = $row["idRelation"];
    $From = $row["From"];
    $To = $row["To"];
  }
  //Relation Query + declaration BEGIN

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

  <html>
  <head>
  </head>
  <body>
    <p>--Relation information--</p>
    <p>Relation ID: <?php echo $id_Relation ?></p>
    <p>Travelling from <?php echo $From . "-->" . $To ?></p>
    <p>------------------------</p>
    <p>--Information about <?php echo $Name_From ?>--</p>
    <p>ID: <?php echo $id_From ?></p>
    <p>ISO Code: <?php echo $ISO_From ?></p>
    <p>Capital: <?php echo $Capital_From ?></p>
    <p>Phone Code: +<?php echo $Phone_Code_From ?></p>
    <p>Driving side: <?php echo $Driving_Side_From ?></p>
    <p>Primary Voltage: <?php echo $Voltage_Primary_From ?>V</p>
    <p>Secondary Voltage: <?php echo $Voltage_Secondary_From ?></p>
    <p>Plugs used: <?php echo $Plug_List_From ?></p>
    <p>------------------------</p>
    <p>--Information about <?php echo $Name_To ?>--</p>
    <p>ID: <?php echo $id_To ?></p>
    <p>ISO Code: <?php echo $ISO_To ?></p>
    <p>Capital: <?php echo $Capital_To ?></p>
    <p>Phone Code: +<?php echo $Phone_Code_To ?></p>
    <p>Driving side: <?php echo $Driving_Side_To ?></p>
    <p>Primary Voltage: <?php echo $Voltage_Primary_To ?>V</p>
    <p>Secondary Voltage: <?php echo $Voltage_Secondary_To ?></p>
    <p>Plugs used: <?php echo $Plug_List_To ?></p>
    <p>------------------------</p>
    <p>--Currency conversion information--</p>
    <p>--Currency from <?php echo $Name_From ?>--</p>
    <p>Country ID: <?php echo $id_From ?></p>
    <p>Currency ID: <?php echo $Currency_ID_From ?></p>
    <p>Currency Code: <?php echo $Currency_Code_From ?></p>
    <p>Currency Name: <?php echo $Currency_Name_From ?></p>
    <p>Official Currency: <?php echo $Currency_Official_From ?></p>
    <p>------------------------</p>
    <p>--Currency from <?php echo $Name_To ?>--</p>
    <p>Country ID: <?php echo $id_To ?></p>
    <p>Currency ID: <?php echo $Currency_ID_To ?></p>
    <p>Currency Code: <?php echo $Currency_Code_To ?></p>
    <p>Currency Name: <?php echo $Currency_Name_To ?></p>
    <p>Official Currency: <?php echo $Currency_Official_To ?></p>
    <p>------------------------</p>
    <p>--Currency Comparison--</p>
    <p><?php echo $Exchange_Response ?></p>
    <p>------------------------</p>
    <p>--Voltage Comparison--</p>
    <p><?php echo $Voltage_Response ?></p>
    <p>------------------------</p>
    <p>--Driving Side Comparison--</p>
    <p><?php echo $Driving_Response ?></p>
    <p>------------------------</p>
    <p>--Plug comparison--</p>
    <p><?php echo $Plug_Response ?></p>


  </body>

