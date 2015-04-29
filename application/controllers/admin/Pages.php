<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * pages controller
 *
 * @version 0.6
 * @package zapleczko
 */

class Pages extends CI_Controller
{

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

    public function index()
    {

        $pages=$this->page_model->get_all();
        $this->template->append_metadata('<link rel="stylesheet" href="https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css"><script src="https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>');
        $this->template->build('admin/pages/index',array(
                'pages' => $pages,
        ));

    }

    public function add()
    {

        if ($this->input->post()) {
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

    public function edit($id)
    {
        $page=$this->page_model->get($id);
        if ($this->input->post()) {
            $title = $this->input->post('title');
            $slug = strtolower(url_title($title));
            $desc = $this->input->post('desc');
            $body = $this->input->post('body');
            $type = $this->input->post('type');
            if ($lastid = $this->page_model->update(
                $id,
                array(
                    'title' => $title,
                    'slug' => $slug,
                    'desc' => $desc,
                    'body' => $body,
                    'type' => $type,
                )
            )) {
                $this->session->set_flashdata('message', 'udało się poprawić stronę');
                redirect('../admin/pages/edit/'.$id,'refresh');
            }
        }

        $dropdown = $this->gallery_model->dropdown('name');
        $this->template->build('admin/pages/edit', array(
            'dropdown' => $dropdown,
            'page' => $page
        ));
    }

    public function delete($id)
    {
        $this->page_model->delete($id);
        $this->session->set_flashdata('message', 'udało się skasować stronę');
        redirect('../admin/pages','refresh');
    }
}
