<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_Keluar extends Bendahara_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->data['transaksi_pengeluaran'] = $this->db->get('transaksi_pengeluaran')->result_array();
        $this->data['title'] = "Uang Keluar";
        $this->load->view('bendahara/uang_keluar/uang_keluar', $this->data);
    }

    public function tambah_transaksi()
    {
        if ($this->input->post('submit')) {
            $this->_tambahTransaksi();
        }
        $this->data['title'] = "Tambah Transaksi";
        $this->load->view('bendahara/uang_keluar/tambah_transaksi', $this->data);
    }

    public function _tambahTransaksi()
    {
        $data = [
            'nama_pemakai' => $this->input->post('nama_pemakai'),
            'nominal' => str_replace('.', '', $this->input->post('nominal')),
            'catatan' => $this->input->post('catatan'),
            'datetime' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('transaksi_pengeluaran', $data);

        $this->session->set_flashdata('message', '<strong>Berhasil!</strong> menambah pengeluaran');
        redirect('bendahara/uang_keluar');
    }
}
