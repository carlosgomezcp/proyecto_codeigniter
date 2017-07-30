<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class perfil extends CI_Controller {
    
    public function __construct()
	{
                 parent::__construct();
		//se comente porque ya se llama diectamente en config autoload  model	
		//$this->load->model('post/post');
                 //helper llamado bosstrap que se descargo 
                $this->load->helper('bootstrap');
		
        }
        
       public function index()
        {
           $data= array('title'=>'PERFIL');
           $this->load->view('/guest/head',$data);
           $data= array('app'=>'ACTUALIZA TU PERFIL');
           $this->load->view('/guest/nav',$data);
          $data= array('post'=>'sitio de prueba','description'=>'sitio realizado en codeinigther');
           $this->load->view('/guest/header',$data);
           
            $this->load->view('/user/content',$data);
            $this->load->view('/guest/footer');
        }
        
}