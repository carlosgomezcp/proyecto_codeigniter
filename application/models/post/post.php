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


public function getpostname($name='',$year='')
{

         $result= $this->db->query("select * from post where year(fecha)='$year' and post like '$name' limit 1");
         return $result->row();
}


public function insert($post='')
    {
       if($post!=null)
       {
           $nombre = $post['titulo'];
           $descripcion = $post['descripcion'];
           $contenido = $post['contenido'];
        
           $file_name = $post['file_name'];
           
           $query ="insert into post (id,post,descripcion,contenido,img,fecha) values (null,'$nombre','$descripcion','$contenido','$file_name',curdate());";
       
           if($this->db->query($query))
           {
               return true;
           }
       }
       return false;
       
    }

  
}

