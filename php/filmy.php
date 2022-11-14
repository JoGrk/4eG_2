<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Filmy</title>
</head>
<body>
<?php
    $link = new mysqli('localhost','root','','4eG_2');
    $sql="SELECT * FROM movie_table";
    $result=$link->query($sql);
    echo "Ilość filmów w tabeli: ".$result->num_rows;
    while($wiersz=$result->fetch_array()){
        $title = $wiersz['title'];
        $category = $wiersz['category'];
        echo "<p> $title $category </p>";
    }
    while ($wiersz=$result->fetch_rows()){
        foreach ($wiersz as $pole) {
           echo $pole ;
        }
    }


    $link->close();
?>
</body>
</html>