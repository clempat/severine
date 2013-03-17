<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 17.03.13
 * Time: 17:20
 * To change this template use File | Settings | File Templates.
 */

##########GET MAIN COLOR Of pictures
############################
function get_main_color($photo) {

    $rTotal = 0;
    $gTotal = 0;
    $bTotal =0;
    $total = 0;

    $i = imagecreatefromjpeg($photo['full_path']);
    for ($x=imagesx($i)-10;$x<imagesx($i);$x++) {
        for ($y=0;$y<imagesy($i);$y++) {
            $rgb = imagecolorat($i,$x,$y);
            $r   = ($rgb >> 16) & 0xFF;
            $g   = ($rgb >> 8)  & 0xFF;
            $b   = $rgb & 0xFF;
            $rTotal += $r;
            $gTotal += $g;
            $bTotal += $b;
            $total++;
        }
    }

    $color = array (
        'r' =>  round($rTotal/$total),
        'g' => round($gTotal/$total),
        'b' => round($bTotal/$total)
    );

    return $color;
}

function text_color($r,$g,$b) {
    $new_r= (255-$r>127)? 234:51;
    $new_g= (255-$g>127)? 234:51;
    $new_b = (255-$b>127)? 234:51;

    $color = "rgb(".$new_r.",".$new_g.",".$new_b.")";

    return $color;
}