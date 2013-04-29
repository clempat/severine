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
        $this->load->library('pagination');
        $this->per_page=10;

        $this->layout->title("Séverine Lenglet : Prints");
    }
    public function french($offset=0) {
        $data['prints']=$this->Print_model->get_language('french');
        default_or_image($data['prints']);

        $config['base_url'] = site_url('prints/french');
        $config['total_rows'] = count($data['prints']);
        $config['per_page'] = $this->per_page;
        $config['uri_segment'] = 3;
        $data["prints"] = array_slice($data["prints"],$offset,$config['per_page']);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();


        $this->layout->view('prints/index',$data);
    }
    public function german($offset=0) {
        $data['prints']=$this->Print_model->get_language('german');
        default_or_image($data['prints']);

        $config['base_url'] = site_url('prints/german');
        $config['total_rows'] = count($data['prints']);
        $config['per_page'] = $this->per_page;
        $config['uri_segment'] = 3;
        $data["prints"] = array_slice($data["prints"],$offset,$config['per_page']);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->layout->view('prints/index',$data);
    }
    public function english($offset=0) {
        $data['prints']=$this->Print_model->get_language('english');
        default_or_image($data['prints']);

        $config['base_url'] = site_url('prints/english');
        $config['total_rows'] = count($data['prints']);
        $config['per_page'] = $this->per_page;
        $config['uri_segment'] = 3;
        $data["prints"] = array_slice($data["prints"],$offset,$config['per_page']);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->layout->view('prints/index',$data);
    }

    function index($offset=0){
        $data['prints'] = $this->Print_model->show($admin=true);
        default_or_image($data['prints']);

        $config['base_url'] = site_url('prints');
        $config['total_rows'] = count($data['prints']);
        $config['per_page'] = $this->per_page;
        $config['uri_segment'] = 2;
        $data["prints"] = array_slice($data["prints"],$offset,$config['per_page']);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->layout->view('prints/index', $data);
    }

    function view($uid) {
        $data["print"]=$this->Print_model->view($uid);
        $this->layout->view('prints/view', $data);
    }

}