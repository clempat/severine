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
        $this->load->model('User_model');
        $this->load->model('Videos_model');
        if(!$this->User_model->isLoggedIn()){
            redirect ('admin/pages/login', 'refresh');
        }
        $this->layout->title("Séverine Lenglet : Videos management");
    }

    function edit($id) {

        $this->layout->view('admin/videos/edit');

    }
    function show($id) {

    }
    function index($id) {

    }
    function add() {
        if ($this->input->post('add')) {
            if ($this->Videos_model->create()) {

            }

        }
        $this->layout->js('assets/js/purl.js');
        $this->layout->js('assets/js/videos.js');
        $this->load->model('Photos_model');
        $data['photos'] = $this->Photos_model->get_all();
        $this->layout->view('admin/videos/new', $data);
    }

}