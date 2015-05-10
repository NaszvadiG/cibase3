<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * pictures controller
 *
 * @package zapleczko
 * @subpackage pictures
 * @version 0.1.0
 */
class Pictures extends CI_Controller
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        //Check if the user is logged in
        if ($this->user_model->check_logged_in()!==TRUE) {
            redirect('../admin/login','refresh');
        }
        $this->template->set_layout('back');
        $this->template->set('message', $this->session->flashdata('message'));
    }

    /**
     * undocumented function
     *
     * @return boolean
     */
    public function get_pictures()
    {
        $pictures=$this->picture_model->get_pictures();
        echo json_encode($pictures);
        return true;
    }

}
/* End of file Pictures.php */
/* Location: ./controllers/admin/Pictures.php */
