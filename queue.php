<?php
/**
 * Created by PhpStorm.
 * User: madw
 * Date: 2016-11-16
 * Time: 20:37
 */


function printreq($rqe)
{
    foreach ($rqe as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }
}

?>

<?php
echo "Request";
printreq($_REQUEST);
echo '<p>';
echo "post";
printreq($_POST);
echo '<p>';
echo "get";
printreq($_GET);


?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div style align="center" >
            <h2>
                <p>Wyświetlono zawodniczke o id:</p>
</h2>
<a href="pilotpage.php"><button>Powrot do pilota</button></a>
</div>
</body>
</html-->