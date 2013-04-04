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
        $this->layout->js('assets/js/prints.js');

        if(!$this->User->isLoggedIn()){
            redirect ('admin/pages/login', 'refresh');
        }
        $this->layout->title("Séverine Lenglet : Videos management");
    }
    function index(){
        $data['prints'] = $this->Print_model->show($admin=true);
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
        if ($this->input->post('valid')) {
            if ($this->Print_model->update($uid)) {
                redirect('admin/prints', 'refresh');
            }

        }

        $data['photos'] = $this->Photo->get_all($admin=true);
        $data["print"]=$this->Print_model->view($uid);
        $this->layout->view('admin/prints/edit', $data);
    }
    function dell($uid) {
        if($this->Print_model->delete($uid))
            redirect('admin/prints', 'refresh');
    }
    function sort() {
        $this->Print_model->sorted();

    }
}