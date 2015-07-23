<?php
class Picture_model extends MY_Model
{
   public $has_many=array('pictures_galleries');

   /**
    * undocumented function
    *
    * @return void
    * @author Me
    */
   public function get_selected($selected)
   {
$query = $this->db->where_in('id', $selected)->get('pictures');
           return $query->result();
   }
}
