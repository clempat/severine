<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:23
 * To change this template use File | Settings | File Templates.
 */

class Site_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->now = date("Y-m-d H:i:s");
    }

    public function update($uid) {

        unset($_POST['valid']);

        $this->db->where('id',$uid);
        return $this->db->update('site', $_POST);
    }

    public function view($uid) {
        $q=$this->db->get_where('site', array('id'=> $uid));
        return $q->row();

    }
}