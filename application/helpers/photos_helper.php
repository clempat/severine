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
        $CI->session->set_flashdata( 'message', array( 'title' => 'Error', 'content' => $this->image_lib->display_errors(), 'type' => 'error' ));
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