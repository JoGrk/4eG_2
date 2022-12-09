<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Trwa sesja o Identyfikatorze: <?php echo session_id(); ?></p>
    <p>Wartość zmiennej sesyjnej: <?php echo $_SESSION['niewiem']; ?></p>
    <p><a href="plik3.php">Następna strona</a></p>
</body>
</html>