<?php
	$strValue = "Primo accesso, BRAVOH!";
	setcookie ('Cookie', $strValue);
	setcookie ('Cookie_accessi', isset($Count['Cookie_accessi']) ? $Count['Cookie_accessi']++ : 1);
	$Count_visite = $Count['Cookie_accessi'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Script using Cookies</title>
</head>
	<body>
		<?if ($Count_visite == 1): ?>
			<?= $Cookie ?>
		<?else:?> 
			Sei acceduto a questa pagina: <?= $Count['Cookie_accessi'] ?> volte. 
		<?endif;?>
	</body>
</html>
