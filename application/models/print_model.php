<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 14.03.13
 * Time: 19:23
 * To change this template use File | Settings | File Templates.
 */

class Print_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->now = date("Y-m-d H:i:s");
    }
    public function insert() {
        $published = (isset($_POST['published'])? true:false);
        unset($_POST['add']);
        $extra = array(
            'created'=>$this->now,
            'updated'=>$this->now,
            'published'=>$published
        );
        $data = array_merge($_POST, $extra);
        $this->db->insert('prints',$data);
    }
    public function update($uid) {

    }
    public function delete($uid) {

    }
    public function view($uid) {


    }
    public function show($admin=false) {
        $this->db->select('*');
        $this->db->order_by('position asc, created desc');
        $this->db->from('prints');
        if(!$admin) {$this->db->where('published', true);}
        $q = $this->db->get();

        return $q->result();
    }
    function sorted() {
        foreach($_POST['sort'] as $place => $obj) {
            $data = array('position' => $place);
            $this->db->where('id', $obj);
            $this->db->update('prints', $data);
        }
        return true;
    }
}