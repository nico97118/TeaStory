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
    
    function tea_recap($tea_id,$days_ago){
        $result = $this->db->where('DATE(date) >=',date('Y-m-d'),strtotime("-$days_ago days"))
                    ->where('DATE(date) <=',date('Y-m-d'))
                    ->order_by('date','asc')
                    ->get('tea_history_view')
                    ->result();
        return $result[0];
    }
    
    function count_day($tea_id,$date){
        $query = $this->db->where('DATE(date)',$date)
                ->where('fk_tea_id',$tea_id)
                ->get('tea_history_view');
        return $query->num_rows();       
    }
    
    function tea_recap_count($tea_id,$days_ago){
        $date = strtotime("-$days_ago days");
        $end = strtotime("Now");
        while($date<=$end){
            $data[$date]=$this->count_day($tea_id, date('Y-m-d',$date));
            $date = strtotime("+1 day",$date);
        }
        return $data;
    }
}

