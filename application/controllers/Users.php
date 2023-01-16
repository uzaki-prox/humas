<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/index.html';
            $config['first_url'] = base_url() . 'users/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'users/users_list',
            'judul' => 'Data User',
        );
        $this->load->view('v_index', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
	        'nip' => set_value('nip'),
	        'nama_pegawai' => set_value('nama_pegawai'),
	        'username' => set_value('username'),
	        'password' => set_value('password'),
	        'level' => set_value('level'),
            'konten' => 'users/users_form',
            'judul' => 'Data User',
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
                'nip' => $this->input->post('nip',TRUE),
		        'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
		        'username' => $this->input->post('username',TRUE),
		        'password' => md5($this->input->post('password',TRUE)),
		        'level' => $this->input->post('level',TRUE),
	        );
            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		        'nip' => set_value('nip', $row->nip),
		        'nama_pegawai' => set_value('nama_pegawai', $row->nama_pegawai),
		        'username' => set_value('username', $row->username),
		        'password' => set_value('password', $row->password),
		        'level' => set_value('level', $row->level),
                'konten' => 'users/users_form',
                'judul' => 'Data User',
	        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nip', TRUE));
        } else {
            $data = array(
		'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->Users_model->update($this->input->post('nip', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
	    $this->form_validation->set_rules('nama_pegawai', 'nama_pegawai', 'trim|required');
	    $this->form_validation->set_rules('username', 'username', 'trim|required');
	    $this->form_validation->set_rules('password', 'password', 'trim|required');
	    $this->form_validation->set_rules('level', 'level', 'trim|required');
	    $this->form_validation->set_rules('nip', 'nip', 'trim');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Users.php */