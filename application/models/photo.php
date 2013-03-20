<?php
/**
 * Created by JetBrains PhpStorm.
 * User: clementpatout
 * Date: 15.03.13
 * Time: 10:41
 * To change this template use File | Settings | File Templates.
 */

class Photo extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->photos_path = './uploads/';
        $this->now = date("Y-m-d H:i:s");
        $this->load->library('image_lib');
    }

    ##########DELETE
    ############################
    function dell($id) {
        //delete FILE
        $photo=$this->get_photo($id);

        unlink( $this->photos_path.$photo->filename);
        unlink( $this->photos_path.'thumbs/'.$photo->filename);
        unlink( $this->photos_path.'header/'.$photo->filename);

        if($this->db->delete('photos', array('id' => $id))){
            return true;
        } else {return false;}
    }
    ##########GET ALL
    ############################
    function get_all() {
        $q= $this->db->query('SELECT * FROM photos');
        return $q->result();
    }
    ##########DO UPLOAD
    ############################
    function do_upload() {
        $config['upload_path']= $this->photos_path;
        $config['allowed_types']='gif|jpg|png';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload()) {
            //Get DATA
            $file_data = $this->upload->data();


            if ($file_data["image_width"]>900) {
                //RESIZE
                $config = array (
                    'source_image' => $file_data['full_path'],
                    'maintain_ratio' => true,
                    'width' => 900,
                    'height' => 600
            );
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {return false;}
            }
            // GET COLOR
            $color = get_main_color($file_data);
            //SAVE IN DB
            $data = array (
                'title' => humanize($file_data['raw_name']),
                'filename' => $file_data['file_name'],
                'origin_width' => $file_data['image_width'],
                'origin_height' => $file_data['image_height'],
                'created' => $this->now,
                'updated' => $this->now,
                'type' => $file_data['image_type'],
                'r' => $color['r'],
                'g' => $color['g'],
                'b' => $color['b']
            );
            //CREATE Header
            create_header($data);
            //CREATE THUMB
            create_thumbnail($data);


            if ($this->db->insert('photos', $data)){
                return true;
            } else {
                $this->session->set_flashdata( 'message', array( 'title' => 'Error', 'content' => 'Unexpected Error', 'type' => 'error' ));
                return false;
            }

        } else {
            //ERROR
            $this->session->set_flashdata( 'message', array( 'title' => 'Error', 'content' => $this->upload->display_errors(), 'type' => 'error' ));
            return false;
            // $this->upload->display_errors();
        }

    }

    ##########GET PHOTO
    ############################
    function get_photo($id) {
        $q=$this->db->get_where('photos', array('id'=> $id));

        return $q->row();
    }
    ##########GET number Photos
    ############################
    function get_last($nb) {
        $this->db->select('*');
        $this->db->order_by('created', 'desc');
        $this->db->limit($nb);
        $this->db->from('photos');
        $q=$this->db->get();

        return $q->result();
    }

    ##########DO CROP
    ############################
    function do_crop($id) {
        $photo = $this->get_photo($id);

        //CROP_Header
        $config = array(
            'source_image'=>$this->photos_path.$photo->filename,
            'new_image'=>$this->photos_path.'header/'.$photo->filename,
            'x_axis' => $_POST['photo_crop_x'],
            'y_axis' => $_POST['photo_crop_y'],
            'width' => $_POST['photo_crop_w'],
            'height' => $_POST['photo_crop_h'],
            'quality' => '100%'
        );
        $this->image_lib->initialize($config);

        if (!$this->image_lib->crop())
        {
            $this->session->set_flashdata( 'message', array( 'title' => 'Error', 'content' => $this->image_lib->display_errors(), 'type' => 'error' ));
            return false;
        }

        //CREATE THUMB
        create_thumbnail($photo);

        return true;

    }

    ##########CHECK RATIO
    ############################

    function bad_ratio($id) {
        $photo= $this->get_photo($id);

        if (($photo->origin_width)/($photo->origin_height) != 1.5) {
            return true;
        } else {return false;}


    }

}
