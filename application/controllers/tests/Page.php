<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * page default dispatcher
 */

class Page extends Test_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        echo 'jestemw get';
           }

    private function _build_empty_page()
    {
         }


}
