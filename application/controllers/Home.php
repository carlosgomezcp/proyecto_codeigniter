<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		//se comente porque ya se llama diectamente en config autoload  model	
		//$this->load->model('post/post');
		
	}

    
	public function index()
	{
           $this->session->sess_destroy();
           $data= array('title'=>'GLORIADA');
           $this->load->view('/guest/head',$data);
           $data= array('app'=>'BLOG');
           $this->load->view('/guest/nav',$data);
          $data= array('post'=>'sitio de prueba','description'=>'sitio realizado en codeinigther');
           $this->load->view('/guest/header',$data);
           
           
           $result = $this->post->getpost();
         
           $data=array('consulta'=>$result);
                    
           $this->load->view('/guest/content',$data);
           $this->load->view('/guest/footer',$data);
           
           
            
            
	}
}