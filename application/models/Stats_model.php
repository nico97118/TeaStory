<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stats_model extends CI_Model {
    function count_history($tea_id)
    {
        $query = $this->db->get_where('tea_history',array('fk_tea_id'=>$tea_id));
        return $query->num_rows();
    }
    
    function best_rated($number){
        return $this->db->order_by('rate_avg','desc')->get('tea_store_view',$number,0)->result();
    }
    
    function top($field,$number){
        return $this->db->order_by($field,'desc')->get('tea_store_view',$number,0)->result();
    }
}

