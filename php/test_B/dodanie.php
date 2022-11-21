<?php
// połączenie
$link =;
$numerKaretki = $_POST['ambulanceName']
$rat1 = $_POST['rat1'];
$rat2 = $_POST['rat2'];
$rat3 = $_POST['rat3'];
// wykonanie zapytania
$zapytanie="INSERT INTO ratownicy VALUES (NULL, $numerKaretki, '$rat1', '$rat2', '$rat3');";
if($link->query($zapytanie))
{
    echo "pomyślnie dodano";
}
// zamknięcie
?>