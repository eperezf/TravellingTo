<?php 

session_start();

define('FromFile', TRUE);

include($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes.php');

$Do = new Process;

$Action = $_POST["Action"];


if ($Action == "upvote"){
	$EntryID = $_POST["EntryID"];
	$DataType = $_POST["DataType"];
	$Do->Upvote($DataType, $EntryID);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
elseif ($Action == "downvote"){
	$EntryID = $_POST["EntryID"];
	$DataType = $_POST["DataType"];
	$Do->Downvote($DataType, $EntryID);
	header('Location: ' . $_SERVER['HTTP_REFERER']);

}
elseif ($Action == "report"){
	echo "So, we are reporting stuff... </br>";
	$EntryID = $_POST["EntryID"];
	$DataType = $_POST["DataType"];
	$Do->Report($EntryID);

}
elseif ($Action == "submitdata"){
	$CaptchaResponse = $_POST["g-recaptcha-response"];
	$DataType = $_POST["DataType"];
	$EntryID = $_POST["EntryID"];
	$idCountry = $_POST["idCountry"];

	$Do->AddSimple ($CaptchaResponse, $DataType, $EntryID, $idCountry);
	$Do->SetNotice ();
	header('Location: ' . $_SERVER['HTTP_REFERER']);

}

?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>