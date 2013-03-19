<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:21
 * To change this template use File | Settings | File Templates.
 */

class Videos_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->photos_path = './uploads/';
        $this->now = date("Y-m-d H:i:s");
        $this->load->library('image_lib');

    }

    #Add Video
    function create() {
        //GET Thumbnails
        $thumbnail = $this->get_thumbnails($_POST['url']);
        $header = (isset($_POST['header[]'])? 1:0);

        $data=array (
            'created'=> $this->now,
            'updated'=> $this->now,
            'title' => $_POST['title'],
            'url' => $_POST['url'],
            'photo_id'=> $_POST['photo_id'],
            'header' => $header,
            'position'=> '0',
            'language'=> $_POST['language'],
            'description'=> $_POST['description'],
            'youtube_thumbnail'=> $thumbnail

        );



        if ($this->db->insert('videos',$data)) {
            return true;
        } else {echo 'oups';}
    }

    #edit
    function edit($id) {

    }

    #Get Video
    function get($id) {

    }

    #Get all
    function show() {

    }


    #GET Thumbnail Video
    function get_thumbnails($url) {
        $this->load->library('upload');


        if (parse_url($url)) {
            $url = $this->addhttp($url);
            $url = parse_url($url);

            switch ($url['host']) {
                case 'www.youtube.com':
                    parse_str($url['query'],$data);
                    $video = $data['v'];
                    $thumbnail = "http://img.youtube.com/vi/$video/0.jpg";
                break;
                case 'youtu.be':
                    $video = $url['path'];
                    $thumbnail = "http://img.youtube.com/vi$video/0.jpg";
                break;
                case 'www.dailymotion.com':
                    $path = explode('/',$url['path']);
                    $video = $path[2];
                    $thumbnail = "http://www.dailymotion.com/thumbnail/video/$video";
                break;
                case 'vimeo.com':
                    $path = explode('/',$url['path']);
                    $video = end($path);

                    $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$video.php"));
                    $thumbnail = $hash[0]['thumbnail_large'];
                break;
            }

            //UPLOAD THUMBNAILS
            $filename = $this->security->sanitize_filename(underscore($_POST['title'])).'.jpg';
            file_put_contents($this->photos_path.$filename, file_get_contents($thumbnail));
            $data['filename']=$filename;

            $this->create_thumbnail($data);
            $this->create_header($data);
            unlink( $this->photos_path.$filename);

            return $this->photos_path.$filename;
        }

    }
###PRIVATE FUNCTION
#######################
    private function create_thumbnail($photo){
        $filename = $this->get_filename($photo);

        $config = array(
            'source_image'=>$this->photos_path.$filename,
            'new_image' =>  $this->photos_path.'thumbs/'.$filename,
            'width' => 300,
            'height' => 200,
            'maintain_ratio'=> false,
            'quality' => '100%'
        );
        $this->image_lib->initialize($config);
        if (!$this->image_lib->resize())
        {
            $this->session->set_flashdata( 'message', array( 'title' => 'Error', 'content' => $this->image_lib->display_errors(), 'type' => 'error' ));
            return false;
        } else { return true;}
    }
    private function create_header($photo){
        $filename = $this->get_filename($photo);

        $config = array (
            'source_image' => $this->photos_path.$filename,
            'new_image' => $this->photos_path.'header/'.$filename,
            'maintain_ratio' => false,
            'width' => 900,
            'height' => 600
        );
        $this->image_lib->initialize($config);
        if (!$this->image_lib->resize())
        {
            $this->session->set_flashdata( 'message', array( 'title' => 'Error', 'content' => $this->image_lib->display_errors(), 'type' => 'error' ));
            return false;
        } else { return true;}
    }

    private function get_filename($photo) {
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
    private function addhttp($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }
}