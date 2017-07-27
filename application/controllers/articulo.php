<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class articulo extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		//se comente porque ya se llama diectamente en config autoload  model	
		//$this->load->model('post/post');
		
	}

    
	public function post($id='')
	{
            $data= array('title'=>'GLORIADA');
           $this->load->view('/guest/head',$data);
           $data= array('app'=>'BLOG');
           $this->load->view('/guest/nav',$data);
           $data= array('post'=>'sitio de prueba','description'=>'sitio realizado en codeinigther');
           $this->load->view('/guest/header',$data);
           
           
           $result= $this->post->getpostid($id);
           echo $result->post;
            $this->load->view('/guest/footer',$data);
           
            
	}
}