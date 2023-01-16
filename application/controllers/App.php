<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	
	public function index()
	{
		if ($this->session->userdata('level') == "") {
            redirect('app/login');
        } 
		$data = array(
			'konten' => 'home',
            'judul' => 'Dashboard',
		);
		$this->load->view('v_index', $data);
	}

	public function login()
	{

		if ($this->input->post() == NULL) {
			$this->load->view('login');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$cek_user = $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$password' ");
			if ($cek_user->num_rows() == 1) {
				foreach ($cek_user->result() as $row) {
					$sess_data['nip'] = $row->nip;
					$sess_data['nama_pegawai'] = $row->nama_pegawai;
					$sess_data['username'] = $row->username;
					$sess_data['level'] = $row->level;
					$this->session->set_userdata($sess_data);
				}
				redirect('app');
			} else {
				?>
				<script type="text/javascript">
					alert('Username dan password kamu salah !');
					window.location="<?php echo base_url('app/login'); ?>";
				</script>
				<?php
			}

		}
	}

	function logout()
	{
		$this->session->unset_userdata('nip');
		$this->session->unset_userdata('nama_pegawai');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('app/login');
	}


}
