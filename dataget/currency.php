<?php 

if (defined('FromFile')){
  $currencyFromQuery = "SELECT * FROM CurrencyVotes JOIN Currency WHERE CurrencyVotes.idCountry = " . $id_From . " AND Currency.idCurrency = CurrencyVotes.idCurrency AND CurrencyVotes.Official = TRUE";
  $currencyFromResult = mysqli_query($conn, $currencyFromQuery);
  if (mysqli_num_rows($currencyFromResult)!=0){
    while($row = mysqli_fetch_array($currencyFromResult)){
      $Currency_ID_From = $row["idCurrency"];
      $Currency_Code_From = $row["Code"];
      $Currency_Name_From = $row["Name"];
      $Currency_Official_From = $row["Official"];
    };
  }
  elseif(mysqli_num_rows($currencyFromResult)==0) {
  	$currencyFromQuery = "SELECT * FROM CurrencyVotes JOIN Currency WHERE CurrencyVotes.idCountry = " . $id_From . " AND Currency.idCurrency = CurrencyVotes.idCurrency ORDER BY CurrencyVotes.Points DESC LIMIT 1";
    $currencyFromResult = mysqli_query($conn, $currencyFromQuery);
    if(mysqli_num_rows($currencyFromResult)!=0){
      while($row = mysqli_fetch_array($currencyFromResult)){
        $Currency_ID_From = $row["idCurrency"];
        $Currency_Code_From = $row["Code"];
        $Currency_Name_From = $row["Name"];
        $Currency_Official_From = $row["Official"];
      }
    }
    else {
      $Currency_ID_From = "Unavailable";
      $Currency_Code_From = "Unavailable";
      $Currency_Name_From = "Unavailable";
      $Currency_Official_From = "Unavailable";
    };
	};

  $currencyToQuery = "SELECT * FROM CurrencyVotes JOIN Currency WHERE CurrencyVotes.idCountry = " . $id_To . " AND Currency.idCurrency = CurrencyVotes.idCurrency AND CurrencyVotes.Official = TRUE";
  $currencyToResult = mysqli_query($conn, $currencyToQuery);
  if (mysqli_num_rows($currencyToResult)!=0){
    while($row = mysqli_fetch_array($currencyToResult)){
      $Currency_ID_To = $row["idCurrency"];
      $Currency_Code_To = $row["Code"];
      $Currency_Name_To = $row["Name"];
      $Currency_Official_To = $row["Official"];
    };
  }
  elseif(mysqli_num_rows($currencyToResult)==0) {
    $currencyToQuery = "SELECT * FROM CurrencyVotes JOIN Currency WHERE CurrencyVotes.idCountry = " . $id_To . " AND Currency.idCurrency = CurrencyVotes.idCurrency ORDER BY CurrencyVotes.Points DESC LIMIT 1";
    $currencyToResult = mysqli_query($conn, $currencyToQuery);
    if(mysqli_num_rows($currencyToResult)!=0){
      while($row = mysqli_fetch_array($currencyToResult)){
        $Currency_ID_To = $row["idCurrency"];
        $Currency_Code_To = $row["Code"];
        $Currency_Name_To = $row["Name"];
        $Currency_Official_To = $row["Official"];
      }
    }
    else {
      $Currency_ID_To = "Unavailable";
      $Currency_Code_To = "Unavailable";
      $Currency_Name_To = "Unavailable";
      $Currency_Official_To = "Unavailable";
    };
  };
}
else {
  echo "Nothing to see here...";
};

  ?>