<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pag extends CI_Controller {
    
    


function index()
{
            $data= array('title'=>'GLORIADA');
           $this->load->view('/guest/head',$data);
           $data= array('app'=>'BLOG');
           $this->load->view('/guest/nav',$data);
           $data= array('post'=>'sitio de prueba','description'=>'sitio realizado en codeinigther','img'=>'home-bg.jpg');
           $this->load->view('/guest/header',$data);
    
    $this->load->model('post/pag1');
    $this->load->library('pagination');

    $opciones = array();
    $desde = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    $opciones['per_page'] = 15;
    $opciones['base_url'] = base_url().'pag/index';
    $opciones['total_rows'] = $this->pag1->getNumFrases();
    $opciones['uri_segment'] = 3;
    
     $opciones['full_tag_open'] = '<ul class="pagination pagination-md">';
        $opciones['full_tag_close'] = '</ul>';
        $opciones['num_tag_open'] = '<li>';
        $opciones['num_tag_close'] = '</li>';
        $opciones['cur_tag_open'] = '<li class="active"><span>';
        $opciones['cur_tag_close'] = '<span></span></span></li>';
        $opciones['prev_tag_open'] = '<li>';
        $opciones['prev_tag_close'] = '</li>';
        $opciones['next_tag_open'] = '<li>';
        $opciones['next_tag_close'] = '</li>';
        $opciones['first_link'] = '«';
        $opciones['prev_link'] = '‹';
        $opciones['last_link'] = '»';
        $opciones['next_link'] = '›';
        $opciones['first_tag_open'] = '<li>';
        $opciones['first_tag_close'] = '</li>';
        $opciones['last_tag_open'] = '<li>';
        $opciones['last_tag_close'] = '</li>';       

    $this->pagination->initialize($opciones);

    $data['lista'] = $this->pag1->getTodasFrases($opciones['per_page'],$desde);
    $data['paginacion'] = $this->pagination->create_links();

    $this->load->view('/guest/principal',$data);
    $this->load->view('/guest/footer');
}

}
?>