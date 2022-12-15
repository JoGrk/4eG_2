<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php include 'config.php' ?>
    
    <header>
        <h1>Forum miłośników psów</h1>
    </header>
    <main>
    <section id="lewy">
        <img src="Avaatar.jpg" alt="Użytkownik forum">
        <?php

            $sql="select nick, postow, pytanie from konta inner join pytania on pytania.konta_id=konta.id where pytania.id =1;";
            
            $result=$link->query($sql);
            while($row=$result->fetch_assoc())
            {
                $nick=$row['nick'];
                $postow=$row['postow'];
                $pytanie=$row['pytanie'];
                echo "<h4>Użytkownik :$nick</h4>";
                echo"<p>$postow postów na forum</p>";
                echo"<p>$pytanie</p>";
            }


            
        ?>
        <video src="video.mp4" controls loop></video>
    </section>
         
    <section id="prawy">

        <form action="index.php" method="POST">
            <textarea name="odpowiedz" cols="40" rows="4"></textarea><br>
            <input type="submit" value="Dodaj odpowiedź">
        </form>
        <?php

            if(!empty($_POST['odpowiedz'])){
                $odpowiedz=$_POST['odpowiedz'];
                $sql="INSERT INTO odpowiedzi (konta_id,odpowiedz,Pytania_id) values (5,'$odpowiedz',1);";

                $link->query($sql);
            }           




            

        ?>
        <h2>Odpowiedzi na pytanie</h2>
        <ol>
            <?php
                $sql="select odpowiedzi.id, odpowiedz, nick from konta inner join odpowiedzi on odpowiedzi.konta_id=konta.id where pytania_id=1;";

                $result=$link->query($sql);

                while($row=$result->fetch_assoc()){
                    $odpowiedz=$row['odpowiedz'];
                    $nick=$row['nick'];
                    echo"<li>$odpowiedz <em>$nick</em></li><hr>";
                }
                
                
            ?>
        </ol>
    </section>
    </main>
    
    <footer>
        Autor : 2137694201337 <a href="http://mojestrony.pl/" target="_blank" rel="noopener noreferrer"> Zobacz nasze realizacje</a>
    </footer>
<?php
$link ->close();
    ?>
</body>
</html>