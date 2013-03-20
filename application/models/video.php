<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:21
 * To change this template use File | Settings | File Templates.
 */

class Video extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->photos_path = './uploads/';
        $this->now = date("Y-m-d H:i:s");
        $this->load->library('image_lib');
    }
    ##########GET number Videos
    ############################
    function get_last($nb) {
        $this->db->select('*');
        $this->db->order_by('created', 'desc');
        $this->db->limit($nb);
        $this->db->from('videos');
        $q=$this->db->get();

        return $q->result();
    }
    ##########DELETE
    ############################
    function dell($id) {
        //delete FILE
        $video=$this->get_video($id);

        if ($video->thumbnail != ''){
            unlink( $this->photos_path.'thumbs/'.$video->thumbnail);
            unlink( $this->photos_path.'header/'.$video->thumbnail);
        }

        return $this->db->delete('videos', array('id' => $id));
    }
    ##########CREATE
    ############################
    function create() {
        //GET Thumbnails
        $thumbnail = $this->get_thumbnail($_POST['url']);
        $header = (isset($_POST['header[]'])? 1:0);
        $data['full_path'] = $this->photos_path.'thumbs/'.$thumbnail;
        $color = get_main_color($data);

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
            'thumbnail'=> $thumbnail,
            'r' => $color['r'],
            'g' => $color['g'],
            'b' => $color['b']
        );



        return $this->db->insert('videos',$data);
    }

    ##########EDIT
    ############################
    function edit($id) {
        //GET Thumbnails
        $thumbnail = $this->get_thumbnail($_POST['url']);
        $header = (isset($_POST['header[]'])? 1:0);
        $data['full_path'] = $this->photos_path.'thumbs/'.$thumbnail;
        $color = get_main_color($data);

        $data=array (
            'created'=> $this->now,
            'updated'=> $this->now,
            'title' => $_POST['title'],
            'url' => $_POST['url'],
            'photo_id'=> $_POST['photo_id'],
            'header' => $header,
            'language'=> $_POST['language'],
            'description'=> $_POST['description'],
            'thumbnail'=> $thumbnail,
            'r' => $color['r'],
            'g' => $color['g'],
            'b' => $color['b']
        );
        $this->db->where('id',$id);
        return $this->db->update('videos', $data);
    }
    ##########SORTED
    ############################
    function sorted() {
        foreach($_POST['sort'] as $place => $obj) {
            $data = array('position' => $place);
            $this->db->where('id', $obj);
            $this->db->update('videos', $data);
        }
        return true;
    }

    ##########Get All
    ############################
    function get_all() {
        $this->db->select('*');
        $this->db->order_by('position asc, created desc');
        $this->db->from('videos');
        $q = $this->db->get();

        return $q->result();
    }
    function get_video($id) {
        $q=$this->db->get_where('videos', array('id'=> $id));

        return $q->row();
    }

    ##########GET Thumbnail
    ############################
    function get_thumbnail($url) {
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
            if (isset($thumbnail)) {
                //UPLOAD THUMBNAILS
                $filename = $this->security->sanitize_filename(underscore($_POST['title'])).'.jpg';
                file_put_contents($this->photos_path.$filename, file_get_contents($thumbnail));
                $data['filename']=$filename;

                if (autoCrop($data)) {
                    create_thumbnail($data);
                    create_header($data);
                    unlink( $this->photos_path.$filename);
                }

                return $filename;
            }
            return '';

        }

    }

    ###PRIVATE FUNCTION
    #######################

    private function addhttp($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }
}