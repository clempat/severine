<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 04.04.13
 * Time: 15:08
 * To change this template use File | Settings | File Templates.
 */
function default_or_image($prints) {
    $CI =& get_instance();
    $CI->load->model('Photo');

    if (is_array($prints)) {
        foreach ($prints as &$print) {
            if ($print->photo_id != 0) {
                $photo = $CI->Photo->get_photo($print->photo_id);
                $print->thumbnail = './uploads/thumbs/'.$photo->filename;
            } else {
                $print->thumbnail = './assets/img/print_no_photo.png';
            }
        }
    } else {
        if ($prints->photo_id != 0) {
            $photo = $CI->Photo->get_photo($prints->photo_id);
            $prints->thumbnail = $photo->filename;
        } else {
            $prints->thumbnail = './assets/img/print_no_photo.png';
        }
    }

}