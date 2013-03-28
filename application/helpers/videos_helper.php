<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 27.03.13
 * Time: 12:55
 * To change this template use File | Settings | File Templates.
 */
function thumbnail_or_image($videos) {
    $CI =& get_instance();
    $CI->load->model('Photo');

    if (is_array($videos)) {
        foreach ($videos as &$video) {
            if ($video->photo_id != 0) {
                $photo = $CI->Photo->get_photo($video->photo_id);
                $video->thumbnail = $photo->filename;
                $video->r = $photo->r;
                $video->g = $photo->g;
                $video->b = $photo->b;
            }
            $video->description = $CI->typography->nl2br_except_pre($video->description);
        }
    } else {
        if ($videos->photo_id != 0) {
            $photo = $CI->Photo->get_photo($videos->photo_id);
            $videos->thumbnail = $photo->filename;
            $videos->r = $photo->r;
            $videos->g = $photo->g;
            $videos->b = $photo->b;
        }
        $videos->description = $CI->typography->nl2br_except_pre($videos->description);
    }

}
function video_player($url, $width='', $height='') {
    $url=addhttp($url);
    $url_original = $url;
    $url = parse_url($url);

    switch ($url['host']) {
        case 'www.youtube.com':
            parse_str($url['query'],$data);
            $video = $data['v'];
            $r = "<iframe width='".($width?$width:560)."' height='".($height?$height:360)."' src='//www.youtube.com/embed/$video?autoplay=1&autohide=1' frameborder='0' allowfullscreen ></iframe>";
            return $r;

            break;
        case 'youtu.be':
            $video = $url['path'];
            $r = "<iframe id='ytplayer' type='text/html' width='".($width?$width:560)."' height='".($height?$height:360)."' src='//www.youtube.com/embed/$video?autoplay=1&rel=0&autohide=1'  frameborder='0' allowfullscreen ></iframe>";
            return $r;
            break;
        case 'www.dailymotion.com':
            $path = explode('/',$url['path']);
            $video = $path[2];
            $r="<iframe src='http://www.dailymotion.com/embed/video/$video?logo=0' width='".($width?$width:560)."' height='".($height?$height:360)."' frameborder='0'></iframe>";
            return $r;
            break;
        case 'vimeo.com':
            $path = explode('/',$url['path']);
            $video = end($path);
            $r= "<iframe src='http://player.vimeo.com/video/$video' width=''".($width?$width:560)."' height='".($height?$height:360)."' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>";
            return $r;
            break;
        case 'www.mmpro.de':
            $CI =& get_instance();
            $CI->load->library('simple_html_dom');
            $html = file_get_html($url_original);
            foreach ($html->find('link[rel=canonical]') as $element){
                $canonical_url = $element->href;
            }
            $canonical_url = addhttp($canonical_url);
            $canonical_url = parse_url($canonical_url);
            parse_str($canonical_url['query'],$data);
            $video_id = $data['videoId'];
            $json_url = "http://www.mmpro.de/cache/videolist.json";
            $json = file_get_contents($json_url,0,null,null);
            $json_output = json_decode($json, true);
            foreach ($json_output as $object) {
                foreach ($object as $video) {
                    $video_to_display = $video;
                    foreach ($video["video"] as $video_data) {
                        if ($video_data['uri'] == $video_id) break 3;
                    }
                }

            }
        break;
        default:
            return '<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Warning!</strong> Unknown problem with the video, contact the webmaster.</div>';
        break;
    }
}

function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}