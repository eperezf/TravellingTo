<?php 

$Plug_Amount_From = 0;
$Plug_Amount_To =0;
$A_Type_From = FALSE;
$B_Type_From = FALSE;
$C_Type_From = FALSE;
$D_Type_From = FALSE;
$E_Type_From = FALSE;
$F_Type_From = FALSE;
$G_Type_From = FALSE;
$H_Type_From = FALSE;
$I_Type_From = FALSE;
$J_Type_From = FALSE;
$K_Type_From = FALSE;
$L_Type_From = FALSE;
$M_Type_From = FALSE;
$N_Type_From = FALSE;
$O_Type_From = FALSE;
$A_Type_To = FALSE;
$B_Type_To = FALSE;
$C_Type_To = FALSE;
$D_Type_To = FALSE;
$E_Type_To = FALSE;
$F_Type_To = FALSE;
$G_Type_To = FALSE;
$H_Type_To = FALSE;
$I_Type_To = FALSE;
$J_Type_To = FALSE;
$K_Type_To = FALSE;
$L_Type_To = FALSE;
$M_Type_To = FALSE;
$N_Type_To = FALSE;
$O_Type_To = FALSE;

$List_Both = "";
$List_From = "";
$List_To = "";
$Plug_Response = "";
$Plug_Both_Response = "";
$Plug_From_Response = "";
$Plug_To_Response = "";

$Plug_Array_From =explode(", ", $Plug_List_From);
foreach($Plug_Array_From As $PlugArray){
	$Plug_Amount_From = $Plug_Amount_From + 1;
};

$Plug_Array_To =explode(", ", $Plug_List_To);
foreach($Plug_Array_To As $PlugArray){
	$Plug_Amount_To = $Plug_Amount_To + 1;
};


foreach ($Plug_Array_From as $Plug_Array) {
	if ($Plug_Array == "A"){
		$A_Type_From = TRUE;
		//echo "FROM HAS A</br>";	
	}
	elseif ($Plug_Array == "B") {
		$B_Type_From = TRUE;
		//echo "FROM HAS B</br>";	
	}
	elseif ($Plug_Array == "C") {
		$C_Type_From = TRUE;
		//echo "FROM HAS C</br>";	
	}
	elseif ($Plug_Array == "D") {
		$D_Type_From = TRUE;
		//echo "FROM HAS D</br>";	
	}
	elseif ($Plug_Array == "E") {
		$E_Type_From = TRUE;
		//echo "FROM HAS E</br>";	
	}
	elseif ($Plug_Array == "F") {
		$F_Type_From = TRUE;
		//echo "FROM HAS F</br>";	
	}
	elseif ($Plug_Array == "G") {
		$G_Type_From = TRUE;
		//echo "FROM HAS G</br>";	
	}
	elseif ($Plug_Array == "H") {
		$H_Type_From = TRUE;
		//echo "FROM HAS H</br>";	
	}
	elseif ($Plug_Array == "I") {
		$I_Type_From = TRUE;
		//echo "FROM HAS I</br>";	
	}
	elseif ($Plug_Array == "J") {
		$J_Type_From = TRUE;
		//echo "FROM HAS J</br>";	
	}
	elseif ($Plug_Array == "K") {
		$K_Type_From = TRUE;
		//echo "FROM HAS K</br>";	
	}
	elseif ($Plug_Array == "L") {
		$L_Type_From = TRUE;
		//echo "FROM HAS L</br>";	
	}
	elseif ($Plug_Array == "M") {
		$M_Type_From = TRUE;
		//echo "FROM HAS M</br>";	
	}
	elseif ($Plug_Array == "N") {
		$N_Type_From = TRUE;
		//echo "FROM HAS N</br>";	
	}
	elseif ($Plug_Array == "O") {
		$O_Type_From = TRUE;
		//echo "FROM HAS O</br>";	
	};
};

