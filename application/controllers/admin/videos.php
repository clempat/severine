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
        $this->load->model('User');
        $this->load->model('Video');
        if(!$this->User->isLoggedIn()){
            redirect ('admin/pages/login', 'refresh');
        }
        $this->layout->title("Séverine Lenglet : Videos management");
    }
    function dell($id){
        if ($this->Video->dell($id)) {
            redirect('admin/videos', 'refresh');
        } else {
            redirect('admin/videos', 'refresh');
        }
    }
    function edit($id) {

        $this->layout->view('admin/videos/edit');

    }
    function show($id) {

    }
    function index() {
        $data['videos']=$this->Video->get_all();

        $this->layout->view('admin/videos/index', $data);
    }
    function add() {
        if ($this->input->post('add')) {
            if ($this->Video->create()) {

            }

        }
        $this->layout->js('assets/js/purl.js');
        $this->layout->js('assets/js/videos.js');
        $this->load->model('Photo');
        $data['photos'] = $this->Photo->get_all();
        $this->layout->view('admin/videos/new', $data);
    }

}