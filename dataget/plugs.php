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

if ($A_Type_From == TRUE && $A_Type_To == TRUE){
	$A_Type_State = "BOTH";
	$List_Both = $List_Both . "A, ";
}
elseif ($A_Type_From == TRUE){
	$A_Type_State = "FROM";
	$List_From = $List_From . "A, ";
}
elseif ($A_Type_To == TRUE){
	$A_Type_State = "TO";
	$List_To = $List_To . "A, ";
}
elseif ($A_Type_From == FALSE && $A_Type_To == FALSE){
	$A_Type_State = "NONE";
};

if ($B_Type_From == TRUE && $B_Type_To == TRUE){
	$B_Type_State = "BOTH";
	$List_Both = $List_Both . "B, ";
}
elseif ($B_Type_From == TRUE){
	$B_Type_State = "FROM";
	$List_From = $List_From . "B, ";
}
elseif ($B_Type_To == TRUE){
	$B_Type_State = "TO";
	$List_To = $List_To . "B, ";
}
elseif ($B_Type_From == FALSE && $B_Type_To == FALSE){
	$B_Type_State = "NONE";
};

if ($C_Type_From == TRUE && $C_Type_To == TRUE){
	$C_Type_State = "BOTH";
	$List_Both = $List_Both . "C, ";
}
elseif ($C_Type_From == TRUE){
	$C_Type_State = "FROM";
	$List_From = $List_From . "C, ";
}
elseif ($C_Type_To == TRUE){
	$C_Type_State = "TO";
	$List_To = $List_To . "C, ";
}
elseif ($C_Type_From == FALSE && $C_Type_To == FALSE){
	$C_Type_State = "NONE";
};

if ($D_Type_From == TRUE && $D_Type_To == TRUE){
	$D_Type_State = "BOTH";
	$List_Both = $List_Both . "D, ";
}
elseif ($D_Type_From == TRUE){
	$D_Type_State = "FROM";
	$List_From = $List_From . "D, ";
}
elseif ($D_Type_To == TRUE){
	$D_Type_State = "TO";
	$List_To = $List_To . "D, ";
}
elseif ($D_Type_From == FALSE && $D_Type_To == FALSE){
	$D_Type_State = "NONE";
};

if ($E_Type_From == TRUE && $E_Type_To == TRUE){
	$E_Type_State = "BOTH";
	$List_Both = $List_Both . "E, ";
}
elseif ($E_Type_From == TRUE){
	$E_Type_State = "FROM";
	$List_From = $List_From . "E, ";
}
elseif ($E_Type_To == TRUE){
	$E_Type_State = "TO";
	$List_To = $List_To . "E, ";
}
elseif ($E_Type_From == FALSE && $E_Type_To == FALSE){
	$E_Type_State = "NONE";
};

if ($F_Type_From == TRUE && $F_Type_To == TRUE){
	$F_Type_State = "BOTH";
	$List_Both = $List_Both . "F, ";
}
elseif ($F_Type_From == TRUE){
	$F_Type_State = "FROM";
	$List_From = $List_From . "F, ";
}
elseif ($F_Type_To == TRUE){
	$F_Type_State = "TO";
	$List_To = $List_To . "F, ";
}
elseif ($F_Type_From == FALSE && $F_Type_To == FALSE){
	$F_Type_State = "NONE";
};

if ($G_Type_From == TRUE && $G_Type_To == TRUE){
	$G_Type_State = "BOTH";
	$List_Both = $List_Both . "G, ";
}
elseif ($G_Type_From == TRUE){
	$G_Type_State = "FROM";
	$List_From = $List_From . "G, ";
}
elseif ($G_Type_To == TRUE){
	$G_Type_State = "TO";
	$List_To = $List_To . "G, ";
}
elseif ($G_Type_From == FALSE && $G_Type_To == FALSE){
	$G_Type_State = "NONE";
};

if ($H_Type_From == TRUE && $H_Type_To == TRUE){
	$H_Type_State = "BOTH";
	$List_Both = $List_Both . "H, ";
}
elseif ($H_Type_From == TRUE){
	$H_Type_State = "FROM";
	$List_From = $List_From . "H, ";
}
elseif ($H_Type_To == TRUE){
	$H_Type_State = "TO";
	$List_To = $List_To . "H, ";
}
elseif ($H_Type_From == FALSE && $H_Type_To == FALSE){
	$H_Type_State = "NONE";
};

