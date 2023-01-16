<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Change_pass extends CI_Controller
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
            $config['base_url'] = base_url() . 'change_pass/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'change_pass/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'change_pass/index';
            $config['first_url'] = base_url() . 'change_pass/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $change_pass = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'change_pass_data' => $change_pass,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'button' => 'Change Password',
            'konten' => 'change_pass/change_pass_list',
            'judul' => 'About Me',
        );
        $this->load->view('v_index', $data);
    }

    public function cpw()
    {
        $data = array(
            'button' => 'Change Password',
            'action' => site_url('change_pass/cpw_action'),
            'nip' => set_value('nip'),
            'psw_lama' => set_value('psw_lama'),
	        'password' => set_value('password'),
	        'psw_conf' => set_value('psw_conf'),
            'konten' => 'change_pass/change_pass_form',
            'judul' => 'Ganti Password',
	    );
        $this->load->view('v_index', $data);
    }

    public function cpw_action()
    {
        $this->_rules();

        /*if ($_POST AND $this->form_validation->run() == TRUE) {
            $old_password = $this->input->post('psw_lama');
            $params['password'] = sha1($this->input->post('password'));
            $status = $this->Users_model->change_password($this->session->userdata('nip'), $params);
            $this->session->set_flashdata('message', 'Update password success');
            redirect('change_pass');
        } else {
            if ($this->Users_model->get_by_id($this->session->userdata('nip')) == NULL) {
                redirect('change_pass');
            }
            redirect('change_pass');
        }*/

        if ($this->form_validation->run() == FALSE) {
            $this->change_pass($this->input->post('nip', TRUE));
        } else {
            $data = array(
                'password' => $this->input->post('password',TRUE),
	        );

            $this->Users_model->change_password($this->input->post('nip', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('change_pass'));
        }
    }

    public function check_current_password()
    {
        $row = $this->Users_model->get_by_id($this->session->userdata('nip'));
        $user = $row->password;
        $pass = $this->input->post('psw_lama');
        if ($user == $pass) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_current_password', 'Password lama tidak sesuai');
            return FALSE;
        }
    }

    public function _rules()
    {
	    $this->form_validation->set_rules('psw_lama', 'Old Password', 'required|callback_check_current_password');
	    $this->form_validation->set_rules('password', 'New Password', 'required|matches[psw_conf]|min_length[6]');
	    $this->form_validation->set_rules('psw_conf', 'Confirm New Password', 'required|min_length[6]');
	    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file change_pass.php */