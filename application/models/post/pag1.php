<?php

class pag1 extends CI_Model
{
   
function __construct()
{
    parent::__construct();
    $this->load->database();
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