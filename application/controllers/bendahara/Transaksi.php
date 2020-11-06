<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends Bendahara_Controller
{


    public function log($nis)
    {
        $transaksi = $this->db->get_where('transaksi', ['nis' => $nis])->result();

        $this->data['transaksi'] = $transaksi;
        $this->data['title'] = "Transaksi Record";
        $this->data['nis'] = $nis;

        $this->load->view('bendahara/transaksi_record', $this->data);
    }


    public function success($kode)
    {
        $this->data['title'] = "Transaksi Record";

        $this->data['transaksi'] = $this->db->get_where('transaksi', ['kode_transaksi' => $kode])->row_array();
        $this->data['transaksi_detail'] = $this->db->get_where('transaksi_detail', ['kode_transaksi' => $kode])->result_array();

        $this->load->view('bendahara/success_bayar', $this->data);
    }


    public function print($kode)
    {
        $this->data['title'] = "Transaksi Record";

        $this->data['transaksi'] = $this->db->get_where('transaksi', ['kode_transaksi' => $kode])->row_array();
        $this->data['transaksi_detail'] = $this->db->get_where('transaksi_detail', ['kode_transaksi' => $kode])->result_array();
        $this->data['siswa'] = $this->db->get_where('siswa', ['nis' => $this->data['transaksi']['nis']])->row_array();

        $this->load->view('bendahara/print_transaksi', $this->data);
    }

    public function detail($kode)
    {
    }
}
