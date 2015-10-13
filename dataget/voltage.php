<?php 
if (defined('FromFile')){
//Voltaje secundario de origen
if ($Voltage_Secondary_From == 0){
	$Voltage_Secondary_From = "None";
}
else {

};

//Voltaje secundario de destino
if ($Voltage_Secondary_To == 0){
	$Voltage_Secondary_To = "None";
}
else{

};

//Rango de voltaje primario de origen
if ($Voltage_Primary_From >= 100 && $Voltage_Primary_From <= 150){
	$Voltage_Primary_Range_From = "L";
}
else {
	$Voltage_Primary_Range_From = "H";
};

//Rango de voltaje primario de destino
if ($Voltage_Primary_To >= 100 && $Voltage_Primary_To <= 150){
	$Voltage_Primary_Range_To = "L";
}
else {
	$Voltage_Primary_Range_To = "H";
};

//Rango de voltaje secundario de origen
if ($Voltage_Secondary_From != "None"){
	if ($Voltage_Secondary_From >= 100 && $Voltage_Secondary_From <= 150){

		$Voltage_Primary_Range_From = "L";
	}
	else {

		$Voltage_Secondary_Range_From = "H";
	};
}
else {
	$Voltage_Secondary_Range_From ="N";
};

//rango de voltaje secundario de destino
if ($Voltage_Secondary_To != "None"){
	if ($Voltage_Secondary_To >= 100 && $Voltage_Secondary_To <= 150){

		$Voltage_Primary_Range_To = "L";
	}
	else {

		$Voltage_Secondary_Range_To = "H";
	};
}
else {
	$Voltage_Secondary_Range_To ="N";
};

if ($Voltage_Secondary_Range_From == "N" && $Voltage_Secondary_Range_To == "N"){
	if ($Voltage_Primary_Range_From == "H" && $Voltage_Primary_Range_To == "H"){ 
	 $Voltage_Response= "Voltage in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V.</strong><br>Voltage in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V.</strong><br><strong> You don't need a voltage transformer.</strong> Check for plug compatibility below.";
	 $Voltage_Frame = "success";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Primary_Range_To == "L"){
		$Voltage_Response= "Voltage in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V.</strong><br>Voltage in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V.</strong><br><strong> You need a voltage transformer that increases the voltage output.</strong> Check for plug compatibility below.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Primary_Range_To == "H"){ 
		$Voltage_Response= "Voltage in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V.</strong><br>Voltage in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V.</strong><br><strong> You need a voltage transformer that reduces the voltage output.</strong> Check for plug compatibility below.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Primary_Range_To == "L"){
		$Voltage_Response= "Voltage in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V.</strong><br>Voltage in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V.</strong><br><strong> You don't need a voltage transformer.</strong> Check for plug compatibility below.";
		$Voltage_Frame = "success";
	}
}

elseif ($Voltage_Secondary_Range_From == "N" && $Voltage_Secondary_Range_To != "N"){ 
	if ($Voltage_Primary_Range_From == "H" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "H"){ 
		$Voltage_Response = "Voltage in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V.</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>You don't need a voltage transformer.</strong> Check for plug compatibility below.";
		$Voltage_Frame = "success";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "L"){ 
		$Voltage_Response = "Voltage in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V.</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output</strong> Check for plug compatibility below.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "H"){ 
		$Voltage_Response = "Voltage in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V.</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output</strong> Check for plug compatibility below.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "L"){ 
		$Voltage_Response = "Voltage in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V.</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>You need a voltage transformer that increases the voltage output.</strong> Check for plug compatibility below.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "H"){ 
		$Voltage_Response = "Voltage in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V.</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>You need a voltage transformer that reduces the voltage output.</strong> Check for plug compatibility below.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "L"){ 
		$Voltage_Response = "Voltage in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V.</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output</strong> Check for plug compatibility below.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "H"){ 
		$Voltage_Response = "Voltage in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V.</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output</strong> Check for plug compatibility below.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "L"){ 
		$Voltage_Response = "Voltage in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V.</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>You don't need a voltage transformer.</strong> Check for plug compatibility below.";
		$Voltage_Frame = "success";
	}

}

elseif ($Voltage_Secondary_Range_From != "N" && $Voltage_Secondary_Range_To == "N"){ 
	if ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "H" && $Voltage_Secondary_Range_To == "H"){ 
		$Voltage_Response = "HHHN. OK. Voltages in " . $Name_From . ": " . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V.<br> Voltage in " . $Name_To . ": " . $Voltage_Primary_To . "V.<br><strong>You don't need a voltage transformer.</strong> Check for plug compatibility below.";
		$Voltage_Frame = "success";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "L"){ 
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V.</strong><br> Voltage in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V.</strong><br><strong>You need a voltage transformer that increases the voltage output.</strong> Check for plug compatibility below.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "H"){ 
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V.</strong><br> Voltage in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output.</strong> Check for plug compatibility below.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "L"){ 
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V.</strong><br> Voltage in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output.</strong> Check for plug compatibility below.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "H"){ 
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V.</strong><br> Voltage in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output.</strong> Check for plug compatibility below.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "L"){ 
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V.</strong><br> Voltage in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output.</strong> Check for plug compatibility below.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "H"){ 
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V.</strong><br> Voltage in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V.</strong><br><strong>You need a voltage transformer that reduces the voltage output.</strong> Check for plug compatibility below.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "L"){ 
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V.</strong><br> Voltage in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V.</strong><br><strong>You don't need a voltage transformer.</strong> Check for plug compatibility below.";
		$Voltage_Frame = "success";
	}

}

elseif ($Voltage_Secondary_Range_From != "N" && $Voltage_Secondary_Range_To != "N"){
	if ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><st</strong>rong>You don't nee<strong>d a voltage tran</strong>sf<strong>ormer.</strong> Check for plu</strong>g compatibility below." ;
		$Voltage_Frame = "success";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>You need a voltage transformer that increases the voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>Check for specific voltages in places you are going to visit. You may need a transformer that reduces or increase voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>Check for specific voltages in places you are going to visit. You may need a transformer that reduces or increase voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>In some cases you will need a transformer that increases the voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>Check for specific voltages in places you are going to visit. You may need a transformer that reduces or increase voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>Check for specific voltages in places you are going to visit. You may need a transformer that reduces or increase voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>You need a voltage transformer that increases the voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>You need a voltage transformer that reduces the voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>In some cases you will need a transformer that reduces the voltage output.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "Voltages in <strong>" . $Name_From . "</strong>: <strong>" . $Voltage_Primary_From . "V and " . $Voltage_Secondary_From . "V</strong><br> Voltages in <strong>" . $Name_To . "</strong>: <strong>" . $Voltage_Primary_To . "V and " . $Voltage_Secondary_To . "V.</strong><br><strong>You don't need a voltage transformer.</strong> Check for plug compatibility below." ;
		$Voltage_Frame = "success";
	}
};
}
else {

};

?>