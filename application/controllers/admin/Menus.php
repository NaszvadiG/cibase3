<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * menus controller
 *
 * @package zapleczko
 * @subpackage menus
 * @version 0.0.1
 */

class Menus extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * undocumented function
     *
     * @return void
     * @author Me
     */
    public function index()
    {
        $this->menu_model->get_all();
    }
}
