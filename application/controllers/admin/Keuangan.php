<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends Admin_Controller
{
    public function index()
    {
        if ($this->input->post('tambah_akun')) {
            $this->_tambahakun();
        }

        $this->data['akun'] = $this->db->get_where('akun', ['status' => 1])->result_array();
        $this->data['title'] = 'Keuangan';
        $this->load->view('admin/keuangan/keuangan', $this->data);
    }

    public function _tambahakun()
    {
        $data = [
            'nama_akun' => $this->input->post('nama_akun'),
            'status' => 1
        ];
        $this->db->insert('akun', $data);

        $this->session->set_flashdata('message', 'Berhasil menambahkan akun');
        redirect('admin/keuangan');
    }

    public function saldo($id)
    {
        $this->db->join('saldo_akun', 'saldo_akun.id_akun = akun.id_akun', 'left');
        $this->data['akun'] = $this->db->get_where('akun', ['akun.id_akun' => $id, 'saldo_akun.status' => 1])->row_array();
        $this->data['title'] = 'Saldo Akun';
        $this->load->view('admin/keuangan/saldo', $this->data);
    }

    public function tambah_saldo()
    {
        if ($this->input->post('tambah_saldo')) {
            $this->_tambahsaldo();
        }
        $this->data['title'] = 'Saldo Akun';
        $this->load->view('admin/keuangan/tambah_saldo', $this->data);
    }

    public function _tambahsaldo()
    {
        $data = [
            'nama_saldo' => $this->input->post('nama_saldo'),
            'nominal' => str_replace('.', '', $this->input->post('nominal')),
            'periode' => $this->input->post('periode'),
            'expired' => $this->input->post('expired')
        ];
    }
    public function edit_saldo($id = '')
    {
        $this->data['title'] = 'Saldo Akun';
        $this->load->view('admin/keuangan/edit_saldo', $this->data);
    }
}
