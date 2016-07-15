<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mytea extends CI_Controller {
    
	public function __construct()
	{
            parent::__construct();
            $this->load->view('bootstrap');
            $this->load->view('navbar',array('categorie'=>'mytea'));
            $this->load->view('rating');
            
            $this->load->model('mytea_model');
	}
        
        public function index($filter=null){
            $this->load->view('mytea/index',array('filter'=>$filter));
        }
        
        public function add(){
            if(!$this->ion_auth->is_admin())
                    return show_error('Vous n\'êtes pas administrateur.');
            
             $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name', 'Nom', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required|callback_type_check');
            $this->form_validation->set_rules('temperature', 'Temperature', 'required|integer|less_than[100]|greater_than[0]');
            $this->form_validation->set_rules('sleeping', 'Durée', 'required|callback_sleeping_check');
            $this->form_validation->set_rules('seller', 'Vendeur', '');
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('mytea/add');
            } else {
                 $teaData = array(
                   'name'           =>  $this->input->post('name'),
                   'type'           =>  $this->input->post('type'),
                   'temperature'    =>  $this->input->post('temperature'),
                   'sleeping'       =>  $this->input->post('sleeping'),
                   'seller'         =>  $this->input->post('seller'),
                    );
                 
                $this->mytea_model->add($teaData);
                $this->session->set_flashdata('success', 'Nouveau thé ajouté avec succès.');
                redirect(site_url('mytea'),'refresh');
            }
        }
        
        public function edit($id){
            if(!$this->ion_auth->is_admin())
                    return show_error('Vous n\'êtes pas administrateur.');
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name', 'Nom', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required|callback_type_check');
            $this->form_validation->set_rules('temperature', 'Temperature', 'required|integer|less_than[100]|greater_than[0]');
            $this->form_validation->set_rules('sleeping', 'Durée', 'required|callback_sleeping_check');
            $this->form_validation->set_rules('seller', 'Vendeur', '');
            
            if ($this->form_validation->run() == FALSE) {
                $data['id'] = $id;
                $this->load->view('mytea/edit',$data);
            } else {
                 $teaData = array(
                   'name'           =>  $this->input->post('name'),
                   'type'           =>  $this->input->post('type'),
                   'temperature'    =>  $this->input->post('temperature'),
                   'sleeping'       =>  $this->input->post('sleeping'),
                   'seller'         =>  $this->input->post('seller'),
                   'empty'          =>  $this->input->post('empty')
                );
                $this->mytea_model->edit($id,$teaData);
                $this->session->set_flashdata('success', $teaData['name']." édité avec succès.");
                redirect(site_url('mytea'),'refresh');
            }
            
        }
        
        public function delete($id){
            if(!$this->ion_auth->is_admin())
                    return show_error('Vous n\'êtes pas administrateur.');
            $teas = $this->mytea_model->get($id);
            $tea = $teas[0];
            
            $this->mytea_model->delete($id);
            
            $this->session->set_flashdata('success', $tea->name." supprimé avec succès.");
            redirect(site_url('mytea'),'refresh');
        }
        
        function sleeping_check($str){
            if( !preg_match("/(2[0-3]|[0-1][0-9]):([0-5][0-9]):([0-5][0-9])/", $str)){
                $this->form_validation->set_message('sleeping_check', ' %s est mal formatée' );
                return false;
            } else
                return true;
        }
           
        function type_check($str){
            if(!key_exists($str, $this->config->item('types'))){
                    $this->form_validation->set_message('type_check', 'Ce %s n\'existe pas' );
                return false;
            } else
                return true;
        }
        
}
