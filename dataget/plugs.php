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
	}
	elseif ($Plug_Array == "B") {
		$B_Type_From = TRUE;
	}
	elseif ($Plug_Array == "C") {
		$C_Type_From = TRUE;
	}
	elseif ($Plug_Array == "D") {
		$D_Type_From = TRUE;
	}
	elseif ($Plug_Array == "E") {
		$E_Type_From = TRUE;
	}
	elseif ($Plug_Array == "F") {
		$F_Type_From = TRUE;
	}
	elseif ($Plug_Array == "G") {
		$G_Type_From = TRUE;
	}
	elseif ($Plug_Array == "H") {
		$H_Type_From = TRUE;
	}
	elseif ($Plug_Array == "I") {
		$I_Type_From = TRUE;
	}
	elseif ($Plug_Array == "J") {
		$J_Type_From = TRUE;
	}
	elseif ($Plug_Array == "K") {
		$K_Type_From = TRUE;
	}
	elseif ($Plug_Array == "L") {
		$L_Type_From = TRUE;
	}
	elseif ($Plug_Array == "M") {
		$M_Type_From = TRUE;
	}
	elseif ($Plug_Array == "N") {
		$N_Type_From = TRUE;
	}
	elseif ($Plug_Array == "O") {
		$O_Type_From = TRUE;
	};
};

