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
    }
    public function french() {
        $data['videos']=$this->Video->get_language('french');
        thumbnail_or_image($data['videos']);
        $this->layout->view('videos/index',$data);
    }
    public function german() {
        $data['videos']=$this->Video->get_language('german');
        thumbnail_or_image($data['videos']);
        $this->layout->view('videos/index',$data);
    }
    public function english() {
        $data['videos']=$this->Video->get_language('english');
        thumbnail_or_image($data['videos']);
        $this->layout->view('videos/index',$data);
    }
    public function index() {
        $data['videos']=$this->Video->get_all();
        thumbnail_or_image($data['videos']);
        $this->layout->view('videos/index',$data);
    }
    public function view($id) {
        $data['video']=$this->Video->get_video($id);
        thumbnail_or_image($data['video']);
        $this->layout->view('videos/view', $data);
    }
}