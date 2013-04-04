<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:01
 * To change this template use File | Settings | File Templates.
 */
class Prints extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Print_model');
        $this->load->model('Photo');
        $this->load->helper('prints');
        $this->layout->js('assets/js/jquery.quicksand.js');

        $this->layout->title("Séverine Lenglet : Prints");
    }
    public function french() {
        $data['prints']=$this->Print_model->get_language('french');
        default_or_image($data['prints']);
        $this->layout->view('prints/index',$data);
    }
    public function german() {
        $data['prints']=$this->Print_model->get_language('german');
        default_or_image($data['prints']);
        $this->layout->view('prints/index',$data);
    }
    public function english() {
        $data['prints']=$this->Print_model->get_language('english');
        default_or_image($data['prints']);
        $this->layout->view('prints/index',$data);
    }

    function index(){
        $data['prints'] = $this->Print_model->show($admin=true);
        default_or_image($data['prints']);
        $this->layout->view('prints/index', $data);
    }

    function view($uid) {
        $data["print"]=$this->Print_model->view($uid);
        $this->layout->view('prints/view', $data);
    }

}