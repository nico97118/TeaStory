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
        return $this->db->get('tea_store_view')->result();
    }
    
    function get_not_empty(){
        return $this->db->where('empty',0)->get('tea_store_view')->result();
    }
    
    function count($empty=null){
        if(isset($empty)){
            if($empty == true)
                $this->db->where('empty',1);
            else
                $this->db->where('empty',0);
        }
        
        $count = $this->db->get('tea_store_view');
        return $count->num_rows();
    }
    
    function get_type($type=null){
        if(isset($type))
            $this->db->where('type',$type);
        return $this->db->get('tea_store')->result();
    }

}
