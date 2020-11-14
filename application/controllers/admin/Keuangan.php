<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends Admin_Controller
{
    public function index()
    {
        $this->data['title'] = 'Keuangan';
        $this->load->view('admin/keuangan/keuangan', $this->data);
    }

    public function saldo($id = '')
    {

        $this->data['title'] = 'Saldo Akun';
        $this->load->view('admin/keuangan/saldo', $this->data);
    }

    public function tambah_saldo($id = '')
    {

        $this->data['title'] = 'Saldo Akun';
        $this->load->view('admin/keuangan/tambah_saldo', $this->data);
    }
    public function edit_saldo($id = '')
    {

        $this->data['title'] = 'Saldo Akun';
        $this->load->view('admin/keuangan/edit_saldo', $this->data);
    }
}
