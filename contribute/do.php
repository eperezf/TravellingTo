<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<?php 
define('FromFile', TRUE);
include($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/classes.php');

$Do = new Process;

$Action = $_POST["Action"];

if ($Action == "upvote"){
	echo "So, we are upvoting stuff... </br>";
}
elseif ($Action == "downvote"){
	echo "So, we are downvoting stuff... </br>";

}
elseif ($Action == "report"){
	echo "So, we are reporting stuff... </br>";

}
elseif ($Action == "submitdata"){
	$CaptchaResponse = $_POST["g-recaptcha-response"];
	echo "So, we are submitting stuff... </br>";
	$Do->AddSimple ($CaptchaResponse);
	echo "The results are in! </br>";
	echo "The captcha resolution is: " . $Do->CaptchaResult . "</br>";


}

?>