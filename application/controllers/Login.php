<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('status') == "lgn") {
			if ($this->session->userdata('level') == 1) {
				redirect('admin/dashboard', 'refresh');
			}
			if ($this->session->userdata('level') == 3) {
				redirect('bendahara/dashboard', 'refresh');
			}
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->data['title'] = 'Login';
			$this->load->view('login', $this->data);
		} else {
			$this->_login();
		}
	}

	public function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($user) {
			if ($user['active']) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'id' => $user['id'],
						'level' => $user['level'],
						'status' => 'lgn'
					];

					$update['last_login'] = date('Y-m-d H:i:s');
					$this->db->update('user', $update, ['id' => $user['id']]);
					
					$this->session->set_userdata($data);
					redirect('admin/dashboard', 'refresh');
				} else {
					$this->session->set_flashdata('message_error', 'Username atau password salah');
					redirect('login', 'refresh');
				}
			} else {
				$this->session->set_flashdata('message_error', 'User ini tidak aktif');
				redirect('login', 'refresh');
			}
		} else {
			$this->session->set_flashdata('message_error', 'Username atau password salah');
			redirect('login', 'refresh');
		}
	}

	public function logout()
	{
		session_destroy();
		$this->session->set_flashdata('message', 'Anda telah logout');
		redirect('login');
	}
}
