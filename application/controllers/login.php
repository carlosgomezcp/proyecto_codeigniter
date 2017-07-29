<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
  
    public function index()
    {
        $email= $this->input->post('email');
        $password= $this->input->post('password');
        
        $this->load->model('/user/user');
        $fila=$this->user->getUser($email);
        
      
       if($fila !=NULL)
        {
          
            if($fila->password==$password)
            {
           $data= array(
          'email'=>$fila->email,
          'id'=>$fila->id,
          'login'=>true
        );
        $this->session->set_userdata($data);
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
            
        
        
            } else {
                header('location:'.base_url());  
                 $this->session->sess_destroy();
            }
            
        }else{
            header('location:'.base_url());
             $this->session->sess_destroy();
        }
    
        
        
    }
    
    
    function logOut()
    {
        $this->session->sess_destroy();
        header('location:'.base_url());  
        
    }
    



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

}