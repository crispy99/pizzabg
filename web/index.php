<html>
<head>
	<title>Pizzerie BG</title>
	<script>
		function controllo()
		{
			var numero=document.getElementById("Num").value;
			var esito=false;
			var verifica=/^\d{1,3}$/
			
			if(numero!=""&&numero.match(verifica)&&(parseInt(numero)>1&&parseInt(numero)<100)
				esito=true;
			
			return esito;
		}
	</script>
	<style>
		#table {
		font-family: Arial;
		border-collapse: collapse;
		width: 75%;
		}

		#table td, #table th {
			border: 2px solid lightgrey;
			background-color: light-blue;
			padding: 8px;
		}

		#table th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: center;
			background-color: blue;
			color: white;
		}
		
		h1 {
			font-family:Arial;
			font-size:32px;
		}
		
		.but {
			background-color: blue;
			border: none;
			color: white;
			padding: 8px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 2px 4px;
			cursor: pointer;
			border: none;
			border-radius: 8px;
		}

		.but:hover {background-color:darkblue}
	</style>	
</head>
<body>
	<?php
		if(isset($_POST["Num"]))
			$Num=$_POST["Num"];
		else
			$Num=30;
		
		$indirizzo="https://api.foursquare.com/v2/venues/search?v=20161016&query=pizzeria&limit=$Num&near=bergamo&client_id=WTSXHM2Z0E411CZIDXQH00XJRAVYAQ4CNUDYMJ21Y32XY5QC&client_secret=GH0NSWX5YRUQ0FYI1DD1IC3JNVEBCLTMYJE5G11ADQD1YSTF";
		
		$ch = curl_init() or die(curl_error());
		curl_setopt($ch, CURLOPT_URL,$indirizzo);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		$mex=curl_exec($ch) or die(curl_error());
		
		$dati = json_decode($mex);
		
		echo "<div align='center'>";
		
		echo "<h1>Elenco di $Num pizzerie di Bergamo</h1><br/>";
		
		echo "<table id='table'>";
			echo "<tr>";
				echo "<th>Nr.</th>";
				echo "<th>PIZZERIA</th>";
				echo "<th>LATITUDINE</th>";
				echo "<th>LONGITUDINE</th>";
			echo "</tr>";
			for($i=0; $i<$Num; $i++)
			{
				echo "<tr>";
					echo "<td>".($i+1)."</td>";
					echo "<td>".$dati->response->venues[$i]->name."</td>";
					echo "<td>".$dati->response->venues[$i]->location->lat."</td>";
					echo "<td>".$dati->response->venues[$i]->location->lng."</td>";
				echo "</tr>";
			}
		echo "</table><br/>";
		
		echo "<form id='forma' method='post' onsubmit='return controllo();'>";
		echo "Numero elementi [1-100]: <input type='text' value='$Num' name='Num' id='Num'/><br/>";
		echo "<input type='submit' class=but value='Aggiorna tabella'/>";
		echo "</form>";
		
		echo "</div>";
		
		echo curl_error($ch);
		curl_close($ch);
	?>
</body>
</html>
