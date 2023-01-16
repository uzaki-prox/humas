<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tamu_psb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tamu_psb_model');
        $this->load->model('No_urut');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tamu_psb/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tamu_psb/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tamu_psb/index.html';
            $config['first_url'] = base_url() . 'tamu_psb/index.html';
        }

        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tamu_psb_model->total_rows($q);
        $psb = $this->Tamu_psb_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'psb_data' => $psb,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'tamu_psb/tamu_psb_list',
            'judul' => 'Buku PSB',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Tamu_psb_model->get_by_id($id);
        if ($row) {
            $data = array(
		    'no_psb' => $row->no_psb,
            'tgl' => $row->tgl,
		    'nama_psb' => $row->nama_psb,
		    'alamat' => $row->alamat,
		    'info_dari' => $row->info_dari,
            'keterangan' => $row->keterangan,
	        );
            $this->load->view('tamu_psb/tamu_psb_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tamu_psb'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tamu_psb/create_action'),
	        'no_psb' => $this->No_urut->buat_no_psb(),
            'tgl' => set_value('tgl'),
	        'nama_psb' => set_value('nama_psb'),
	        'alamat' => set_value('alamat'),
	        'info_dari' => set_value('info_dari'),
            'keterangan' => set_value('keterangan'),
            'konten' => 'tamu_psb/tamu_psb_form',
            'judul' => 'Buku PSB',
	    );
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'no_psb' => $this->input->post('no_psb',TRUE),
                'tgl' => $this->input->post('tgl',TRUE),
		    'nama_psb' => $this->input->post('nama_psb',TRUE),
		    'alamat' => $this->input->post('alamat',TRUE),
		    'info_dari' => $this->input->post('info_dari',TRUE),
            'keterangan' => $this->input->post('keterangan',TRUE),
	        );
            $this->Tamu_psb_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tamu_psb'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tamu_psb_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tamu_psb/update_action'),
		        'no_psb' => set_value('no_psb', $row->no_psb),
                'tgl' => set_value('tgl', $row->tgl),
		        'nama_psb' => set_value('nama_psb', $row->nama_psb),
		        'alamat' => set_value('alamat', $row->alamat),
		        'info_dari' => set_value('info_dari', $row->info_dari),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'konten' => 'tamu_psb/tamu_psb_form',
                'judul' => 'Buku PSB',
	        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tamu_psb'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_psb', TRUE));
        } else {
            $data = array(
                'tgl' => $this->input->post('tgl',TRUE),
		'nama_psb' => $this->input->post('nama_psb',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'info_dari' => $this->input->post('info_dari',TRUE),
        'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Tamu_psb_model->update($this->input->post('no_psb', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tamu_psb'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tamu_psb_model->get_by_id($id);

        if ($row) {
            $this->Tamu_psb_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tamu_psb'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tamu_psb'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	    $this->form_validation->set_rules('nama_psb', 'nama_psb', 'trim|required');
	    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	    $this->form_validation->set_rules('info_dari', 'info_dari', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	    $this->form_validation->set_rules('no_psb', 'no_psb', 'trim');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
