<!DOCTYPE html>
<html lang="pl">
<head>

    <title>Portal dla wędkarzy</title>
</head>
<body>
    <h3>Ryby zamieszkujące rzeki</h3>
    <ol>
        <?php
            $link = new mysqli('localhost', 'root', '', '4eG_2');
            
            $sql = "SELECT nazwa, akwen, wojewodztwo FROM Ryby INNER JOIN lowisko ON ryby.id = lowisko.ryby_id WHERE rodzaj=3;";
            $result = $link->query($sql);
            while($row=$result->fetch_array()){
                $nazwa = $row['nazwa'];
                $akwen = $row['akwen'];
                $wojewodztwo = $row['wojewodztwo'];
                echo "<li> $nazwa pływa w rzece $akwen, $wojewodztwo </li>";
            }


            $link -> close();
        ?>
    </ol>
    
    <h3>Ryby drapieżne naszych wód</h3>
    <table>
        <tr>
            <th>L.p.</th>
            <th>Gatunek</th>
            <th>Występowanie</th>
        </tr>
        <?php
            $link = new mysqli ('localhost','root','','4eG_2');
            $sql =  "select ryby.id, ryby.nazwa, ryby.wystepowanie from ryby where ryby.styl_zycia = 1;";
            $result = $link -> query($sql);
            while($row=$result->fetch_assoc()){
                echo "<tr>";
                foreach($row as $el){
                    echo "<td>$el</td>";
                }
                echo "</tr>";
            }
            $link -> close();
        ?>
    </table>
</body>
</html>