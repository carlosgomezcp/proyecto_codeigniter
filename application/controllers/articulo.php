<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class articulo extends CI_Controller {
    
    public function __construct()
	{
                 parent::__construct();
		//se comente porque ya se llama diectamente en config autoload  model	
		//$this->load->model('post/post');
                 //helper llamado bosstrap que se descargo 
                $this->load->helper('bootstrap');
                $this->load->model('file');
		
        }
        

        //s comenta para hacer una nueva busqueda
	/*public function post($id='')
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
           
            
	}*/
        
        
        public function post($year='',$name='')
	{
          //  $result= $this->post->getpostid($id);
           
            $result= $this->post->getpostname($year,$name);
            
            if($result==null)
            {
                echo "error";
                return;
            }
            $data= array('title'=>$result->post);
           $this->load->view('/guest/head',$data);
            
         
           $data= array('app'=>'BLOG',$result->descripcion);
           $this->load->view('/guest/nav',$data);
           
            if(!isset($result->img)|| $result->img=="")
            {
                $result->img ="home-bg.jpg";
                
            }
           
           $data= array('post'=>$result->post,'description'=>$result->descripcion,'img'=>$result->img);
           $this->load->view('/guest/header',$data);
           
           $data= array('post'=>$result->post,'contenido'=>$result->contenido);
           $this->load->view('/guest/post',$data);
           
           
            $this->load->view('/guest/footer',$data);
           
            
	}
        
        
        
        public function nuevo()
        {
            if (!$this->session->userdata('login'))
                    {
                     
                     header('location:'.base_url());
                    }
            
            $data= array('title'=>'Nuevo');
           $this->load->view('/guest/head',$data);
           $data= array('app'=>'BLOG');
           $this->load->view('/guest/nav',$data);
            $data= array('post'=>'sitio de prueba','description'=>'sitio realizado en codeinigther','img'=>'home-bg.jpg');
           $this->load->view('/guest/header',$data);
           $this->load->view('/user/nuevo');
            $this->load->view('/guest/footer',$data);
           
           
        }
        
        public function insert()
        {
            if (!$this->session->userdata('login'))
                    {
                     
                     header('location:'.base_url());
                    }
            

            //se captura todos los elementos del formulario
            $post=$this->input->post();
           
            $file_name=$this->file->UploadImage('./public/img/','error de carga de imagen');
            //como el modelo ya esta cargado se puede llamar el metdo si hacer el load
            $post['file_name']=$file_name;
          
          
            $bool=$this->post->insert($post);
            if($bool)
                {
                header("location:".base_url()."perfil");
                }else{
                header("location:".base_url()."articulo/nuevo");
                    
                }
        }
        
        
       
        
}