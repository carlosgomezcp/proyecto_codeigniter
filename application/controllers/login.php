<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
  
    public function index()
    {
        $email= $this->input->post('email');
        $password= $this->input->post('password');
        $data= array(
          'email'=>$email,
          'id'=>1,
          'login'=>true
        );
        $this->session->set_userdata($data);
        echo $this->session->userdata('id');
        
    }
    
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

