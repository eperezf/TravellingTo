<?php 
if (defined('FromFile')){
//Voltaje secundario de origen
if ($Voltage_Secondary_From == 0){
	$Voltage_Secondary_From = "None";
}
else {
	$Voltage_Secondary_From = $Voltage_Secondary_From . "V";
};

//Voltaje secundario de destino
if ($Voltage_Secondary_To == 0){
	$Voltage_Secondary_To = "None";
}
else{
	$Voltage_Secondary_To = $Voltage_Secondary_To . "V";
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
	 $Voltage_Response= "HNHN. OK.";
	 $Voltage_Frame = "success";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Primary_Range_To == "L"){
		$Voltage_Response= "HNLN. Step Down.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Primary_Range_To == "H"){ 
		$Voltage_Response= "LNHN. Step Up.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Primary_Range_To == "L"){
		$Voltage_Response= "LNLN. OK.";
		$Voltage_Frame = "success";
	}
}

elseif ($Voltage_Secondary_Range_From == "N" && $Voltage_Secondary_Range_To != "N"){ 
	if ($Voltage_Primary_Range_From == "H" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "H"){ 
		$Voltage_Response = "HNHH. OK";
		$Voltage_Frame = "success";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "L"){ 
		$Voltage_Response = "HNHL. Sometimes Step Down.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "H"){ 
		$Voltage_Response = "HNLH. Sometimes Step Down.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "L"){ 
		$Voltage_Response = "HNLL. Step Down.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "H"){ 
		$Voltage_Response = "LNHH. Step Up.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "L"){ 
		$Voltage_Response = "LNHL, Sometimes Step Up.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "H"){ 
		$Voltage_Response = "LNLH, Sometimes Step Up.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "L"){ 
		$Voltage_Response = "LNLL. OK";
		$Voltage_Frame = "success";
	}

}

elseif ($Voltage_Secondary_Range_From != "N" && $Voltage_Secondary_Range_To == "N"){ 
	if ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "H" && $Voltage_Secondary_Range_To == "H"){ 
		$Voltage_Response = "HHHN. OK.";
		$Voltage_Frame = "success";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "L"){ 
		$Voltage_Response = "HHLN. Step Down.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "H"){ 
		$Voltage_Response = "HLHN. Sometimes Step Up.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "L"){ 
		$Voltage_Response = "HLLN. Sometimes Step Down.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "H"){ 
		$Voltage_Response = "LHHN. Sometimes Step Up.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "L"){ 
		$Voltage_Response = "LHLN. Sometimes Step Down.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "H"){ 
		$Voltage_Response = "LLHN. Step Up.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "L"){ 
		$Voltage_Response = "LLLN. OK.";
		$Voltage_Frame = "success";
	}

}

elseif ($Voltage_Secondary_Range_From != "N" && $Voltage_Secondary_Range_To != "N"){
	if ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "HHHH. OK.";
		$Voltage_Frame = "success";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "HHHL. Sometimes Step Down.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "HHLH. Sometimes Step Down.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "HHLL. Step Down.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "HLHH. Sometimes Step Up.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "HLHL. Crosscheck.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "HLLH. Crosscheck.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "H" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "HLLL. Sometimes Step Down.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "LHHH. Sometimes Step Up.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "LHHL. Crosscheck";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "LHLH. Crosscheck";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "H" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "LHLL. Sometimes Step Down.";
		$Voltage_Frame = "warning";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "LLHH. Step Up.";
		$Voltage_Frame="danger";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "H" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "LLHL. Sometimes Step Up.";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "H"){
		$Voltage_Response = "LLLH. Sometimes Step Up.";
	}
	elseif ($Voltage_Primary_Range_From == "L" && $Voltage_Secondary_Range_From == "L" && $Voltage_Primary_Range_To == "L" && $Voltage_Secondary_Range_To == "L"){
		$Voltage_Response = "LLLL. OK.";
		$Voltage_Frame = "success";
	}
};
}
else {

};

?>