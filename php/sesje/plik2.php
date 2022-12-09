<?php
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Strona 2</title>
</head>

<body>
    <p>Trwa sesja o Identyfikatorze: <?php echo session_id(); ?></p>
    <p>Wartość zmiennej sesyjnej: <?php echo $_SESSION['niewiem']; ?></p>
    <p><a href="plik3.php">Następna strona</a></p>
</body>

</html>