<?php
    session_start();
    unset($_SESSION['niewiem']);
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-3600);
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Strona 3</title>
</head>

<body>
    <p>Trwa sesja o Identyfikatorze: <?php echo session_id(); ?></p>
    <p>Wartość zmiennej sesyjnej: <?php echo $_SESSION['niewiem']; ?></p>
    <?php
        if (session_destroy()) {
            echo "Sesja została zakończona";
        }
        else
        {
            echo "Sesja nie została zakończona";
        }
    ?>
</body>

</html>