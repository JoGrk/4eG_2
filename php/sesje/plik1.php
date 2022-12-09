<?php
    session_start();
    $_SESSION['niewiem']='depresja obopólna';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Strona pierwsza</title>
</head>
<body>
    <p>Witamy! Została rozpoczęta sesja</p>
    <p>Identyfikatorem sesji jest <?php echo session_id(); ?></p>
    <p>Nazwa sesji to <?php echo session_name();?>  </p>
    <p> wartoscia zmiennej niewiem jest: <?php echo $_SESSION['niewiem'];?> </p>
    <p> <a href='plik2.php'>Link do następnej strony</a> </p
</body>
</html>