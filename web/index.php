<?php
	
	if(!isset($Count['Cookie_accessi']))
	{
		$Count_value=1;
		setcookie ('Cookie_accessi', $Count_value);
	}	
	else
	{
		$Count_value = ++$Count['Cookie_accessi'];
		setcookie ('Cookie_accessi', $Count_value);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHP Script using Cookies</title>
	</head>
	<body>
		<?php
			if ($Count_visite == 1)
				echo "Prima volta per te, BRAVOH!!!";
			else
				echo "Sei acceduto a questa pagina: ". $Count['Cookie_accessi']. "volte."; 
		?>		
	</body>
</html>
