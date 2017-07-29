<?php

class user extends CI_Model
{
     public function __construct()
	{
		parent::__construct();
			
		$this->load->database();
                
		
	}
    
    
    function getUser ($email='')
    {
        
        $query = $this->db->query("select * from user where email='".$email."' limit 1");
      if($query->num_rows()>0)
      {
          
          return $query->row();
      }else{
          
          return null;
          
      }
    }
}
?>