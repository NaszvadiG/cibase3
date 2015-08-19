<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* front controller
*/

class Front_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public static function render($view = '', $data = '')
    {
        $CI =& get_instance();
        $CI->load->vars($data);
        $CI->load->view('layouts/front/head');
        if(file_exists(APPPATH.$CI->router->class.'/'.$CI->router->method)){
            $view_data = $CI->load->view($CI->router->class.'/'.$CI->router->method, ' ', true );
        } else {
            $view_data = $CI->load->view('page/404', ' ', true );
        }
        $CI->load->view('layouts/front/foot');


    }
}
