<?php
if (defined('FromFile')){
	//Connection configuration BEGIN
  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "TravellingTo";
  $conn = new mysqli($server, $user, $password, $database);
  $nameFrom = "";
  $nameTo = "";
  //Connection configuration END
}
?>