foreach ($Plug_Array_To as $Plug_Array) {
	if($Plug_Array == "A"){
		$A_Type_To = TRUE;
	}
	elseif ($Plug_Array == "B") {
		$B_Type_To = TRUE;
	}
	elseif ($Plug_Array == "C") {
		$C_Type_To = TRUE;
	}
	elseif ($Plug_Array == "D") {
		$D_Type_To = TRUE;
	}
	elseif ($Plug_Array == "E") {
		$E_Type_To = TRUE;
	}
	elseif ($Plug_Array == "F") {
		$F_Type_To = TRUE;
	}
	elseif ($Plug_Array == "G") {
		$G_Type_To = TRUE;
	}
	elseif ($Plug_Array == "H") {
		$H_Type_To = TRUE;
	}
	elseif ($Plug_Array == "I") {
		$I_Type_To = TRUE;
	}
	elseif ($Plug_Array == "J") {
		$J_Type_To = TRUE;
	}
	elseif ($Plug_Array == "K") {
		$K_Type_To = TRUE;
	}
	elseif ($Plug_Array == "L") {
		$L_Type_To = TRUE;
	}
	elseif ($Plug_Array == "M") {
		$M_Type_To = TRUE;
	}
	elseif ($Plug_Array == "N") {
		$N_Type_To = TRUE;
	}
	elseif ($Plug_Array == "O") {
		$O_Type_To = TRUE;
	};
};
//Both responses
if ($A_Type_From == TRUE && $A_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/A.png"><div class="caption"><h4>A type</h4></div></div></div>';
};
if ($B_Type_From == TRUE && $B_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/B.png"><div class="caption"><h4>B type</h4></div></div></div>';
};
if ($C_Type_From == TRUE && $C_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/C.png"><div class="caption"><h4>C type</h4></div></div></div>';
};
if ($D_Type_From == TRUE && $D_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/D.png"><div class="caption"><h4>D type</h4></div></div></div>';
};
if ($E_Type_From == TRUE && $E_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/E.png"><div class="caption"><h4>E type</h4></div></div></div>';
};
if ($F_Type_From == TRUE && $F_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/F.png"><div class="caption"><h4>F type</h4></div></div></div>';
};
if ($G_Type_From == TRUE && $G_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/G.png"><div class="caption"><h4>G type</h4></div></div></div>';
};
if ($H_Type_From == TRUE && $H_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/H.png"><div class="caption"><h4>H type</h4></div></div></div>';
};
if ($I_Type_From == TRUE && $I_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/I.png"><div class="caption"><h4>I type</h4></div></div></div>';
};
if ($J_Type_From == TRUE && $J_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/J.png"><div class="caption"><h4>J type</h4></div></div></div>';
};
if ($K_Type_From == TRUE && $K_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/K.png"><div class="caption"><h4>K type</h4></div></div></div>';
};
if ($L_Type_From == TRUE && $L_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/L.png"><div class="caption"><h4>L type</h4></div></div></div>';
};
if ($M_Type_From == TRUE && $M_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/M.png"><div class="caption"><h4>M type</h4></div></div></div>';
};
if ($N_Type_From == TRUE && $N_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/N.png"><div class="caption"><h4>N type</h4></div></div></div>';
};
if ($O_Type_From == TRUE && $O_Type_To == TRUE){
	$Plug_Both_Response = $Plug_Both_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/O.png"><div class="caption"><h4>O type</h4></div></div></div>';
};
//From responses
if ($A_Type_From == TRUE && $A_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/A.png"><div class="caption"><h4>A type</h4></div></div></div>';
};
if ($B_Type_From == TRUE && $B_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/B.png"><div class="caption"><h4>B type</h4></div></div></div>';
};
if ($C_Type_From == TRUE && $C_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/C.png"><div class="caption"><h4>C type</h4></div></div></div>';
};
if ($D_Type_From == TRUE && $D_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/D.png"><div class="caption"><h4>D type</h4></div></div></div>';
};
if ($E_Type_From == TRUE && $E_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/E.png"><div class="caption"><h4>E type</h4></div></div></div>';
};
if ($F_Type_From == TRUE && $F_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/F.png"><div class="caption"><h4>F type</h4></div></div></div>';
};
if ($G_Type_From == TRUE && $G_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/G.png"><div class="caption"><h4>G type</h4></div></div></div>';
};
if ($H_Type_From == TRUE && $H_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/H.png"><div class="caption"><h4>H type</h4></div></div></div>';
};
if ($I_Type_From == TRUE && $I_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/I.png"><div class="caption"><h4>I type</h4></div></div></div>';
};
if ($J_Type_From == TRUE && $J_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/J.png"><div class="caption"><h4>J type</h4></div></div></div>';
};
if ($K_Type_From == TRUE && $K_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/K.png"><div class="caption"><h4>K type</h4></div></div></div>';
};
if ($L_Type_From == TRUE && $L_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/L.png"><div class="caption"><h4>L type</h4></div></div></div>';
};
if ($M_Type_From == TRUE && $M_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/M.png"><div class="caption"><h4>M type</h4></div></div></div>';
};
if ($N_Type_From == TRUE && $N_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/N.png"><div class="caption"><h4>N type</h4></div></div></div>';
};
if ($O_Type_From == TRUE && $O_Type_To == FALSE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/O.png"><div class="caption"><h4>O type</h4></div></div></div>';
};
//TO responses
if ($A_Type_From == FALSE && $A_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/A.png"><div class="caption"><h4>A type</h4></div></div></div>';
};
if ($B_Type_From == FALSE && $B_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/B.png"><div class="caption"><h4>B type</h4></div></div></div>';
};
if ($C_Type_From == FALSE && $C_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/C.png"><div class="caption"><h4>C type</h4></div></div></div>';
};
if ($D_Type_From == FALSE && $D_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/D.png"><div class="caption"><h4>D type</h4></div></div></div>';
};
if ($E_Type_From == FALSE && $E_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/E.png"><div class="caption"><h4>E type</h4></div></div></div>';
};
if ($F_Type_From == FALSE && $F_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/F.png"><div class="caption"><h4>F type</h4></div></div></div>';
};
if ($G_Type_From == FALSE && $G_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/G.png"><div class="caption"><h4>G type</h4></div></div></div>';
};
if ($H_Type_From == FALSE && $H_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/H.png"><div class="caption"><h4>H type</h4></div></div></div>';
};
if ($I_Type_From == FALSE && $I_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/I.png"><div class="caption"><h4>I type</h4></div></div></div>';
};
if ($J_Type_From == FALSE && $J_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/J.png"><div class="caption"><h4>J type</h4></div></div></div>';
};
if ($K_Type_From == FALSE && $K_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/K.png"><div class="caption"><h4>K type</h4></div></div></div>';
};
if ($L_Type_From == FALSE && $L_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/L.png"><div class="caption"><h4>L type</h4></div></div></div>';
};
if ($M_Type_From == FALSE && $M_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/M.png"><div class="caption"><h4>M type</h4></div></div></div>';
};
if ($N_Type_From == FALSE && $N_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/N.png"><div class="caption"><h4>N type</h4></div></div></div>';
};
if ($O_Type_From == FALSE && $O_Type_To == TRUE){
	$Plug_From_Response = $Plug_From_Response . '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6"><div class="thumbnail"><img src="images/plugs/O.png"><div class="caption"><h4>O type</h4></div></div></div>';
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