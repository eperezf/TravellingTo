<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<?php 

session_start();

define('FromFile', TRUE);

include($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes.php');

$Do = new Process;

$Action = $_POST["Action"];


if ($Action == "upvote"){
	echo "So, we are upvoting stuff... </br>";
	$EntryID = $_POST["EntryID"];
	$Do->Upvote($EntryID);
}
elseif ($Action == "downvote"){
	echo "So, we are downvoting stuff... </br>";
	$EntryID = $_POST["EntryID"];
	$Do->Downvote($EntryID);

}
elseif ($Action == "report"){
	echo "So, we are reporting stuff... </br>";
	$EntryID = $_POST["EntryID"];
	$Do->Report($EntryID);

}
elseif ($Action == "submitdata"){
	$CaptchaResponse = $_POST["g-recaptcha-response"];
	$DataType = $_POST["DataType"];
	$EntryID = $_POST["EntryID"];
	$idCountry = $_POST["idCountry"];

	echo "So, we are submitting stuff... </br>";
	$Do->AddSimple ($CaptchaResponse, $DataType, $EntryID, $idCountry);
	echo "The results are in! </br>";
	echo "The data type: " . $Do->DataType . "</br>"; 
	echo "The captcha resolution is: " . $Do->CaptchaResult . "</br>";
	echo "The ID of the selected entry is: " . $EntryID . "</br>";
	echo "Let's see if it's duplicated: " . $Do->Duplicate . "</br>";



}

?>