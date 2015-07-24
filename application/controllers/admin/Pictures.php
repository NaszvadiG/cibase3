<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
 * pictures controller
 * @package zapleczko
 * @subpackage pictures
 * @version 0.0.5
 */

class Pictures extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
//Check if the user is logged in
        if ($this->user_model->check_logged_in()!==TRUE) {
            redirect('../admin/login', 'refresh');
        }
        $this->template->set_layout('back');
        $this->template->set('message', $this->session->flashdata('message'));
    }

    function index($page_number = 1, $order_by = 'id', $how = 'desc', $limit = 10)
    {

        //pagination
        $config['total_rows'] = $this->picture_model->count_all();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['use_page_numbers']=true;
        $config['base_url'] = '/admin/pictures/index';
        $offset = ($this->uri->segment($config['uri_segment']) - 1) * $config['per_page'];
        $offset < 0 ? $offset = 0 : '';
        $this->pagination->initialize($config);

        $pictures=$this->picture_model->limit($limit, $offset)->order_by($order_by, $how)->get_all();
        $this->template->build('admin/pictures/index', array('pictures' => $pictures));
    }

    function add()
    {

        $config['upload_path'] = 'upload';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->upload->initialize($config);

        if ($this->input->post()) {
            //id pic desc order
            if ($this->upload->do_upload()) {
                //resize image
                $picture_array=$this->upload->data();
                if ($picture_array['image_width']>900||$picture_array['image_height']>900){
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $picture_array['full_path'];
                    $config['new_image']=$config['source_image'];
                    $config['maintain_ratio'] = true;
                    $config['width'] = 980;
                    $config['height'] = 980;

                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                }

                $config['image_library'] = 'gd2';
                $config['source_image'] = $picture_array['full_path'];
                $config['new_image']='upload/small';
                $config['maintain_ratio'] = true;
                $config['width'] = 180;
                $config['height'] = 180;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();

            } else {
                $this->session->set_flashdata('message', $this->upload->display_errors());
                redirect('../admin/pictures/add', 'refresh');
            }
            $filename = $picture_array['file_name'];

            if ($this->input->post('alt')=='') {
                $info = pathinfo($filename);
                $alt = $info['filename'];
            } else {
                $alt = $this->input->post('alt');
            }


            if ($this->picture_model->insert(
                array(
                    'name' => $filename, 'alt' => $alt
                )
            )) {
                $this->session->set_flashdata('message', 'udało się dodać obrazek');
                redirect('../admin/pictures', 'refresh');
            }
        }

        $this->template->build('admin/pictures/add');
    }

    
    function edit($id)
    {
        $picture=$this->picture_model->get($id);
        if ($this->input->post()) {
            //id pic desc order
            $alt = $this->input->post('alt');

            if ($this->picture_model->update(
                $id,
                array(
                    'alt' => $alt
                )
            )) {
                $this->session->set_flashdata('message', 'udało się poprawić obrazek');
                redirect('../admin/pictures', 'refresh');
            }
        }

        $this->template->build(
            'admin/pictures/edit',
            array(
                'picture'=>$picture
            )
        );
    }

    function delete($id)
    {
        $picture=$this->picture_model->get($id);
        unlink('upload/'.$picture->name);
        unlink('upload/small/'.$picture->name);
        $this->picture_model->delete($id);
        $this->session->set_flashdata('message', 'skasowano obrazek');
        redirect('../admin/pictures', 'refresh');
    }

    function add_to_gallery()
    {
        $gallery_id=$this->input->post('gallery_id');
        $picture_id=$this->input->post('picture_id');

        //check if picture already inside gallery
        //@TODO waga obrazka
        if ($this->pictures_gallery_model->get_many_by(array('picture_id'=>$picture_id,'gallery_id' => $gallery_id))==true) {
            echo 'już dużo tego';
        } else {
            $this->pictures_gallery_model->insert(
                array(
                    'picture_id' => $picture_id ,
                    'gallery_id' => $gallery_id
                )
            );

            $gallery=$this->gallery_model->get($gallery_id);
            $return_array=array('galleryName'=>$gallery->name,'galleryId'=>$gallery->id);
            echo json_encode($return_array);
        }
    }

    function remove_from_gallery()
    {

        $gallery_id=$this->input->post('gallery_id');
        $picture_id=$this->input->post('picture_id');
        $delete_array=array('picture_id'=>$picture_id,'gallery_id' => $gallery_id);
        $this->pictures_gallery_model->delete_by($delete_array);
        return true;
    }
}
