<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Port Lotniczy</title>
	<link rel="stylesheet" href="styl5.css" />
</head>
<body>
	<div id="baner1">
		<img src="zad5.png" alt="logo lotnisko" />
	</div>
	<div id="baner2">
		<h1>Przyloty</h1>
	</div>
	<div id="baner3">
		<h3>przydatne linki</h3>
		<a href="kwerendy.txt" target="_blank">Pobierz...</a>
	</div>
	<div id="glowny">
		<table>
			<tr>
				<th>czas</th>
				<th>kierunek</th>
				<th>numer rejsu</th>
				<th>status</th>
			</tr>
			<?php
			
			// skrypt 1
			$link = new mysqli('localhost', 'root', '', '4eg_2_lotnisko');
			$sql=" SELECT czas, kierunek, nr_rejsu, status_lotu FROM przyloty ORDER BY czas ASC;";
			$result=$link-> query($sql);
			while($row=$result->fetch_assoc()){
				echo "<tr>";
				foreach($row as $pole){
					echo "<td> $pole </td>";
				}
				echo "</tr>";
			}


			$link-> close();

			?>
		</table>
	</div>
	<div id="stopka1">
	<?php
       //setcookie('cook','1', 0);
		if(!isset($_COOKIE['cook'])){
			setcookie('cook', '1', time()+3600*2);
			echo '<p><b> Dzień dobry! Strona lotniska uzywa ciasteczek</b></p>';
			
		}
		else{
			setcookie('cook', '1', time()+3600*2);
			echo '<p><i> Witaj ponownie na stronie lotniska </p></i>';
		}

	?>
	</div>
	<div id="stopka2">
		Autor: PESEL
	</div>
</body>
</html>