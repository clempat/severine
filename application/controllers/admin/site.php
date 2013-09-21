<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:02
 * To change this template use File | Settings | File Templates.
 */
class Site extends MY_ADMIN_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('Site_model');

        //$this->layout->js('assets/js/site.js');
        $this->layout->js('assets/js/ckeditor/ckeditor.js');

        if(!$this->User->isLoggedIn()){
            redirect ('admin/pages/login', 'refresh');
        }
        $this->layout->title("Séverine Lenglet : Website management");
    }
    function about(){

        if ($this->input->post('valid')) {
            if ($this->Site_model->update(1)) {
                redirect('admin/site/about', 'refresh');
            }
        }

        $data = array();
        $data["about"]=$this->Site_model->view(1);

        $this->layout->view('admin/site/about', $data);
    }

}