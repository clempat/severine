<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:02
 * To change this template use File | Settings | File Templates.
 */
class Prints extends MY_ADMIN_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('Print_model');
        $this->load->model('Photo');
        $this->load->helper('prints');

        if(!$this->User->isLoggedIn()){
            redirect ('admin/pages/login', 'refresh');
        }
        $this->layout->title("Séverine Lenglet : Videos management");
    }
    function index(){
        $data['prints'] = $this->Print_model->show();
        default_or_image($data['prints']);
        $this->layout->view('admin/prints/index', $data);
    }
    function add(){
        if ($this->input->post('add')) {
            if ($this->Print_model->insert()) {
                redirect('admin/prints', 'refresh');
            }
        }
        $data['photos'] = $this->Photo->get_all($admin=true);
        $this->layout->view('admin/prints/new', $data);
    }
    function edit($uid) {

    }
    function dell($uid) {

    }
}