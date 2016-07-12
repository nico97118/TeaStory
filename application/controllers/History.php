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
                if($this->ion_auth->logged_in())
                    $this->load->view('history/add');
                $this->load->view('history/index');
            } else {
                if(!$this->ion_auth->logged_in())
                    return show_error('Vous n\'êtes pas membre');
                
                 $teaData = array(
                   'fk_tea_id'      =>  $this->input->post('tea'),
                   'fk_user_id'     =>  $this->ion_auth->user()->row()->id, 
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
        
        public function delete($id){
            if(!$this->ion_auth->is_admin())
                    return show_error('Vous n\'êtes pas administrateur.');
            
            $this->history_model->delete($id);
            
            $this->session->set_flashdata('success', "Entré supprimée avec succès.");
            redirect(site_url('history'),'refresh');
        }
}
