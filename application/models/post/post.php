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


public function getpostname($year='',$name='')
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
    
 public function numrows()
 {
     //$this->db->get('blog')->num_rows();
   return $this->db->count_all('post');
 }

 public function paginacion($page='')
 {
     //$this->db->get('blog')->num_rows();
    return  $this->db->get('post',$page, $this->uri->segment(3));
    
   
 }
 
 function getNumFrases()
{
    return $this->db->count_all('post');
}

function getTodasFrases($limit,$start)
{
    $this->db->limit($limit,$start);
    $resultado = $this->db->get('post');

    return $resultado->result();
}
 
  
}

