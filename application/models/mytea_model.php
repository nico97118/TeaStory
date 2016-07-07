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
}
