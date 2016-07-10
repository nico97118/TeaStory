<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {
    
	public function __construct()
	{
            parent::__construct();
            $this->load->view('bootstrap');
            $this->load->view('navbar',array('categorie'=>'history'));
            $this->load->view('rating');
            
            $this->load->model('history_model');
            $this->load->model('mytea_model');
             
	}
        
        public function index(){        
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('tea', 'Thé', 'required');
            $this->form_validation->set_rules('temperature', 'Temperature', 'required');
            $this->form_validation->set_rules('dosage', 'Dosage', 'required');
            $this->form_validation->set_rules('unit', 'Unité', 'required');
            $this->form_validation->set_rules('sleeping', 'Durée', 'required');
            $this->form_validation->set_rules('date', 'required', 'required');
            
            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('history/add');
                $this->load->view('history/index');
            } else {
                 $teaData = array(
                   'fk_tea_id'      =>  $this->input->post('tea'),
                   'temperature'    =>  $this->input->post('temperature'),
                   'dosage'         =>  $this->input->post('dosage'),
                   'unit'         =>  $this->input->post('unit'),
                   'sleeping'       =>  $this->input->post('sleeping'),
                   'date'           =>  $this->input->post('date'),
                   'comment'        =>  $this->input->post('comment'),
                   'rate'           =>  $this->input->post('rate')      
                    );
                
                 if($this->input->post('empty')==1)
                     $this->history_model->set_empty($teaData['fk_tea_id']);
                
                $this->history_model->add($teaData);
                $this->session->set_flashdata('success', 'Nouvelle entré ajoutée avec succès.');
                redirect(site_url('history'),'refresh');
            }
        }
        /*
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
            
        }*/
        
        public function delete($id){
            
            $this->history_model->delete($id);
            
            $this->session->set_flashdata('success', "Entré supprimée avec succès.");
            redirect(site_url('history'),'refresh');
        }
}
