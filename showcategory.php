<?php
include_once './Connection.php';
include_once './CurrentStatus.php';
include_once './Gimnastic.php';

$id = null;
$newPageId = null;
$newGymId= 0;
if (!empty($_GET['idcat'])) {
    $id = $_REQUEST['idcat'];
}

if (!empty($_GET['idpage'])) {
    $newPageId = $_REQUEST['idpage'];
}

if (!empty($_GET['idnewgym'])) {
    $newGymId = $_REQUEST['idnewgym'];
}

echo 'idcat to:'.$id.'<br>';
echo 'idpage to:'.$newPageId.'<br>';
$categoryName = '';

$link = dbConnection::getInstance()->getdbconnection();
$link->set_charset("utf8");
$status = new CurrentStatus();
$status->ReadFCurrentStatus();


if (null == $id) {
    //header("Location: index.php");
    echo 'idcat to:'.$id.'<br>';
} else {
    $status->setCurrentCategory($id);
    if ($newPageId <> null){
        echo 'idpage to:'.$newPageId.'<br>';
       $status->setCurrentPage($newPageId);
       $status->setCurrentGymId(0);
    }
    $status->updateCurrentStatus();
?>
<script type="text/javascript">
  window.location.href='pilotpage.php';
  </script>
<?php
}
    $wynik = $link->query('select * from categories where idcategory=' . $status->getCurrentcategory());
    $r = $wynik->fetch_object();
    if ($wynik->num_rows > 0) {
        $categoryName = $r->categoryname;
    }
    $wynik->close();
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
        <div style align="center" >
            <h2>
                <p>Zmieniłes kategorię na: <?php echo $categoryName ?></p>
                <p>Strona:<?php echo $status->getCurrentPage() ?></p>
                <p>Kategoria:<?php echo $status->getCurrentcategory() ?></p>
                <p>Zawodniczka:<?php echo $status->getCurrentGymId() ?></p>
            </h2>
            <a href="pilotpage.php"><button>Powrot do pilota</button></a> 
        </div>
    </body>
</html>
