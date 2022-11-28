<?php
    $expiresDays = 30;
    if (!isset($_COOKIE['odwiedziny']) ) {
        $count = 1;
    }
    else{
        $count = (int)$_COOKIE['odwiedziny'];
        $count++;
    }
    setcookie('odwiedziny', $count, time()+3600*24*$expiresDays);
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
    <?php
        if ($count == 1) {
            echo "Witamy po raz pierwszy";
        }
        else{
            echo "W ciągu ostatnich $expiresDays dni byłej u nas $count razy";
        }
    ?>
</body>
</html>