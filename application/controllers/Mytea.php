<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mytea extends CI_Controller {
    
	public function __construct()
	{
            parent::__construct();
            $this->load->view('bootstrap');
            $this->load->view('navbar',array('categorie'=>'mytea'));
            
            $this->load->model('mytea_model');
	}
        
        public function index(){
            $this->load->view('mytea/index');
        }
        
        public function add(){
            
             $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name', 'Nom', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('temperature', 'Temperature', 'required|integer');
            $this->form_validation->set_rules('sleeping', 'Durée', 'required|decimal');
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
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name', 'Nom', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('temperature', 'Temperature', 'required|integer');
            $this->form_validation->set_rules('sleeping', 'Durée', 'required|decimal');
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
                    );
                 
                $this->mytea_model->edit($id,$teaData);
                $this->session->set_flashdata('success', $teaData['name']." édité avec succès.");
                redirect(site_url('mytea'),'refresh');
            }
            
        }
        
        public function delete($id){
            $teas = $this->mytea_model->get($id);
            $tea = $teas[0];
            
            $this->mytea_model->delete($id);
            
            $this->session->set_flashdata('success', $tea->name." supprimé avec succès.");
            redirect(site_url('mytea'),'refresh');
        }
        
}
