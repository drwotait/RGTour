<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Turniej</title>
    </head>
    <body style="margin: 0; padding: 0; width: 100%; height: 100%; overflow: hidden">
        <!--?php
            require('./excApparatus.php');
        ?-->
        <!--  RGB zawodniczek: 0,109, 181  color: #006DB5  -->
        <!--  RGB czcionki: 235,107, 70 color: #EB6B46-->

        <div style="position: absolute; z-index: 2; width: 100%; height: 100%; overflow: auto">
            <div style="position: absolute; bottom: 0;right:0; margin: 3%; ">
                <table align="right" width="80%">
                    <tr >
                         <td colspan="2" style="font-size: 78px; color: color:rgb(121,33,129)  "  align="right" >Aleksandra Chełmecka</td>
                    </tr>
                    <tr>
                        <td style=" " align="right"><img src="img/rope_100.png"></td>
                        <td  style="font-size: 74px; color: #006DB5 " height="100px"  align="right"> 15,25 </td>
                     </tr>
                    <tr>
                        <td style=" " align="right"><img src="img/ribbon_100.png"></td>
                        <td style="font-size: 74px; color: #006DB5 " height="100px"  align="right"> 15,25 </td>
                    </tr>
                    <tr style="font-size: 90px; color: #EB6B46 ">
                        <td style="font-size: 70px; " align="center"> total</td>
                        <td style align="right"> 24,59</td>
                    </tr>
                </table>
            </div>
        </div>
    
        <div><img src="img/zawod15.jpg" alt="" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; z-index: 1" /></div>


    
    </body>
    
                    <!--?php
                    echo '<tr>';
                    $apparatus_one= GetApparatusImage('RIBBON');
                    $apparatus_two=GetApparatusImage('ROPE');                
                    echo "<td width=\"100\" background=\" $apparatus_one  \"width=\"100px\" align=\"center\" valign=\"middle\"</td>";
                    echo '<td  style="font-size: 74px; color: #006DB5 " height="100px"  align="right"> 15,25 </td>';
                    echo '</tr>';
                    
                    echo '<tr>';
                    echo "<td style=\"width=\"100px\" background=\" $apparatus_two  \"  align=\"center\" valign=\"middle\"</td>";
                    echo '<td style="font-size: 74px; color: #006DB5 " height="100px"  align="right"> 15,25 </td>';
                    echo '</tr>';
                    ?-->
    
</html>
