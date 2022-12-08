<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Opinie klientów</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styl3.css'>

</head>

<body>
    <header>
        <h1>Hurtownia spożywcza</h1>
    </header>

    <main>
        <h2> Opinie naszych klientów:</h2>
        <?php
            $conn= new mysqli('localhost','root','','hurtownia');
             $sql=" SELECT zdjecie, imie, opinia FROM klienci INNER JOIN opinie ON klienci.id = opinie.klienci_id WHERE typy_id=2 OR typy_id=3;";
             $result=$conn->query($sql);
             while($row=$result->fetch_array()){
                $zdjecie=$row['zdjecie'];
                $imie=$row['imie'];
                $opinia=$row['opinia'];

                echo "<div id='review'>";
                echo "<img src='$zdjecie' alt='klient'>";
                echo "<blockquote>$opinia</blockquote>";
                echo "<h4>$imie</h4>";
                echo "</div>";
             }
             
             $conn->close();
        

        ?>
    </main>

    <footer>
        <div id="footer1">
            <h3> Współpracują z nami:</h3>
            <a href="http://sklep.pl/">Sklep 1 </a>
        </div>
        <div id="footer2">
            <h3> Nasi top klienci</h3>
            <ol>
                <?php
                   $conn = new mysqli('localhost', 'root', '','hurtownia');
                   $sql = "SELECT imie, nazwisko, punkty from klienci order by punkty desc LIMIT 3;";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_array()){
                      $imie = $row['imie'];
                      $nazwisko = $row['nazwisko'];
                      $punkty = $row['punkty'];
                      echo "<li> $imie $nazwisko, $punkty </li>";
                   }
                   $conn->close();
                ?>
            </ol>

        </div>
        <div id="footer3">
            <h3> Skontaktuj się</h3>
            <p> telefon:111222333</p>
        </div>
        <div id="footer4">
            <h3> Autor:000000000</h3>
        </div>
    </footer>

    ewa.jpg
</body>

</html>