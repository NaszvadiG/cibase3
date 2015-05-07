<?php
class Page_model extends MY_Model
{
    public $before_create = array( 'created_at', 'updated_at' );
    public $before_update = array( 'updated_at' );

/**
     * get types for autocomplete
     *
     * @return array
     * @author Me
     */
    public function autocomplete_type($type)
    {
        $this->db->select('type');
        $this->db->like('type',$type);
        $this->db->distinct();
        $this->db->order_by('type','asc');
        $query=$this->db->get('pages');
        $results=$query->result_array();
        $i=0;
        $new_array=array();
        foreach ($results as $value) {
            $new_array[$i]['value']=$value['type'];
            $i++;
        }
        return $new_array;
    }
}
