<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mytea_model extends CI_Model {
    
    function add(array $teaData){
        $this->db->insert('tea_store',$teaData);
    }
    
    function delete($id){
        $this->db->delete('tea_store',array('id'=>$id));
    }
    
    function edit($id, $teaData)
    {
        $this->db->where('id',$id);
        $this->db->update('tea_store',$teaData);
    }
    
    function get($id=null){
        if(isset($id)){
            $this->db->where('id',$id);
        }
        return $this->db->get('tea_store')->result();
    }
    
    function get_not_empty(){
        return $this->db->where('empty',0)->get('tea_store')->result();
    }
    
    function count_empty(){
        $count = $this->db->get_where('tea_store',array('empty' => '1'));
        return $count->num_rows();
    }
    
    function avg_rate($id)
    {
        $elements = $this->db->get_where('tea_history',array('fk_tea_id'=>$id))->result();
        if(empty($elements))
            return NULL;
        
        $count = 0;
        $sum = 0;
        foreach($elements AS $element){
            $sum += $element->rate;
            $count ++;
        }
        
        return bcdiv($sum, $count, 1);
    }

}
