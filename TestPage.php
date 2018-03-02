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
        <?php
        // put your code here
        include_once('./Gimnastic.php');
        $gym = new Gimanstic();
        $gym->readGimanstic(1, 1);
      
        echo $gym->getGymnasticName(),'<br>';
        echo $gym->getApparatus1Score(),'<br>';
        echo $gym->getApparatus2Score(),'<br>';
        $gym->setApparatus1Score(12.1);
        $gym->setApparatus2Score(10.0);
        echo $gym->getGymnasticName(),'<br>';
        echo $gym->getApparatus1Score(),'<br>';
        echo $gym->getApparatus2Score(),'<br>';
        $gym->updateGimnastic();
        $gym->readGimanstic(1, 1);
        echo $gym->getGymnasticName(),'<br>';
        echo $gym->getApparatus1Score(),'<br>';
        echo $gym->getApparatus2Score(),'<br>';
        ?>
    </body>
</html>
