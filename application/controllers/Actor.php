<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Actor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Actor_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('actor/actor_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Actor_model->json();
    }

    public function read($id) 
    {
        $row = $this->Actor_model->get_by_id($id);
        if ($row) {
            $data = array(
		'actor_id' => $row->actor_id,
		'fullname' => $row->fullname,
		'last_update' => $row->last_update,
	    );
            $this->load->view('actor/actor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('actor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('actor/create_action'),
	    'actor_id' => set_value('actor_id'),
	    'fullname' => set_value('fullname'),
	    'last_update' => set_value('last_update'),
	);
        $this->load->view('actor/actor_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'fullname' => $this->input->post('fullname',TRUE),
		'last_update' => $this->input->post('last_update',TRUE),
	    );

            $this->Actor_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('actor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Actor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('actor/update_action'),
		'actor_id' => set_value('actor_id', $row->actor_id),
		'fullname' => set_value('fullname', $row->fullname),
		'last_update' => set_value('last_update', $row->last_update),
	    );
            $this->load->view('actor/actor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('actor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('actor_id', TRUE));
        } else {
            $data = array(
		'fullname' => $this->input->post('fullname',TRUE),
		'last_update' => $this->input->post('last_update',TRUE),
	    );

            $this->Actor_model->update($this->input->post('actor_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('actor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Actor_model->get_by_id($id);

        if ($row) {
            $this->Actor_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('actor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('actor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
	$this->form_validation->set_rules('last_update', 'last update', 'trim|required');

	$this->form_validation->set_rules('actor_id', 'actor_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "actor.xls";
        $judul = "actor";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Fullname");
	xlsWriteLabel($tablehead, $kolomhead++, "Last Update");

	foreach ($this->Actor_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->fullname);
	    xlsWriteLabel($tablebody, $kolombody++, $data->last_update);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Actor.php */
/* Location: ./application/controllers/Actor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-07 04:13:55 */
/* http://harviacode.com */