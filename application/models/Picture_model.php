<?php
class Picture_model extends MY_Model
{
    public $before_create = array( 'created_at');

    /**
     * undocumented function
     *
     * @return void
     * @author Me
     */
    public function get_pictures()
    {
        $pictures=$this->picture_model->as_array()->get_all();
        return $pictures;
    }

}
