<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 15.03.13
 * Time: 14:50
 * To change this template use File | Settings | File Templates.
 */
class MY_Controller extends CI_Controller {
    public $layout_view = 'layout/default';
    function __construct() {
        parent::__construct();
        // Layout library loaded site wide
        $this->load->library('layout');

        // Site global resources


        $this->layout->js('assets/js/jquery-1.9.1.js');
        $this->layout->js('assets/js/jquery.dotdotdot-1.5.6.js');
        $this->layout->js('assets/js/jquery-ui-1.10.2.custom.js');
        $this->layout->js('assets/js/bootstrap.js');
        $this->layout->js('assets/js/application.js');
        $this->layout->menu('menu_default');


        $this->layout->css('assets/css/bootstrap_and_overrides.css');
        $this->layout->css('assets/css/application.css');
    }
}
class MY_ADMIN_Controller extends CI_Controller {
    public $layout_view = 'layout/default';
    function __construct() {
        parent::__construct();
        // Layout library loaded site wide
        $this->load->library('layout');

        // Site global resources

        $this->layout->js('assets/js/jquery-1.9.1.js');
        $this->layout->js('assets/js/jquery.dotdotdot-1.5.6.js');
        $this->layout->js('assets/js/jquery-ui-1.10.2.custom.js');
        $this->layout->js('assets/js/bootstrap.js');
        $this->layout->js('assets/js/application.js');
        $this->layout->menu('menu_admin');

        $this->layout->css('assets/css/bootstrap_and_overrides.css');
        $this->layout->css('assets/css/application.css');
    }
}