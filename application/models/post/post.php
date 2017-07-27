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

    public function getpostid($id='')
{

         $result= $this->db->query("select * from post where id='".$id."' limit 1");
         return $result->row();
}

  
}

