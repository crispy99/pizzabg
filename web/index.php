<html>
	<head>
		<title>Pizzerie BG</title>
	</head>
	<style>
		#table {
		font-family: Arial;
		border-collapse: collapse;
		width: 75%;
		}

		#table td, #table th {
			border: 2px solid lightgrey;
			padding: 8px;
		}

		#table th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: center;
			background-color: green;
			color: white;
		}
		
		h1 {
			font-family:Arial;
			font-size:24px;
		}
	</style>
	<body>
		<?php
			if(!isset($_POST["lim"]))
				$lim=50;
			
			if(!isset($_POST["cit"]))
				$cit="bergamo";
			
			if(!isset($_POST["que"]))
				$que="pizzeria";
			
			$indirizzo="https://api.foursquare.com/v2/venues/search?v=20161016&query=$que&limit=$lim&intent=checkin&client_id=WTSXHM2Z0E411CZIDXQH00XJRAVYAQ4CNUDYMJ21Y32XY5QC&client_secret=GH0NSWX5YRUQ0FYI1DD1IC3JNVEBCLTMYJE5G11ADQD1YSTF&near=$cit";
			# Codice di utilizzo di cURL
			# Chiama l'API e la immagazzina in $json
			$ch = curl_init() or die(curl_error());
			curl_setopt($ch, CURLOPT_URL,$indirizzo_pagina);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$json=curl_exec($ch) or die(curl_error());
			# Decodifico la stringa json e la salvo nella variabile $data
			$data = json_decode($json);
			echo "<div align='center'>";
			
			echo "<h1>Elenco pizzerie di Bergamo</h1><br/>";
			
			echo "<table>";
				echo "<tr>";
					echo "<th>PIZZERIA</th>";
					echo "<th>LATITUDINE</th>";
					echo "<th>LONGITUDINE</th>";
				echo "</tr>";
				for($i=0; $i<$lim; $i++)
				{
					echo "<tr>";
						echo "<td>";
						echo $data->response->venues[$i]->name;
						echo "</td>";
						echo "<td>";
						echo $data->response->venues[$i]->location->lat;
						echo "</td>";
						echo "<td>";
						echo $data->response->venues[$i]->location->lng;
						echo "</td>";
					echo "</tr>";
				}
			echo "</table>";
			
			echo "</div>";
			# Stampa di eventuali errori
			echo curl_error($ch);
			curl_close($ch);
			echo "<form id='forma' method='post' onsubmit='return controllo_campi();'><br/>";
			echo "<table>";
			echo "<tr>";
			echo " <td>Numero elementi (1-50): </td><td><input type='text' value='$lim' name='lim'id='lim' /></td>";
			echo "</tr>";
			echo "<tr>";
			echo " <td>Citta: </td><td><input type='text' value='$cit' name='cit' id='cit' /></td>";
			echo "</tr>";
			echo "<tr>";
			echo " <td>Cosa stai cercando?: </td><td><input type='text' value='$que' name='que' id='que' /></td><br/>";
			echo "</tr>";
			echo "</table>";
			echo " <input type='submit' value='Aggiorna tabella' class='btn'/>";
			echo "</form>";
		?>
	</body>
</html>
