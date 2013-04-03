<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 19.03.13
 * Time: 10:00
 * To change this template use File | Settings | File Templates.
 */


function create_thumbnail($photo, $photos_path= "./uploads/"){
    $CI =& get_instance();
    $CI->load->library('image_lib');

    $filename = get_filename($photo);
    $source_image = (file_exists($photos_path.'header/'.$filename))? $photos_path.'header/'.$filename : $photos_path.$filename;
    $config = array(
        'source_image'=>$source_image,
        'new_image' =>  $photos_path.'thumbs/'.$filename,
        'width' => 300,
        'height' => 200,
        'maintain_ratio'=> false,
        'quality' => '100%'
    );
    $CI->image_lib->initialize($config);
    if (!$CI->image_lib->resize())
    {
        $CI->session->set_flashdata( 'message', array( 'title' => 'Error', 'content' => $CI->image_lib->display_errors(), 'type' => 'error' ));
        return false;
    } else { return true;}
}

function create_header($photo, $photos_path= "./uploads/"){
    $CI =& get_instance();
    $CI->load->library('image_lib');
    $filename = get_filename($photo);

    $config = array (
        'source_image' => $photos_path.$filename,
        'new_image' => $photos_path.'header/'.$filename,
        'maintain_ratio' => false,
        'width' => 900,
        'height' => 600
    );
    $CI->image_lib->initialize($config);
    if (!$CI->image_lib->resize())
    {
        $CI->session->set_flashdata( 'message', array( 'title' => 'Error', 'content' => $CI->image_lib->display_errors(), 'type' => 'error' ));
        return false;
    } else { return true;}
}

function get_filename($photo) {
    if (is_object($photo )) {
        $filename = $photo->filename;
    }
    elseif (is_array($photo)){
        $filename = $photo['filename'];
    } else {
        return false;
    }
    return $filename;
}

##########GET MAIN COLOR Of pictures
############################
function get_main_color($photo) {

    $rTotal = 0;$gTotal = 0;$bTotal =0;$total = 0;

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
    $cond_r= (255-$r>127)? 1:0;
    $cond_g= (255-$g>127)? 1:0;
    $cond_b = (255-$b>127)? 1:0;
    $new_rgb = ($cond_r+$cond_g+$cond_b >=2)? 234:51;
    $color = "rgb(".$new_rgb.",".$new_rgb.",".$new_rgb.")";

    return $color;
}

function autoCrop($photo) {
    $image_path = "./uploads/".get_filename($photo);

    $jpg = imagecreatefromjpeg($image_path);
    $black = array("red" => 60, "green" => 60, "blue" => 60, "alpha" => 0);

    $removeTop = 0;
    for($y = 0; $y < imagesy($jpg); $y++) {
        $rTotal = 0;$gTotal = 0;$bTotal =0;$total = 0;
        for($x = 0; $x < imagesx($jpg); $x++) {
            $rgb = imagecolorat($jpg,$x,$y);
            $r   = ($rgb >> 16) & 0xFF;
            $g   = ($rgb >> 8)  & 0xFF;
            $b   = $rgb & 0xFF;
            $rTotal += $r;
            $gTotal += $g;
            $bTotal += $b;
            $total++;
        }
        $color = array("red" => round($rTotal/$total), "green" => round($gTotal/$total), "blue" => round($bTotal/$total), "alpha" => 0);
        if($color["red"] > $black["red"] || $color["green"] > $black["green"] || $color["blue"] > $black["blue"] ) {break;}
        $removeTop += 1;
    }

    $removeBottom = 0;
    for($y = imagesy($jpg)-1; $y > 0; $y--) {
        $rTotal = 0;$gTotal = 0;$bTotal =0;$total = 0;
        for($x = 0; $x < imagesx($jpg); $x++) {
            $rgb = imagecolorat($jpg,$x,$y);
            $r   = ($rgb >> 16) & 0xFF;
            $g   = ($rgb >> 8)  & 0xFF;
            $b   = $rgb & 0xFF;
            $rTotal += $r;
            $gTotal += $g;
            $bTotal += $b;
            $total++;
        }
        $color = array("red" => round($rTotal/$total), "green" => round($gTotal/$total), "blue" => round($bTotal/$total), "alpha" => 0);
        if($color["red"] > $black["red"] || $color["green"] > $black["green"] || $color["blue"] > $black["blue"] ) {break;}
        $removeBottom += 1;
    }
    $height = imagesy($jpg)-($removeBottom+$removeTop);
    if ($height<0) {$height=imagesy($jpg); $removeTop=0;}
    $CI =& get_instance();
    $config = array (
        'source_image' => $image_path,
        'y_axis' => $removeTop,
        'height' => $height

    );

    $CI->image_lib->initialize($config);
    $CI->image_lib->crop();
    return true;
}