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
    function wypisz($nazwa)
    {
        if(!$plik=fopen($nazwa, 'r')){
            echo "Nie można otworzyć pliku.";
        }
        else{
            $linijka = fgets($plik);
            echo "<h1>$linijka</h1>";

            $linijka2 = fgets($plik);
            echo "<h2>$linijka2</h2>";

            echo "<p>";
            while(!feof($plik)){
                $linijka = fgets($plik);
                $linijka = nl2br($linijka);
                echo $linijka;
            }
            echo "</p>";
            fclose($plik);
       }
    }
     
    wypisz('wiersz1.txt'); 

     $pliki = scandir('wiersze');
     foreach($pliki as $nazwa){
        if (is_file('wiersze/'.$nazwa)){
            echo("<hr>");
            wypisz('wiersze/'.$nazwa);
        }
     }
       
     
    ?>
</body>
</html>