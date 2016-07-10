<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class History_model extends CI_Model {
    
    function add(array $elementData){
        $this->db->insert('tea_history',$elementData);
    }
    
    function delete($id){
        $this->db->delete('tea_history',array('id'=>$id));
    }
    
    
    function get($id=null){
        if(isset($id)){
            $this->db->where('id',$id);
        }
        return $this->db->get('tea_store')->result();
    }
}
