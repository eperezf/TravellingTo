<html>
<head></head>
<body>
<?php 

define ("FromFile", TRUE);
include 'config.php';

$RelationQuery = "SELECT * FROM Relation WHERE Origin='" . $_GET["cfrom"] . "' AND Destination='" . $_GET["cto"] . "'";
$RelationResult = mysqli_query($conn, $RelationQuery);

echo $RelationQuery;
echo "</br>";

while ($row = mysqli_fetch_array($RelationResult)){
	echo "Relation ID: " . $row["idRelation"];
	$idRelation = $row["idRelation"];
	echo "</br>";
	echo "Origin Country Code: " . $row["Origin"];
	echo "</br>";
	echo "Destination Country Code: " . $row["Destination"];
}

?>
<p>Getting embassies (for testing):</p>
<?php 
	$EmbassyQuery = "SELECT * FROM EmbassyVotes WHERE idRelation='" . $idRelation . "'";
	$EmbassyResult = mysqli_query($conn, $EmbassyQuery);
	while ($row = mysqli_fetch_array($EmbassyResult)){
		echo "---NEW ENTRY---";
		echo "</br>";
		echo "Embassy Vote ID: " . $row["idEmbassyVotes"];
		echo "</br>";
		echo "Relation ID: " . $row["idRelation"];
		echo "</br>";
		echo "Embassy ID: " . $row["idEmbassy"];
		$idEmbassy = $row["idEmbassy"];
		echo "</br>";
		echo "Points: " . $row["Points"];
		echo "</br>";
		echo "Official status: " . $row["Official"];
		echo "</br><br>";
		$EmbassyDataQuery = "SELECT * FROM Embassy WHERE idEmbassy ='" . $idEmbassy . "'";
		$EmbassyDataResult = mysqli_query ($conn, $EmbassyDataQuery);
		while ($data = mysqli_fetch_array($EmbassyDataResult)){
			echo "Entry Information:";
			echo "</br>";
			echo "Type: " . $data["Type"];
			echo "</br>";
			echo "Address: " . $data["Address"];
			echo "</br>";
			echo "City: " . $data["City"];
			echo "</br>";
			echo "Phone: " . $data["Phone"];
			echo "</br>";
		}
		echo "---END OF ENTRY---";
		echo "</br>";
	}
?>
</body>
</html>