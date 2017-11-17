<?php
	$nome="contatore";
	$scadenza=time()+(60*60*24*7);
	if(!isset($_COOKIE["contatore"]))
	{
		print("Benvenuto! Questa è la prima volta che entri in questo sito!");
		$valore=1;
		setcookie($nome, $valore, $scadenza);
	}
	else
	{
		$valore = ++$_COOKIE["contatore"];
		print("Hai visitato questo sito ".$_COOKIE["contatore"]." volte");
		setcookie($nome, $valore, $scadenza);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHP con Cookies</title>
	</head>
	<body>		
	</body>
</html>
