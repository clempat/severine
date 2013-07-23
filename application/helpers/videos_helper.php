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
function video_player($video_local, $width='', $height='') {
    $url=addhttp($video_local->url);
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
                        $video_uri = $video_data['uri'];
                        if ($video_data['uri'] == $video_id) break 3;
                    }
                }

            }
            if(isset($video_to_display['mcf'])) {
                $playlist = urlencode('[[JSON]][{"file":"media/archive/'.$video_uri.'_h264midlow.mp4","image":"'.site_url('uploads/header/'.$video_local->thumbnail).'?'.now().'","streamer":"rtmp://streaming.mcfootage.com/ondemand/2800026086","provider":"rtmp"}]');
            } else {
                $json_url = "http://www.admiralcloud.com/player/json/".$video_uri;
                $json = file_get_contents($json_url,0,null,null);
                $json_output = json_decode($json, false);
                //LECTURE
                foreach ($json_output->movies[0]->mp4levels as $level) {
                    $levels[]=array(
                        "file"=>$level->src,
                        "bitrate"=>$level->bitrate,
                        "width"=>$level->width
                    );
                }
                foreach ($json_output->movies[0]->captions as $caption) {
                    $captions []= $caption->lang;
                    $captions_src[] = $caption->src;
                }
                if (isset($captions)) {
                    $captions = implode(",", $captions);
                    $captions_src = implode(",", $captions_src);
                } else {
                    $captions = "";
                    $captions_src="";

                }

                $new_json = array(
                    "caption.labels"=>$captions,
                    "captions.files"=>$captions_src,
                    "title"=>"Kapitel",
                    "description"=>"Beschreibung",
                    "levels"=>$levels,
                    "image"=> site_url('uploads/header/'.$video_local->thumbnail).'?'.now(),
                    "provider"=> "rtmp",
                    "streamer"=> "rtmp://s3a2tcgtacgbig.cloudfront.net/cfx/st/"
                );
                $playlist = urlencode('[[JSON]]['.json_encode($new_json).']');
            }
            $video_url = urlencode($url_original);
            $xml = urlencode('http://www.admiralcloud.com/skins/glow/glow.xml');
            $flashVar= $video_url.'&preload=metadata&id=videoplayer&backcolor=#000000&frontcolor=#ffffff&highcolor=#999999&screencolor=#000000&skin='.$xml.'&playlist='.$playlist.'&controlbar.position=over';
            $r = "<object type='application/x-shockwave-flash' data='http://www.admiralcloud.com/skins/player510.swf' width='100%' height='100%' bgcolor='#000000' tabindex='0'>";
            $r .="<param name='allowfullscreen' value='true'>
                    <param name='allowscriptaccess' value='always'>
                    <param name='seamlesstabbing' value='true'>
                    <param name='wmode' value='opaque'>
                    <param name='flashvars' value='netstreambasepath=$flashVar'></object>";
            return $r;

        break;
        case 'www.tvbvideo.de':
            $CI =& get_instance();
            $CI->load->library('simple_html_dom');
            $html = file_get_html($url_original);


            $r = html_entity_decode($html->find('#export_website_code', 0)->innertext());
            $r_html = str_get_html($r);
            $r = $r_html->find('.containerEpix',0)->innertext();
            return $r;
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