<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stats extends CI_Controller {
    
	public function __construct()
	{
            parent::__construct();
            $this->load->view('bootstrap');
            $this->load->view('navbar',array('categorie'=>'stats'));
            
            $this->load->model('mytea_model');
            $this->load->model('stats_model');
	}
        
        public function index(){
            $this->load->view('stats/index');
            //$this->load->view('stats/test');
        }
        
       
        
}
