<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Forum o psach</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styl4.css'>
</head>
<body>
    <header id="banner">
        <h1>Forum wielbicieli psów</h1>
    </header>
    <section id="leftSection">
        <img src="obraz-skala.jpg" alt="foksterier">
    </section>
    <section id="rightSection_1">
        <h2>Zapisz się</h2>
        <form method="post">
            Login: <input type="text" id="login" name="login"><br>
            Hasło: <input type="password" id="password" name="password"><br>
            Powtórz hasło: <input type="password" id="repeatPassword" name="repeatPassword"><br>
            <input type="submit" value="Zapisz" id="button">
        </form>
        <?php
          $link = new mysqli('localhost', 'root', '', '4eg_2_forum');
            if(!empty($_POST['login'])&& !empty($_POST['password'])&& !empty($_POST['repeatPassword'])){
                $login = $_POST['login'];
                $password = $_POST['password'];
                $passwordRepeat = $_POST['repeatPassword'];
                $sql = "SELECT login FROM uzytkownicy;";
                $selectUser = $link -> query($sql);
                $userIsLogin = false;
                while ($row = $selectUser -> fetch_array()) {
                    $dLogin = $row['login'];
                    if ($login == $dLogin) {
                        $userIsLogin = true;
                        break;
                    }
                }
                if ($userIsLogin) {
                    echo "<p> login występuje w bazie danych, konto nie zostało dodane </p>";
                }
                else if($password==$passwordRepeat){
                    # sprawdzamy hasła
                    # dodajemy uzytkownika
                    $securePassword = sha1($password);
                    $sql = "INSERT INTO uzytkownicy (login, haslo)   VALUES( '$login', '$securePassword');";
                    $link -> query($sql);
                    echo "<p>Konto zostalo dodano</p>";

                }
                else{
                    echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                }

            }
            else{
                echo "<p> Wypełnij wszystkie pola! </p>";
            }
          $link->close();
        ?>
    </section>
    <section id="rightSection_2">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>Właścicieli psów</li>
            <li>Weterynarzy</li>
            <li>Tych, co chcą kupić psa</li>
            <li>Tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </section>
    <footer id="footer">
        Stronę wykonał: 00000000000
    </footer>
</body>
</html>