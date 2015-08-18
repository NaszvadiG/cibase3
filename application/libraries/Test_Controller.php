<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Test controller for test purposes
*/

class Test_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
    }
}
