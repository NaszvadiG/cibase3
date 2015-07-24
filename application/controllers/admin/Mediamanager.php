<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Mediamanager the codeigniter way
*/

class Mediamanager extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * undocumented function
     *
     * @return void
     * @author Me
     */
    public function index()
    {
        $data['pictures'] = $this->picture_model->order_by('id','desc')->get_all();
        $this->load->view('admin/mediamanager/index', $data);
    }

    /**
     * undocumented function
     *
     * @return void
     * @author Me
     */
    public function insert()
    {
        $selected = $this->input->post('selected');
        $data['pictures'] = $this->picture_model->get_selected($selected);
        $this->load->view('admin/mediamanager/insert', $data);
    }

   /**
     * undocumented function
     *
     * @return void
     * @author Me
     */
    public function insert_one()
    {
        $selected = $this->input->post('selected');
        $data['picture'] = $this->picture_model->get($selected);
        $this->load->view('admin/mediamanager/insert_one', $data);
    }

    public function upload()
    {

        $config['upload_path'] = 'upload';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->upload->initialize($config);

            //id pic desc order
            if ($this->upload->do_upload()) {
                //resize image
                $picture_array=$this->upload->data();

                $config['image_library'] = 'gd2';
                $config['source_image'] = $picture_array['full_path'];
                $config['new_image']='upload/small';
                $config['maintain_ratio'] = true;
                $config['width'] = 180;
                $config['height'] = 180;
                $this->image_lib->initialize($config);
                $this->image_lib->resize();

            } else {
                $response = array('error' => $this->upload->display_errors());
                echo json_encode($response);
            }
            $filename = $picture_array['file_name'];

                $info = pathinfo($filename);
                $alt = $info['filename'];
                $last_id = $this->picture_model->insert(
                    array(
                        'name' => $filename, 'alt' => $alt
                    )
                );
                    $response = array('image' => '<div class="mediamanager__item"><img data-id="'.$last_id.'" class="mediamanager__thumb" src="/upload/small/'.$filename.'"></div>');
                    echo json_encode($response);
                    return true;
        }


}
