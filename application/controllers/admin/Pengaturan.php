<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends Admin_Controller
{
    public function index()
    {
        $this->data['title'] = "Pengaturan Akun";
        $this->load->view('admin/pengaturan/pengaturan', $this->data);
    }

    public function ganti_password()
    {
        $this->data['title'] = "Ganti Password";
        $this->load->view('admin/pengaturan/ganti_password', $this->data);
    }
}
