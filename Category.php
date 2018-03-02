<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// put your code here
function buildCategoryPage($categoryId) {
    $categoryName = '';
    $link = dbConnection::getInstance()->getdbconnection();
    $wynik = $link->query('select * from categories where idcategory=' . $categoryId);
    $r = $wynik->fetch_object();
    if ($wynik->num_rows > 0) {
        $categoryName = $r->categoryname;
    }
    $wynik->close();
    //$link->close();
    echo '<div style="position: absolute; z-index: 2; width: 100%; height: 100%; overflow: auto">';
    //poprzedni font:54px
    //echo '  <div style="position: absolute; top: 20%;left: 42%; font-size: 54px; color: #EB6B46 " align="center">';
    echo '  <div style="position: absolute; top: 20%;left: 5%; font-size: 54px; color: #ED1B24  " align="center">';
    echo '<p>KATEGORIA</p>';
    // poprzednia czcionaka:102
    echo '      <p style="font-size: 102px;" align="center" >' . $categoryName . '<p>';
    echo '<p></p>';
    echo '  </div>';
    echo '</div>';
}

function buildResultsTable($categoryId) {
    $categoryName = '';
    $link = dbConnection::getInstance()->getdbconnection();
    $wynik = $link->query('select * from categories where idcategory=' . $categoryId);
    $r = $wynik->fetch_object();
    if ($wynik->num_rows > 0) {
        $categoryName = $r->categoryname;
    }
    $wynik->close();
    //$link->close();
    echo '<div style="position: absolute; z-index: 2; width: 100%; height: 100%; overflow: auto">';
        echo '<div style="position: absolute; top: 2%;left: 20%; font-size: 24px; color: #ED1B24  " align="center">';
            echo '<p>Wyniki - ' . $categoryName .  '</p>';
        echo '  </div>';
        echo '<div>';
        echo '<table align="left" border="1">';
        echo '</table>';
        echo '</div>';
    echo '</div>';
}


?>

