<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('./Connection.php');

class Gimanstic {

    private $gymId ;
    private $gymnasticName = '';
    private $apparatus1 = '';
    private $apparatus2 = '';
    private $apparatus1Score = 0.00;
    private $apparatus2Score = 0.00;
    private $ctaegoryId ;
    private $startingOrder;
    private $app1image = '';
    private $app2image = '';

    function getGymId() {
        return $this->gymId;
    }

    function getGymnasticName() {
        return $this->gymnasticName;
    }

    function getApparatus1() {
        return $this->apparatus1;
    }

    function getApparatus2() {
        return $this->apparatus2;
    }

    function getApparatus1Score() {
        return $this->apparatus1Score;
    }

    function getApparatus2Score() {
        return $this->apparatus2Score;
    }

    function getCtaegoryId() {
        return $this->ctaegoryId;
    }

    function getStartingOrder() {
        return $this->startingOrder;
    }

    function getApp1image() {
        return $this->app1image;
    }

    function getApp2image() {
        return $this->app2image;
    }

    function setGymId($gymId) {
        $this->gymId = $gymId;
    }

    function setGymnasticName($gymnasticName) {
        $this->gymnasticName = $gymnasticName;
    }

    function setApparatus1($apparatus1) {
        $this->apparatus1 = $apparatus1;
    }

    function setApparatus2($apparatus2) {
        $this->apparatus2 = $apparatus2;
    }

    function setApparatus1Score($apparatus1Score) {
        $this->apparatus1Score = $apparatus1Score;
    }

    function setApparatus2Score($apparatus2Score) {
        $this->apparatus2Score = $apparatus2Score;
    }

    function setCtaegoryId($ctaegoryId) {
        $this->ctaegoryId = $ctaegoryId;
    }

    function setStartingOrder($startingOrder) {
        $this->startingOrder = $startingOrder;
    }

    function setApp1image($app1image) {
        $this->app1image = $app1image;
    }

    function setApp2image($app2image) {
        $this->app2image = $app2image;
    }

    function GetApparatusImage($apparatusName) {
        switch ($apparatusName) {
            case 'W-A':
                return 'img/w-a_100.png';
            case 'CLUBS':
                return "img/clubs_100.png";
            case 'RIBBON':
                return "img/ribbon_100.png";
            case 'BALL':
                return "img/ball_100.png";
            case 'HOOP':
                return "img/hoop_100.png";
            case 'ROPE':
                return "img/rope_100.png";
            default:
                return'';
        }
    }

    function readGimanstic($gymId, $categoryid) {
        $link = dbConnection::getInstance()->getdbconnection();
        $link->set_charset("utf8");
        $wynik = $link->query('select idgym, gymname,app1name,app2name,app1score,app2score from gymnastics where idGym=' . $gymId);
        $r = $wynik->fetch_object();
        if ($wynik->num_rows > 0) {
            $this->setGymId($r->idgym);
            $this->setGymnasticName($r->gymname);
            $this->setApparatus1($r->app1name);
            $this->setApparatus2($r->app2name);
            $this->setApparatus1Score($r->app1score);
            $this->setApparatus2Score($r->app2score);
        }
        $wynik->close();
        
    }

    function updateGimnastic() {
        $link = dbConnection::getInstance()->getdbconnection();
        //
        $stmt = $link->prepare("UPDATE gymnastics SET app1score = ? ,app2score = ? WHERE idGym = ?");
        if (!$stmt) {
            echo 'Error: ' . $link->error;
        }
        
        $stmt->bind_param('ddi', $this->apparatus1Score, $this->apparatus2Score, $this->gymId);
        $stmt->execute();
        $stmt->close();
    }

    function renderGimansticPage() {


        $totalScore = sprintf("%01.2f", $this->getApparatus1Score() + $this->getApparatus2Score());
        $this->setApp1image($this->GetApparatusImage($this->getApparatus1()));
        $this->setApp2image($this->GetApparatusImage($this->getApparatus2()));
        //echo '<div style="position: absolute; z-index: 2; width: 100%; height: 100%; overflow: auto">';
        echo ' <div style="position: absolute; top: 0;left:0; margin: 3%; ">';
        echo '    <table align="left" width="85%" border = "0">';
        echo '        <tr >';
        echo '            <td colspan="3" style="font-size: 102px; color: #060C0C "  align="center" >' . $this->getGymnasticName() . '</td>';
        echo '        </tr>';
        echo '        <tr>';
        echo '            <td style=" " align="right"><img src="' . $this->getApp1image() . '" height="120px"></td>';
        echo '            <td width=20px></td>';
        echo '            <td  style="font-size: 88px; color: #ED1B24 " height="50px"  align="right">' . sprintf("%01.2f", $this->getApparatus1Score()) . '</td>';
        echo '        </tr>';
        echo '        <tr>';
        if ($this->getApparatus2() == "") {
            echo '<td colspan="3" style="font-size: 74px; color: #ED1B24 "  align="right" ></td>';
        } else {
            echo '          <td style=" " align="right"><img src="' . $this->getApp2image() . '" height="120px"></td>';
            echo '          <td width=20px></td>';            
            echo '          <td style="font-size: 88px; color: #ED1B24 " height="50px"  align="right">' . sprintf("%01.2f", $this->getApparatus2Score()) . '</td>';
        }
        echo '        </tr>';
        echo '        <tr style="font-size: 90px; color: #060C0C ">';
        echo '           <td style="font-size: 70px; " align="center"> total</td>';
        echo '          <td width=20px></td>';
        echo '           <td style align="right">' . $totalScore . '</td>';
        echo '        </tr>';
        echo '    </table>';
        echo ' </div>';
        //echo '</div>';
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
}
