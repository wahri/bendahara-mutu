<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends Kepsek_Controller
{
    public function index()
    {
        $this->data['title'] = "Pengaturan Akun";
        $this->load->view('kepsek/pengaturan/pengaturan', $this->data);
    }

    public function ganti_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');

        if ($this->form_validation->run() === TRUE) {
            if (password_verify($this->input->post('password_lama'), $this->data['user_login']['password'])) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $this->db->update('user', $data, ['id' => $this->data['user_login']['id']]);

                $this->session->set_flashdata('message', 'Berhasil mengubah password!');
                redirect("kepsek/pengaturan", 'refresh');
            } else {
                $this->session->set_flashdata('message_error', 'Gagal mengubah password, password salah!');
                redirect("kepsek/pengaturan", 'refresh');
            }
        } else {
            $this->data['title'] = "Ganti Password";
            $this->load->view('kepsek/pengaturan/ganti_password', $this->data);
        }
    }
}
