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
        
        public function delete()
        {
            $post=$this->input->post();
            $postname=$post["postname"];
            $id=$post["id"];
            //echo  $id;
            //echo  "delete from post where post='$postname'";
            $query="delete from post where post='$postname'";
            if($this->db->query($query))
            {
               echo $id;

            }else{
                return false;
            }
        }
        
        public function modificar($year='',$name='')
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
           //se comenta para habilitar el formulario multipar
            if(!isset($result->img)|| $result->img=="")
            {
                $result->img ="home-bg.jpg";
                
            }
           //se comenta para la vista modificr2
           //$data= array('post'=>$result->post,'description'=>$result->descripcion,'img'=>$result->img);
           //$this->load->view('/guest/header',$data);
           $data= array('post'=>$result->post,'contenido'=>$result->contenido,'img'=>$result->img);
           $data["row"]=$result;
           //$this->load->view('/user/modificar',$data);
           $this->load->view('/user/modificar2',$data);
           
            $this->load->view('/guest/footer',$data);
           
           
            
            
	}
        
        
        
        public function actualizar()
        {
            $post=$this->input->post();
            $data["post"]=$post["titulo"];
            $data["descripcion"]=$post["descripcion"];
             $data["contenido"]=$post["contenido"];
           //  $datos=array('name'=>$data["nombre"],'user'=>$data["user"],'email'=>$data["email"],'password'=>$data["clave"]);
             //print_r($post);
            $id=$post["id"];
            $this->db->where('id',$id);
            if($this->db->update('post',$data)){
                header('location:'.base_url()."perfil");
            } else {
            echo "no se puede actualizar";
            }
        }
        
        public function actualizarImg()
        {
            
            $file_name=$this->file->UploadImage('./public/img/','error de carga de imagen');
            $post=$this->input->post();
            if($file_name==null)
            {
                echo false;
                return;
                
                
            }
           //  $datos=array('name'=>$data["nombre"],'user'=>$data["user"],'email'=>$data["email"],'password'=>$data["clave"]);
             //print_r($post);
            $id=$post["id"];
            $this->db->where('id',$id);
            $data["img"]=$file_name;
            if($this->db->update('post',$data)){
               echo base_url('public/img')."/".$file_name;
                
            } else {
            echo false;
            }
        }
        
        
       
        
}