<?php
	if(!isset($Count['Cookie_accessi']))
	{
		$Count['Cookie_accessi']++;
		setcookie ('Cookie_accessi', $Count['Cookie_accessi']);
	}
	else
	{
		$Count['Cookie_accessi']++;
		setcookie ('Cookie_accessi', $Count['Cookie_accessi']);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHP con Cookies</title>
	</head>
	<body>
		<?php
			if ($Count['Cookie_accessi'] == 1)
			{
				echo "Numero di accessi: " . $Count['Cookie_accessi'] . "\n";
				echo "Prima volta per te, BRAVOH!!!";
			}
			else
			{
				echo "Sei l'utente numero ". $Count['Cookie_accessi'] . " che ha fatto l'accesso a questo sito."; 
			}
		?>		
	</body>
</html>
