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
			
			$indirizzo="https://api.foursquare.com/v2/venues/search?v=20161016&query=pizzeria&limit=50&near=bergamo&client_id=WTSXHM2Z0E411CZIDXQH00XJRAVYAQ4CNUDYMJ21Y32XY5QC&client_secret=GH0NSWX5YRUQ0FYI1DD1IC3JNVEBCLTMYJE5G11ADQD1YSTF";
			# Codice di utilizzo di cURL
			# Chiama l'API e la immagazzina in $json
			$ch = curl_init() or die(curl_error());
			curl_setopt($ch, CURLOPT_URL,$indirizzo);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$json=curl_exec($ch) or die(curl_error());
			# Decodifico la stringa json e la salvo nella variabile $data
			$data = json_decode($json);
			
			echo "<div align='center'>";
			
			echo "<h1>Elenco pizzerie di Bergamo</h1><br/>";
			
			echo "<table id='table'>";
				echo "<tr>";
					echo "<th>Nr.</th>";
					echo "<th>PIZZERIA</th>";
					echo "<th>LATITUDINE</th>";
					echo "<th>LONGITUDINE</th>";
				echo "</tr>";
				for($i=0; $i<50; $i++)
				{
					echo "<tr>";
						echo "<td>".($i+1)."</td>";
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
		?>
	</body>
</html>
