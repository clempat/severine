<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:02
 * To change this template use File | Settings | File Templates.
 */
class Videos extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Video');
        $this->load->helper('videos');
        $this->layout->title("Séverine Lenglet : Videos");
        $this->layout->js('assets/js/jquery.quicksand.js');
        $this->load->library('pagination');
        $this->per_page = 9;


    }
    public function french($offset=0) {
        $data['videos']=$this->Video->get_language('french');
        thumbnail_or_image($data['videos']);
        $config['base_url'] = site_url('videos/french');
        $config['total_rows'] = count($data['videos']);
        $config['per_page'] = $this->per_page;
        $config['uri_segment'] = 3;
        $data["videos"] = array_slice($data["videos"],$offset,$config['per_page']);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->layout->view('videos/index',$data);
    }
    public function german($offset=0) {
        $data['videos']=$this->Video->get_language('german');
        thumbnail_or_image($data['videos']);
        $config['base_url'] = site_url('videos/german');
        $config['total_rows'] = count($data['videos']);
        $config['per_page'] = $this->per_page;
        $config['uri_segment'] = 3;
        $data["videos"] = array_slice($data["videos"],$offset,$config['per_page']);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->layout->view('videos/index',$data);
    }
    public function english($offset=0) {
        $data['videos']=$this->Video->get_language('english');
        thumbnail_or_image($data['videos']);
        $config['base_url'] = site_url('videos/english');
        $config['total_rows'] = count($data['videos']);
        $config['per_page'] = $this->per_page;
        $config['uri_segment'] = 3;
        $data["videos"] = array_slice($data["videos"],$offset,$config['per_page']);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $this->layout->view('videos/index',$data);
    }
    public function index($offset=0) {
        $data['videos']=$this->Video->get_all();
        thumbnail_or_image($data['videos']);

        $config['base_url'] = site_url('videos');
        $config['total_rows'] = count($data['videos']);
        $config['per_page'] = $this->per_page;
        $data["videos"] = array_slice($data["videos"],$offset,$config['per_page']);

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->layout->view('videos/index',$data);
    }
    public function view($id) {
        $player = null;
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        if ($this->cache->apc->is_supported())
        {
            if ($_data = $this->cache->apc->get('VIDEO_PLAYER_'.$id))
            {
                $player = $_data;
            }
        }

        $data['video']=$this->Video->get_video($id);
        thumbnail_or_image($data['video']);

        if (empty($player)) {
            $data['player'] = video_player($data['video']);
            $this->cache->apc->save('VIDEO_PLAYER_'.$id,$data['player'], 1339200);
        } else {
            $data['player'] = $player;
        }

        $this->layout->view('videos/view', $data);
    }
}