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

					// $ipaddress = '';
					// if (isset($_SERVER['HTTP_CLIENT_IP']))
					// 	$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
					// else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
					// 	$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
					// else if (isset($_SERVER['HTTP_X_FORWARDED']))
					// 	$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
					// else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
					// 	$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
					// else if (isset($_SERVER['HTTP_FORWARDED']))
					// 	$ipaddress = $_SERVER['HTTP_FORWARDED'];
					// else if (isset($_SERVER['REMOTE_ADDR']))
					// 	$ipaddress = $_SERVER['REMOTE_ADDR'];
					// else
					// 	$ipaddress = 'IP tidak dikenali';

					// $browser = '';
					// if (strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
					// $browser = 'Netscape';
					// else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
					// $browser = 'Firefox';
					// else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
					// $browser = 'Chrome';
					// else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
					// $browser = 'Opera';
					// else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
					// $browser = 'Internet Explorer';
					// else
					// 	$browser = 'Other';

					// $ipaddress = $_SERVER['REMOTE_ADDR'];
					// echo $ipaddress;
					// die;
					
					// $level = $user['level'] == 1 ? 'Superadmin' : $user['level'] == 2 ? 'Kepala Sekolah' : 'Bendahara';
					// $pesan = "$level sedang login dengan ip $ipaddress menggunakan $browser";
					// $chat_id = '1008610964';
					// $token = "1468037738:AAG-j63RMXp8XnxmsKkuco2iS6I329gPNoU";
					// $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$pesan";

					// // echo $pesan;
					// $curl = curl_init($url);
					// curl_exec($curl);
					// // curl_close($curl);
					
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
