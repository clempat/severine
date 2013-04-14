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
    function get_nb($nb, $from=0) {
        $this->db->select('*');
        $this->db->order_by('position asc, created desc');
        $this->db->limit($nb, $from);
        $this->db->from('videos');
        $q=$this->db->get();

        return $q->result();
    }
    ##########GET Video language
    ############################
    function get_language($language,$admin = 'false') {
        $this->db->select('*');
        $this->db->order_by('position asc, created desc');
        $this->db->where('language', $language);
        if(!$admin) {$this->db->where('published', true);}
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
        if ($thumbnail) {

            $header = (isset($_POST['header'])? true:false);
            $published = (isset($_POST['published'])? true:false);
            $position = (isset($_POST['pull_end']))? $this->get_last_position()+1 : 0;

            $data['full_path'] = $this->photos_path.'thumbs/'.$thumbnail;
            $color = get_main_color($data);

            $data=array (
                'published'=> $published,
                'created'=> $this->now,
                'updated'=> $this->now,
                'title' => $_POST['title'],
                'url' => $_POST['url'],
                'photo_id'=> $_POST['photo_id'],
                'header' => $header,
                'position'=> $position,
                'language'=> $_POST['language'],
                'description'=> $_POST['description'],
                'thumbnail'=> $thumbnail,
                'r' => $color['r'],
                'g' => $color['g'],
                'b' => $color['b']
            );



            return $this->db->insert('videos',$data);
        }

    }
    ##########DELETE PHOTO
    ############################
    function dell_photo($id){

        $this->db->where('photo_id',$id);
        return $this->db->update('videos', array('photo_id'=>''));
    }
    ##########EDIT
    ############################
    function edit($id) {
        //GET Thumbnails
        $thumbnail = $this->get_thumbnail($_POST['url']);
        if ($thumbnail) {
            $header = (isset($_POST['header'])? true:false);
            $data['full_path'] = $this->photos_path.'thumbs/'.$thumbnail;
            $published = (isset($_POST['published'])? true:false);
            $color = get_main_color($data);

            $data=array (
                'published'=> $published,
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
    function get_all($admin=false) {
        $this->db->select('*');
        $this->db->order_by('position asc, created desc');
        $this->db->from('videos');
        if(!$admin) {$this->db->where('published', true);}
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
        $url_original = $url;

        if (parse_url($url)) {
            $url = $this->addhttp($url);
            $url = parse_url($url);

            switch ($url['host']) {
                case 'www.youtube.com':
                    parse_str($url['query'],$data);
                    $video = $data['v'];
                    $video_data = get_json("https://www.googleapis.com/youtube/v3/videos?id=$video&part=snippet&key=AIzaSyBRa_48GW6LpDcB8VlQxrt5alf-4-GTThQ");


                    $thumbnail = $video_data->items[0]->snippet->thumbnails->high->url;

                break;
                case 'youtu.be':
                    $video = str_replace('/','',$url['path']);
                    $json=get_json("https://www.googleapis.com/youtube/v3/videos?id=$video&part=snippet&key=AIzaSyBRa_48GW6LpDcB8VlQxrt5alf-4-GTThQ");
                    $video_data = json_decode($json);
                    $thumbnail = $video_data->items[0]->snippet->thumbnails->high->url;
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
                case 'www.mmpro.de':
                    $this->load->library('simple_html_dom');
                    $html = file_get_html($url_original);
                    foreach ($html->find('link[rel=canonical]') as $element){
                        $canonical_url = $element->href;
                    }
                    $canonical_url = $this->addhttp($canonical_url);
                    $canonical_url = parse_url($canonical_url);
                    parse_str($canonical_url['query'],$data);
                    $video_id = $data['videoId'];
                    $json_output = get_json("http://www.mmpro.de/cache/videolist.json",true);
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
                        $thumbnail = "http://www.mcfootage.com/imagereplace.php?width=900&height=600&kunde=archive&file=".$video_to_display['picture'];
                    } else {
                        $json_output = get_json("http://www.admiralcloud.com/player/json/".$video_uri);
                        $thumbnail=$json_output->movies[0]->jpg;
                    }

                    break;
                    default:
                        echo "Je ne connais pas ce site web... Veuillez vérifier le lien.";
                    break;
            }
            if (isset($thumbnail)) {
                //UPLOAD THUMBNAILS
                $filename = 'import_'.$this->security->sanitize_filename(underscore($_POST['title'])).'.jpg';
                grab_image($thumbnail,$this->photos_path.$filename);
                $data['filename']=$filename;

                if (autoCrop($data)) {
                    create_thumbnail($data);
                    create_header($data);
                    unlink( $this->photos_path.$filename);
                }

                return $filename;
            } else {return false;}
        } else {return false;}

    }
    function get_for_header() {
        $this->db->select('*');
        $this->db->order_by('position asc, created desc');
        $this->db->from('videos');
        $this->db->where('header', true);
        $q = $this->db->get();

        return $q->result();
    }

    ###PRIVATE FUNCTION
    #######################

    private function addhttp($url) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }
    private function get_last_position() {
        $this->db->select_max('position');
        $query = $this->db->get('videos');

        $result = $query->row();

        return $result->position;
    }
}