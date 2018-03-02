<?php
include_once './Connection.php';
include_once './CurrentStatus.php';
include_once './Gimnastic.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

$gym = new Gimanstic();
$app1score = 0.00;
$app2score = 0.00;

if (null == $id) {
    header("Location: index.php");
} else {
    $gym->readGimanstic($id, 1);
}


if (isset($_POST['btn-update'])) {
    echo
    $app1score = str_replace(',', '.', $_POST['app1_score']);
        //str2num($_POST['app1_score']);
    //echo $app2score;
    $gym->setApparatus1Score($app1score);
    if(isset($_POST['app2_score'])){
        //$app2score = str2num($_POST['app2_score']);
        $app2score = str_replace(',', '.', $_POST['app2_score']);
    $gym->setApparatus2Score($app2score);
    }

    $gym->updateGimnastic();
    echo '';
    ?>
    <script type="text/javascript">
        window.location.href = 'pilotpage.php';
    </script>
    <?php
}


function str2num($sNumber)
{
    $aConventions = localeConv();
    $sNumber = trim((string) $sNumber);
    $bIsNegative = (0 === $aConventions['n_sign_posn'] && '(' === $sNumber{0} && ')' === $sNumber{strlen($sNumber) - 1});
    $sCharacters = $aConventions['decimal_point'].
        $aConventions['mon_decimal_point'].
        $aConventions['negative_sign'];
    $sNumber = preg_replace('/[^'.preg_quote($sCharacters).'\d]+/', '', trim((string) $sNumber));
    $iLength = strlen($sNumber);
    if (strlen($aConventions['decimal_point']))
    {
        $sNumber = str_replace($aConventions['decimal_point'], '.', $sNumber);
    }
    if (strlen($aConventions['mon_decimal_point']))
    {
        $sNumber = str_replace($aConventions['mon_decimal_point'], '.', $sNumber);
    }
    $sNegativeSign = $aConventions['negative_sign'];
    if (strlen($sNegativeSign) && 0 !== $aConventions['n_sign_posn'])
    {
        $bIsNegative = ($sNegativeSign === $sNumber{0} || $sNegativeSign === $sNumber{$iLength - 1});
        if ($bIsNegative)
        {
            $sNumber = str_replace($aConventions['negative_sign'], '', $sNumber);
        }
    }
    $fNumber = (float) $sNumber;
    if ($bIsNegative)
    {
        $fNumber = -$fNumber;
    }
    return $fNumber;
}

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
        <title>Wprowadzanie wyniku dla: <?php echo $gym->getGymnasticName(); ?></title>
    </head>
    <body>

    <center>

        <div id="body">
            <div id="content">
                <form method="post">
                    
                    <table align="center">
                        <tr>
                            <td>Przybór 1</td>
                            <td><input type="text" name="app1_score" placeholder="Przybór 1" value="<?php echo $gym->getApparatus1Score(); ?>" required /></td>
                        </tr>
                        <?php
                        if($gym->getApparatus2() <> ''){
                        echo '<tr>';
                            echo '<td>Przybór 2</td>';
                            echo'<td><input type="text" name="app2_score" placeholder="Przybór 2" value="'. $gym->getApparatus2Score().'" required /></td>';
                        echo '</tr>';
                        }
                        ?>
                        <tr>
                            <td>
                                <button type="submit" name="btn-update"><strong>Zapisz wynik</strong></button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </center>
</body>
</html>
