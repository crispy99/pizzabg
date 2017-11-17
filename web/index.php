<?php
	$nome="contatore";
	$scadenza=time()+(60*60*24*7);
	if(!isset($_COOKIE["contatore"]))
	{
		print("Questa e' la prima volta che accedi alla pagina, COMPLIMENTONI!!");
		$valore=1;
		setcookie($nome, $valore, $scadenza);
	}
	else
	{
		$valore = $_COOKIE["contatore"]+1;
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