if ($I_Type_From == TRUE && $I_Type_To == TRUE){
	$I_Type_State = "BOTH";
	$List_Both = $List_Both . "I, ";
}
elseif ($I_Type_From == TRUE){
	$I_Type_State = "FROM";
	$List_From = $List_From . "I, ";
}
elseif ($I_Type_To == TRUE){
	$I_Type_State = "TO";
	$List_To = $List_To . "I, ";
}
elseif ($I_Type_From == FALSE && $I_Type_To == FALSE){
	$I_Type_State = "NONE";
};

if ($J_Type_From == TRUE && $J_Type_To == TRUE){
	$J_Type_State = "BOTH";
	$List_Both = $List_Both . "J, ";
}
elseif ($J_Type_From == TRUE){
	$J_Type_State = "FROM";
	$List_From = $List_From . "J, ";
}
elseif ($J_Type_To == TRUE){
	$J_Type_State = "TO";
	$List_To = $List_To . "J, ";
}
elseif ($J_Type_From == FALSE && $J_Type_To == FALSE){
	$J_Type_State = "NONE";
};

if ($K_Type_From == TRUE && $K_Type_To == TRUE){
	$K_Type_State = "BOTH";
	$List_Both = $List_Both . "K, ";
}
elseif ($K_Type_From == TRUE){
	$K_Type_State = "FROM";
	$List_From = $List_From . "K, ";
}
elseif ($K_Type_To == TRUE){
	$K_Type_State = "TO";
	$List_To = $List_To . "K, ";
}
elseif ($K_Type_From == FALSE && $K_Type_To == FALSE){
	$K_Type_State = "NONE";
};

if ($L_Type_From == TRUE && $L_Type_To == TRUE){
	$L_Type_State = "BOTH";
	$List_Both = $List_Both . "L, ";
}
elseif ($L_Type_From == TRUE){
	$L_Type_State = "FROM";
	$List_From = $List_From . "L, ";
}
elseif ($L_Type_To == TRUE){
	$L_Type_State = "TO";
	$List_To = $List_To . "L, ";
}
elseif ($L_Type_From == FALSE && $L_Type_To == FALSE){
	$L_Type_State = "NONE";
};

if ($M_Type_From == TRUE && $M_Type_To == TRUE){
	$M_Type_State = "BOTH";
	$List_Both = $List_Both . "M, ";
}
elseif ($M_Type_From == TRUE){
	$M_Type_State = "FROM";
	$List_From = $List_From . "M, ";
}
elseif ($M_Type_To == TRUE){
	$M_Type_State = "TO";
	$List_To = $List_To . "M, ";
}
elseif ($M_Type_From == FALSE && $M_Type_To == FALSE){
	$M_Type_State = "NONE";
};

if ($N_Type_From == TRUE && $N_Type_To == TRUE){
	$N_Type_State = "BOTH";
	$List_Both = $List_Both . "N, ";
}
elseif ($N_Type_From == TRUE){
	$N_Type_State = "FROM";
	$List_From = $List_From . "N, ";
}
elseif ($N_Type_To == TRUE){
	$N_Type_State = "TO";
	$List_To = $List_To . "N, ";
}
elseif ($N_Type_From == FALSE && $N_Type_To == FALSE){
	$N_Type_State = "NONE";
};

if ($O_Type_From == TRUE && $O_Type_To == TRUE){
	$O_Type_State = "BOTH";
	$List_Both = $List_Both . "O, ";
}
elseif ($O_Type_From == TRUE){
	$O_Type_State = "FROM";
	$List_From = $List_From . "O, ";
}
elseif ($O_Type_To == TRUE){
	$O_Type_State = "TO";
	$List_To = $List_To . "O, ";
}
elseif ($O_Type_From == FALSE && $O_Type_To == FALSE){
	$O_Type_State = "NONE";
};

$List_Both = substr($List_Both, 0, -2);
$List_From = substr($List_From, 0, -2);
$List_To = substr($List_To, 0, -2);

if ($List_Both != ""){
	$Plug_Response = "Both countries use " . $List_Both . " Type(s) plug. ";
	$Plug_Frame = "success";
}
else {

};

if ($List_From != ""){
	$Plug_Response = $Plug_Response . $Name_From . " use " . $List_From . " Type(s) plug but " . $Name_To . " doesn't. ";
	$Plug_Frame = "warning";
}
else {

};
if ($List_To !=""){
	$Plug_Response = $Plug_Response . $Name_To . " use " . $List_To . " type(s) plug but " . $Name_From . " doesn't.";
	$Plug_Frame = "warning";
}
else {

};




?>