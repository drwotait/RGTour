<?php
include_once('./Connection.php');
include_once ('./CurrentStatus.php');
?>
<!DOCTYPE html>

<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <iframe src="Screen.php" height="384" width="896" frameborder="0" allowfullscreen></></iframe>
        </div>
        <div>            
            <?php
            $categoryName = '';
            $link = dbConnection::getInstance()->getdbconnection();
            $link->set_charset("utf8");
            
            $status = new CurrentStatus();
            $status->ReadFCurrentStatus();

            $wynik = $link->query('select * from categories where idcategory=' . $status->getCurrentcategory());
            $r = $wynik->fetch_object();
            if ($wynik->num_rows > 0) {
                $categoryName = $r->categoryname;
            }
            $wynik->close();
            
            echo '<p>Wybierz kategorię (aktualna:'.$categoryName.')</p>';

            $wynik1 = $link->query('select * from categories order by idcategory');
            echo '<a href="showcategory.php?idcat=1&idpage=10"> <button style="width:240px; height:40px">Strona startowa</button></a>';
            $i = 2;
            while ($row = mysqli_fetch_object($wynik1)) {
                echo '<a href="showcategory.php?idcat=' . $row->idcategory . '"> <button style="width:240px; height:40px">' . $row->categoryname .'</button></a>';
                $i++;
                if ($i > 4) {
                    echo '<br>';
                    $i = 1;
                }
            }
            ?>
        </div>
        <div>
            <table align="left" border="2">
                <tr>
                    <?php
                    echo '<th colspan="11"><a href="showcatpage.php?idcat=' . $status->getCurrentcategory() . '"> <button>Pokaż stronę kategorii</button></a></th>';
                    ?>
                    <!--th colspan="10"><button>Pokaż stronę kategorii</button></th-->
                </tr>
                <tr>
                    <th>Id</th>
                    <th>Numer startowy</th>
                    <th>Nazwisko</th>
                    <th>Klub</th>
                    <th>Przybór 1</th>
                    <th>Przybór 2</th>
                    <th>Wynik 1</th>
                    <th>Wynik 2</th>
                    <th>Total</th>
                    <th colspan="2">Operacje</th>
                </tr>                
                <?php
                $link = dbConnection::getInstance()->getdbconnection();
                $link->set_charset("utf8");
                $wynik = $link->query('select idgym, startorder, gymname, app1name, app2name, app1score, app2score,clubname from gymnastics WHERE idcategory='.$status->getCurrentcategory().' order by startorder');
                while ($r = mysqli_fetch_row($wynik)) {
                    $total = $r[5] + $r[6];
                    echo '<tr>';
                    echo '<td>' . $r[0] . '</td>';
                    echo '<td><b>' . $r[1] . '</b></td>';
                    echo '<td>' . $r[2] . '</td>';
                    echo '<td>'. $r[7] . '</td>';
                    echo '<td>' . $r[3] . '</td>';
                    echo '<td>' . $r[4] . '</td>';
                    echo '<td style align="right">' . sprintf("%01.2f", $r[5]) . '</td>';
                    echo '<td style align="right">' . sprintf("%01.2f", $r[6]) . '</td>';
                    echo '<td style align="right">' . sprintf("%01.2f", $total) . '</td>';
                    echo '<td><a class="btn" href="edit.php?id=' . $r[0] . '">Wpisz wynik</a></td>';
                    echo '<td><a class="btn" href="show.php?id=' . $r[0] . '">Pokaż na ekranie</a></td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </body>
</html>
