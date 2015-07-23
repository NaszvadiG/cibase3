<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
 * page default dispatcher
 */

class Page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $slug = $this->uri->segment(1);
        $page = $this->page_model->get_by('slug', $slug);

        if (count($page)==1) {
            $this->template->title($page->title, SITE_NAME)->set_metadata('description',$page->desc)->build('page/get', array(
                'page'=>$page,
            ));
        } else {
            //build empty page
            $page=$this->_build_empty_page();
        }
    }

    private function _build_empty_page()
    {
        $page=new Page_model();
        $page->title='error 404';
        $page->body='Podana strona nie istnieje...';
        $this->output->set_status_header('404');
        $this->template->title('404')
            ->build('page/404',array(
                'page' => $page,
            ));
        return $page;
    }

}