foreach ($Plug_Array_To as $Plug_Array) {
	if ($Plug_Array == "A"){
		$A_Type_To = TRUE;
		//echo "TO HAS A</br>";	
	}
	elseif ($Plug_Array == "B") {
		$B_Type_To = TRUE;
		//echo "TO HAS B</br>";	
	}
	elseif ($Plug_Array == "C") {
		$C_Type_To = TRUE;
		//echo "TO HAS C</br>";	
	}
	elseif ($Plug_Array == "D") {
		$D_Type_To = TRUE;
		//echo "TO HAS D</br>";	
	}
	elseif ($Plug_Array == "E") {
		$E_Type_To = TRUE;
		//echo "TO HAS E</br>";	
	}
	elseif ($Plug_Array == "F") {
		$F_Type_To = TRUE;
		//echo "TO HAS F</br>";	
	}
	elseif ($Plug_Array == "G") {
		$G_Type_To = TRUE;
		//echo "TO HAS G</br>";	
	}
	elseif ($Plug_Array == "H") {
		$H_Type_To = TRUE;
		//echo "TO HAS H</br>";	
	}
	elseif ($Plug_Array == "I") {
		$I_Type_To = TRUE;
		//echo "TO HAS I</br>";	
	}
	elseif ($Plug_Array == "J") {
		$J_Type_To = TRUE;
		//echo "TO HAS J</br>";	
	}
	elseif ($Plug_Array == "K") {
		$K_Type_To = TRUE;
		//echo "TO HAS K</br>";	
	}
	elseif ($Plug_Array == "L") {
		$L_Type_To = TRUE;
		//echo "TO HAS L</br>";	
	}
	elseif ($Plug_Array == "M") {
		$M_Type_To = TRUE;
		//echo "TO HAS M</br>";	
	}
	elseif ($Plug_Array == "N") {
		$N_Type_To = TRUE;
		//echo "TO HAS N</br>";	
	}
	elseif ($Plug_Array == "O") {
		$O_Type_To = TRUE;
		//echo "TO HAS O</br>";	
	};
};
//Both responses
if ($A_Type_From == TRUE && $A_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/A.png"><div class="caption"><h4>A type</h4></div></div></div>';
	//echo "BOTH HAVE A</br>";
};
if ($B_Type_From == TRUE && $B_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/B.png"><div class="caption"><h4>B type</h4></div></div></div>';
	//echo "BOTH HAVE B</br>";
};
if ($C_Type_From == TRUE && $C_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/C.png"><div class="caption"><h4>C type</h4></div></div></div>';
	//echo "BOTH HAVE C</br>";
};
if ($D_Type_From == TRUE && $D_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/D.png"><div class="caption"><h4>D type</h4></div></div></div>';
	//echo "BOTH HAVE D</br>";
};
if ($E_Type_From == TRUE && $E_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/E.png"><div class="caption"><h4>E type</h4></div></div></div>';
	//echo "BOTH HAVE E</br>";
};
if ($F_Type_From == TRUE && $F_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/F.png"><div class="caption"><h4>F type</h4></div></div></div>';
	//echo "BOTH HAVE F</br>";
};
if ($G_Type_From == TRUE && $G_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/G.png"><div class="caption"><h4>G type</h4></div></div></div>';
	//echo "BOTH HAVE G</br>";
};
if ($H_Type_From == TRUE && $H_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/H.png"><div class="caption"><h4>H type</h4></div></div></div>';
	//echo "BOTH HAVE H</br>";
};
if ($I_Type_From == TRUE && $I_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/I.png"><div class="caption"><h4>I type</h4></div></div></div>';
	//echo "BOTH HAVE I</br>";
};
if ($J_Type_From == TRUE && $J_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/J.png"><div class="caption"><h4>J type</h4></div></div></div>';
	//echo "BOTH HAVE J</br>";
};
if ($K_Type_From == TRUE && $K_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/K.png"><div class="caption"><h4>K type</h4></div></div></div>';
	//echo "BOTH HAVE K</br>";
};
if ($L_Type_From == TRUE && $L_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/L.png"><div class="caption"><h4>L type</h4></div></div></div>';
	//echo "BOTH HAVE L</br>";
};
if ($M_Type_From == TRUE && $M_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/M.png"><div class="caption"><h4>M type</h4></div></div></div>';
	//echo "BOTH HAVE M</br>";
};
if ($N_Type_From == TRUE && $N_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/N.png"><div class="caption"><h4>N type</h4></div></div></div>';
	//echo "BOTH HAVE N</br>";
};
if ($O_Type_From == TRUE && $O_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/O.png"><div class="caption"><h4>O type</h4></div></div></div>';
	//echo "BOTH HAVE O</br>";
};
//From responses
if ($A_Type_From == TRUE && $A_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/A.png"><div class="caption"><h4>A type</h4></div></div></div>';
	//echo "ONLY FROM HAS A</br>";
};
if ($B_Type_From == TRUE && $B_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/B.png"><div class="caption"><h4>B type</h4></div></div></div>';
	//echo "ONLY FROM HAS B</br>";
};
if ($C_Type_From == TRUE && $C_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/C.png"><div class="caption"><h4>C type</h4></div></div></div>';
	//echo "ONLY FROM HAS C</br>";
};
if ($D_Type_From == TRUE && $D_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/D.png"><div class="caption"><h4>D type</h4></div></div></div>';
	//echo "ONLY FROM HAS D</br>";
};
if ($E_Type_From == TRUE && $E_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/E.png"><div class="caption"><h4>E type</h4></div></div></div>';
	//echo "ONLY FROM HAS E</br>";
};
if ($F_Type_From == TRUE && $F_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/F.png"><div class="caption"><h4>F type</h4></div></div></div>';
	//echo "ONLY FROM HAS F</br>";
};
if ($G_Type_From == TRUE && $G_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/G.png"><div class="caption"><h4>G type</h4></div></div></div>';
	//echo "ONLY FROM HAS G</br>";
};
if ($H_Type_From == TRUE && $H_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/H.png"><div class="caption"><h4>H type</h4></div></div></div>';
	//echo "ONLY FROM HAS H</br>";
};
if ($I_Type_From == TRUE && $I_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/I.png"><div class="caption"><h4>I type</h4></div></div></div>';
	//echo "ONLY FROM HAS I</br>";
};
if ($J_Type_From == TRUE && $J_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/J.png"><div class="caption"><h4>J type</h4></div></div></div>';
	//echo "ONLY FROM HAS J</br>";
};
if ($K_Type_From == TRUE && $K_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/K.png"><div class="caption"><h4>K type</h4></div></div></div>';
	//echo "ONLY FROM HAS K</br>";
};
if ($L_Type_From == TRUE && $L_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/L.png"><div class="caption"><h4>L type</h4></div></div></div>';
	//echo "ONLY FROM HAS L</br>";
};
if ($M_Type_From == TRUE && $M_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/M.png"><div class="caption"><h4>M type</h4></div></div></div>';
	//echo "ONLY FROM HAS M</br>";
};
if ($N_Type_From == TRUE && $N_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/N.png"><div class="caption"><h4>N type</h4></div></div></div>';
	//echo "ONLY FROM HAS N</br>";
};
if ($O_Type_From == TRUE && $O_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/O.png"><div class="caption"><h4>O type</h4></div></div></div>';
	//echo "ONLY FROM HAS O</br>";
};
//TO responses
if ($A_Type_From == FALSE && $A_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/A.png"><div class="caption"><h4>A type</h4></div></div></div>';
	//echo "ONLY TO HAS A</br>";
};
if ($B_Type_From == FALSE && $B_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/B.png"><div class="caption"><h4>B type</h4></div></div></div>';
	//echo "ONLY TO HAS B</br>";
};
if ($C_Type_From == FALSE && $C_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/C.png"><div class="caption"><h4>C type</h4></div></div></div>';
	//echo "ONLY TO HAS C</br>";
};
if ($D_Type_From == FALSE && $D_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/D.png"><div class="caption"><h4>D type</h4></div></div></div>';
	//echo "ONLY TO HAS D</br>";
};
if ($E_Type_From == FALSE && $E_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/E.png"><div class="caption"><h4>E type</h4></div></div></div>';
	//echo "ONLY TO HAS E</br>";
};
if ($F_Type_From == FALSE && $F_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/F.png"><div class="caption"><h4>F type</h4></div></div></div>';
	//echo "ONLY TO HAS F</br>";
};
if ($G_Type_From == FALSE && $G_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/G.png"><div class="caption"><h4>G type</h4></div></div></div>';
	//echo "ONLY TO HAS G</br>";
};
if ($H_Type_From == FALSE && $H_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/H.png"><div class="caption"><h4>H type</h4></div></div></div>';
	//echo "ONLY TO HAS H</br>";
};
if ($I_Type_From == FALSE && $I_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/I.png"><div class="caption"><h4>I type</h4></div></div></div>';
	//echo "ONLY TO HAS I</br>";
};
if ($J_Type_From == FALSE && $J_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/J.png"><div class="caption"><h4>J type</h4></div></div></div>';
	//echo "ONLY TO HAS J</br>";
};
if ($K_Type_From == FALSE && $K_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/K.png"><div class="caption"><h4>K type</h4></div></div></div>';
	//echo "ONLY TO HAS K</br>";
};
if ($L_Type_From == FALSE && $L_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/L.png"><div class="caption"><h4>L type</h4></div></div></div>';
	//echo "ONLY TO HAS L</br>";
};
if ($M_Type_From == FALSE && $M_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/M.png"><div class="caption"><h4>M type</h4></div></div></div>';
	//echo "ONLY TO HAS M</br>";
};
if ($N_Type_From == FALSE && $N_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/N.png"><div class="caption"><h4>N type</h4></div></div></div>';
	//echo "ONLY TO HAS N</br>";
};
if ($O_Type_From == FALSE && $O_Type_To == TRUE){
	$Plug_To_Response = $Plug_To_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/O.png"><div class="caption"><h4>O type</h4></div></div></div>';
	//echo "ONLY TO HAS O</br>";
};

if ($Plug_Both_Response == ""){
	$Plug_Frame = "danger";
};
if ($Plug_From_Response == "" && $Plug_To_Response == ""){
	$Plug_Frame = "success";
};
if ($Plug_Both_Response != "" && $Plug_From_Response != "" || $Plug_To_Response != ""){
	$Plug_Frame = "warning";
};
?>