<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
 * page default dispatcher
 */

class Page extends Front_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $slug = $this->uri->segment(1);
        $page = $this->page_model->get_by('slug', $slug);

            Front_Controller::render();
    }

    public function build_empty_page()
    {
        return $page;
    }

}
