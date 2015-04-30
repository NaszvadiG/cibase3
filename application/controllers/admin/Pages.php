<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * pages controller
 *
 * @package zapleczko
 * @subpackage pages
 * @version 0.7
 */
class Pages extends CI_Controller
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
     * List all pages
     *
     * @return void
     */
    public function index()
    {
        $pages=$this->page_model->get_all();
        $this->template->build('admin/pages/index',array(
                'pages' => $pages,
        ));
    }

    /**
     * Add page
     *
     * @return void
     */
    public function add()
    {
        if ($this->input->post())
        {
            $data=$this->input->post();
            $data['slug'] = strtolower(url_title($data['title']));

            if ($lastid = $this->page_model->insert($data))
            {
                $this->session->set_flashdata('message', 'udało się dodać stronę');
                redirect('../admin/pages/edit/'.$lastid,'refresh');
            }
        }

        $this->template->build('admin/pages/add');
    }

    /**
     * Edit page
     *
     * @param string $page_id
     * @return void
     */
    public function edit($page_id)
    {
        if ($this->input->post()) 
        {
            $data=$this->input->post();
            $data['slug'] = strtolower(url_title($data['title']));

            if ($this->page_model->update($page_id,$data))
            {
                $this->session->set_flashdata('message', 'udało się poprawić stronę');
                redirect('../admin/pages/edit/'.$page_id,'refresh');
            }
        }

        $page = $this->page_model->get($page_id);
        $this->template->build('admin/pages/edit',array(
            'page' => $page,
        ));
    }

    /**
     * Delete page
     *
     * @param string $page_id
     * @return void
     */
    public function delete($page_id)
    {
        $this->page_model->delete($page_id);
        $this->session->set_flashdata('message', 'udało się skasować stronę');
        redirect('../admin/pages','refresh');
    }
}
/* End of file Pages.php */
/* Location: ./controllers/admin/Pages.php */
