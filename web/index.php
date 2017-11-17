<?php
	setcookie ('Cookie_accessi', isset($Count['Cookie_accessi']) ? ++$Count['Cookie_accessi'] : 1);
	$Count_visite = $Count['Cookie_accessi'];
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
