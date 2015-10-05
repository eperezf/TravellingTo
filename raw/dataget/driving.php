<?php 
if (defined('FromFile')){	
	if ($Driving_Side_From == $Driving_Side_To){
		$Driving_Response = "Both " . $Name_From . " and " . $Name_To . " driving sides are " . $Driving_Side_From . ".";  
	}
	else {
		$Driving_Response = "Be careful! In " . $Name_From . " the driving side is " . strtolower($Driving_Side_From) . " meanwhile in " . $Name_To . " the driving side is " . strtolower($Driving_Side_To) . ".";
	}
}
else {
	
};
?>