
<?php

    // nie ma ciasteczka i nie ma nazwy
    // wyświetlamy formularz
    if(!isset($_COOKIE['name']) && !isset($_GET['ns']) ){
        include('header.html');
        include('form.html');
        include('footer.html');
    }
    //mamy użytkownika, ustawiamy ciasteczka
    else if(isset($_GET['ns']))
    {
        $ns=$_GET['ns'];
        setcookie('name', $ns, time()+2*60);
        include('header.html');
        echo "<p>Dziękujemy za podanie danych</p>";
        include('footer.html');
    }
    else{
        include('header.html');
        echo "Zostałeś rozpoznamy jako ".$_COOKIE['name'];
        include('footer.html');
        
    }


?>
