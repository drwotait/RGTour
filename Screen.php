<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html xmlns:cursor="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8" http-equiv="refresh" content="3">
        <title></title>
    </head>
    <body style="margin: 0; padding: 0; width: 100%; height: 100%; overflow: hidden">
        <div style="position: absolute; z-index: 2; width: 100%; height: 100%; overflow: hidden; cursor:none">
        <?php
        include_once './Gimnastic.php';
        include_once('./Connection.php') ;
        include_once('./TourStartPage.php');
        require './Category.php';
        include_once('./CurrentStatus.php');
       
        $status = new CurrentStatus();
        $status->ReadFCurrentStatus();
        
        $gim = new Gimanstic();
        $gim->readGimanstic($status->getCurrentGymId(), $status->getCurrentCategory());
        
        switch ($status->getCurrentPage()) {
            case 0:
                buildStartPage();
                break;
            case 1:
                //buildResultsTable($status->getCurrentCategory());
                buildCategoryPage($status->getCurrentCategory());
                break;
            case 2:
                $gim->renderGimansticPage();
                break;
            default:
                buildStartPage();
        }
        ?>
        </div>
        <div><img src="img/zawod16a.jpg" alt="" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; z-index: 1" /></div> 
    </body>
</html>
