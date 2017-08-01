<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		//se comente porque ya se llama diectamente en config autoload  model	
		//$this->load->model('post/post');
		
	}

        public function index()
	{
           $this->session->sess_destroy();
           $data= array('title'=>'GLORIADA');
           $this->load->view('/guest/head',$data);
           $data= array('app'=>'BLOG');
           $this->load->view('/guest/nav',$data);
          $data= array('post'=>'sitio de prueba','description'=>'sitio realizado en codeinigther','img'=>'home-bg.jpg');
           $this->load->view('/guest/header',$data);
           
           
           
                    $this->load->library('pagination');
           /* URL a la que se desea agregar la paginación*/
                    
             $desde = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
           $config['base_url'] = base_url().'home/index';

           /*Obtiene el total de registros a paginar */
           $config['total_rows'] =$this->post->getNumFrases();

           /*Obtiene el numero de registros a mostrar por pagina */
           $config['per_page'] = '15';

           /*Indica que segmento de la URL tiene la paginación, por default es 3*/
           $config['uri_segment'] = '3';

           /*Se personaliza la paginación para que se adapte a bootstrap*/
          //$config['num_links'] = 2;

          $config['full_tag_open'] = '<ul class="pagination pagination-md">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span></span></span></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = '«';
        $config['prev_link'] = '‹';
        $config['last_link'] = '»';
        $config['next_link'] = '›';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

    $this->pagination->initialize($config);

    $data['lista'] = $this->post->getTodasFrases($config['per_page'],$desde);
    $data['paginacion'] = $this->pagination->create_links();
                  $this->load->view('/guest/content',$data);
                  $this->load->view('/guest/footer',$data);

           
            
            
	}
	/*public function index()
	{
           $this->session->sess_destroy();
           $data= array('title'=>'GLORIADA');
           $this->load->view('/guest/head',$data);
           $data= array('app'=>'BLOG');
           $this->load->view('/guest/nav',$data);
          $data= array('post'=>'sitio de prueba','description'=>'sitio realizado en codeinigther','img'=>'home-bg.jpg');
           $this->load->view('/guest/header',$data);
           
           
           $result = $this->post->getpost();
         
           $data=array('consulta'=>$result);
                    
           $this->load->view('/guest/content',$data);
           $this->load->view('/guest/footer',$data);
           
           
            
            
	}*/
}