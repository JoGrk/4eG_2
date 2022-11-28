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

			?>
		</table>
	</div>
	<div id="stopka1">
	<?php

		if(!isset($_COOKIE['cookie'])){
			setcookie('cookie', '1', 3600*2);
			echo '<p><b> Dzień dobry! Strona lotniska uzywa ciasteczek</b></p>';
		}
		else{
			setcookie('cookie', '1', 3600*2);
			echo '<p><i> Witaj ponownie na stronie lotniska </p></i>';
		}

	?>
	</div>
	<div id="stopka2">
		Autor: PESEL
	</div>
</body>
</html>