<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->user_model->check_logged_in()) {
            redirect('../admin/pages','refresh');
        }

        $this->template->set_layout('back');
        $this->template->set('message', $this->session->flashdata('message'));
    }

    public function index()
    {

        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('password', 'Hasło', 'required');

        if ($this->form_validation->run() == TRUE && $this->input->post()) {
            $login=$this->input->post('login');
            $password=$this->input->post('password');

            if ($this->user_model->authenticate($login, $password)==1) {

                $this->session->set_userdata('loggedin', true);
                $user = $this->user_model->get_by('email',$login);
                $this->session->set_userdata('hash',$user->hash);
                redirect('../admin/pages','refresh');

            } else {

                $this->session->set_flashdata('message', '<p>złe hasło lub login');
                redirect('../admin/login','refresh');

            }

        }

        $this->template->build('admin/login/index');
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
