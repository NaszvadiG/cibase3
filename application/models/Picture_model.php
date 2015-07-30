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

   /**
    * undocumented function
    *
    * @return void
    * @author Me
    */
   public function get_many_for_mm($offset, $limit)
   {
       $this->db->limit($offset, $limit);
       $query = $this->db->get('pictures');
       return $query->result();
   }
}
