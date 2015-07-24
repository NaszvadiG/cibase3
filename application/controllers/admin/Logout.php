<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * logout
 */

class Logout extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->session->unset_userdata('loggedin');
        $this->session->unset_userdata('hash');
        $this->session->set_flashdata('message','wylogowałeś się bezpiecznie');
        redirect('admin/login','refresh');
    }

}
