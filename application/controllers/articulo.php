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
            $result= $this->post->getpostid($id);
           
            
            $data= array('title'=>$result->post);
           $this->load->view('/guest/head',$data);
            
         
           $data= array('app'=>'BLOG',$result->descripcion);
           $this->load->view('/guest/nav',$data);
           
           
           $data= array('post'=>$result->post,'description'=>$result->descripcion);
           $this->load->view('/guest/header',$data);
           
           $data= array('post'=>$result->post,'contenido'=>$result->contenido);
           $this->load->view('/guest/post',$data);
           
           
            $this->load->view('/guest/footer',$data);
           
            
	}
}