<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Portal społecznościowy</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styl5.css'>
    <script src='main.js'></script>
</head>
<body>
    <header id="leftHeader">
        <h2>Nasze osiedle</h2>
    </header>
    <header id="rightHeader">
        <?php
            // skrypt 1

            $link = new mysqli('localhost','root','','4eg_2_portal');
            $sql = "SELECT COUNT(*) from dane;";

            $result = $link -> query($sql);

            while ($row = $result -> fetch_row()) {
                echo "Liczba użytkowników portalu: $row[0]";
            }
        $link -> close();
        ?>
    </header>
    <section id="leftSection">
        <h3>logowanie</h3>
        <form method="POST">
            <p>Login</p>
            <input type="text" name="login" id="login"><br>
            <p>Hasło</p>
            <input type="text" name="password" id="password"><br>
            <button type="submit" onclick="">Zaloguj</button>
        </form>
    </section>
    <section id="rightSection">
        <section id="card">
        <h3>Wizytówka</h3>
        <?php
        $link = new mysqli('localhost','root','','4eg_2_portal');

        if(!empty($_POST['login']) && !empty($_POST['password'])){
            $login=$_POST['login'];
            $password=sha1($_POST['password']);
            $sql = "select haslo from uzytkownicy where login='$login'";
            $result=$link->query($sql);
            if($result->num_rows>0){
                //jest login w bazie
            }
            else{
                echo "login nie istnieje";
            }
        }
        

        $link->close();
        ?>
        <button type="submit" onclick="" id="cardButton"></button>
        </section>   

    </section>
    <footer>
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>