<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class History_model extends CI_Model {
    
    function add(array $elementData){
        $this->db->insert('tea_history',$elementData);
        return $this->db->insert_id();
    }
    
    function delete($id){
        $this->db->delete('history_rate',array('history_id'=>$id));
        $this->db->delete('tea_history',array('id'=>$id));
    }
    
    
    function get($id=null){
        if(isset($id)){
            $this->db->where('id',$id);
        }
        return $this->db->get('tea_history_view')->result();
    }
    
    function set_empty($tea_id,$empty=true)
    {
        $this->db->where('id',$tea_id)->update('tea_store',array('empty'=>($empty?1:0)));
    }
    
    function add_rate($user_id,$history_id,$rate){
        $rateData = array(
            'user_id' => $user_id,
            'history_id' => $history_id,
            'rate'       => $rate
        );
        $this->db->delete('history_rate',array('history_id'=>$history_id ,'user_id'=>$user_id));
        $this->db->insert('history_rate',$rateData);
    }
    
    function get_history_rate($history_id){
        $result = $this->db->select('AVG(rate) avg_rate')->where('id',$history_id)->get('tea_history_view')->result();
        return $result[0]->avg_rate;
   }
   
   function get_user_vote($user_id,$history_id){
       $result = $this->db->get_where('history_rate',array('user_id'=>$user_id,'history_id'=>$history_id))->result();
       if(!empty($result))
           return $result[0]->rate;
       else
           return 0;
           
   }
}
