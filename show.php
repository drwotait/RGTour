<?php
include_once './Connection.php';
include_once './CurrentStatus.php';
include_once './Gimnastic.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}


$link = dbConnection::getInstance()->getdbconnection();
$link->set_charset("utf8");
$status = new CurrentStatus();
$status->ReadFCurrentStatus();


if (null == $id) {
    header("Location: index.php");
} else {
    $status->setCurrentGymId($id);
    $status->setCurrentPage(2);
    $status->updateCurrentStatus();
?>
<script type="text/javascript">
  window.location.href='pilotpage.php';
  </script>
<?php
}
$gym = new Gimanstic();
$gym->readGimanstic($id, 1);
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
                <p>Wyświetlono zawodniczke o id:<?php echo $id ?></p>
                <p><?php echo $gym->getGymnasticName() ?></p>
            </h2>
            <a href="pilotpage.php"><button>Powrot do pilota</button></a> 
        </div>
    </body>
</html>
