<?php
/**
 * Created by PhpStorm.
 * User: madw
 * Date: 2016-11-10
 * Time: 15:35
 */
function buildCategoryResultsPage($categoryId){
    echo 'aaa';
    $categoryName = '';
    $link = dbConnection::getInstance()->getdbconnection();
    $wynik = $link->query('select * from categories where idcategory=' . $categoryId);
    $r = $wynik->fetch_object();
    if ($wynik->num_rows > 0) {
        $categoryName = $r->categoryname;
    }
    $wynik->close();

    $results = $link->query('select GymName,clubname, app1name,app2name,app1score, app2score (app1score+app2score) as totalscore where idcategory=' .$categoryId . ' order by totalscore DESC');

    echo '<div style="position: absolute; z-index: 2; width: 100%; height: 100%; overflow: auto">';
    //poprzedni font:54px
    //echo '  <div style="position: absolute; top: 20%;left: 42%; font-size: 54px; color: #EB6B46 " align="center">';
    echo '  <div style="position: absolute; top: 2%;left: 20%; font-size: 54px; color:rgb(121,33,129)  " align="center">';
    echo '<p>KATEGORIA:' . $categoryName . '</p>';
    // poprzednia czcionaka:102
    //echo '      <p style="font-size: 102px;" align="center" >' . $categoryName . '<p>';
    //echo '<p></p>';
    echo '  </div>';
    // tabela wyników
    echo '<div>';
    echo '<table align="left" border="1">';
    echo '<tr>';
    echo '<th colspan="11"><a href="showcatpage.php?idcat=' . $status->getCurrentcategory() . '"> <button>Pokaż stronę kategorii</button></a></th>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Numer startowy</th>';
    echo '<th>Nazwisko</th>';
    echo '<th>Klub</th>';
    echo '<th>Przybór 1</th>';
    echo '<th>Przybór 2</th>';
    echo '<th>Wynik 1</th>';
    echo '<th>Wynik 2</th>';
    echo '<th>Total</th>';
    echo '</tr>';


    while ($r = mysqli_fetch_row($results)) {
        echo '<tr>';
        echo '<td>' . $r->gymname . '</td>';
        echo '<td><b>' . $r->app1name . '</b></td>';
        echo '<td>' . $r->app2name . '</td>';
        echo '<td>'. $r->app1score . '</td>';
        echo '<td>' . $r->app2score . '</td>';
        echo '<td>' . $r-> . '</td>';
        echo '<td style align="right">' . sprintf("%01.2f", $r[5]) . '</td>';
        echo '<td style align="right">' . sprintf("%01.2f", $r[6]) . '</td>';
        echo '<td style align="right">' . sprintf("%01.2f", $total) . '</td>';
        echo '<td><a class="btn" href="edit.php?id=' . $r[0] . '">Wpisz wynik</a></td>';
        echo '<td><a class="btn" href="show.php?id=' . $r[0] . '">Pokaż na ekranie</a></td>';
        echo '</tr>';
    }

    $results->close();
    echo'</table>';
    echo '</div>';



    echo '</div>';


    //SELECT gymnastics.idGym , gymnastics.GymName , gymnastics.app1score , gymnastics.app2score , ( gymnastics.app1score + gymnastics.app2score ) as totalscore FROM gymnastics where idcategory=7 order by totalscore DESC
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test wyników</title>
</head>
<body>
   <b>Test 2</b>
   <?php
        echo 'aaa';
        include_once './Gimnastic.php';
        include_once('./Connection.php') ;
        include_once('./TourStartPage.php');
        require './Category.php';
        include_once('./CurrentStatus.php');
        include_once('./testres.php');
        buildCategoryResultsPage(7);
   ?>
</body>
</html>