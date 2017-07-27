<?php

class post extends CI_Model
{
    
       public function __construct()
	{
		parent::__construct();
			
		$this->load->database();
                
		
	}

    public function getpost()
{

         return $this->db->get('post');
       
}
  
}

