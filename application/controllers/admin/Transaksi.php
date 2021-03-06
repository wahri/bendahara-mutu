<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends Admin_Controller
{


    public function log($nis)
    {
        $transaksi = $this->db->get_where('transaksi', ['nis' => $nis])->result_array();

        $this->data['transaksi'] = $transaksi;
        $this->data['title'] = "Transaksi Record";
        $this->data['nis'] = $nis;

        $this->load->view('bendahara/transaksi/transaksi_record', $this->data);
    }


    public function success($kode)
    {
        $this->data['title'] = "Transaksi Record";

        $this->data['transaksi'] = $this->db->get_where('transaksi', ['kode_transaksi' => $kode])->row_array();
        $this->data['transaksi_detail'] = $this->db->get_where('transaksi_detail', ['kode_transaksi' => $kode])->result_array();

        $this->load->view('bendahara/transaksi/transaksi_success', $this->data);
    }


    public function print($kode)
    {
        $this->data['title'] = "Transaksi Record";

        $this->data['transaksi'] = $this->db->get_where('transaksi', ['kode_transaksi' => $kode])->row_array();
        $this->data['transaksi_detail'] = $this->db->get_where('transaksi_detail', ['kode_transaksi' => $kode])->result_array();
        $this->data['siswa'] = $this->db->get_where('siswa', ['nis' => $this->data['transaksi']['nis']])->row_array();

        $this->load->view('bendahara/transaksi/transaksi_print', $this->data);
    }

    public function uang_masuk($kode = '')
    {
        $this->db->join('siswa', 'siswa.nis = transaksi.nis');
        $this->data['transaksi'] =$this->db->get_where('transaksi', ['kode_transaksi' => $kode])->row_array();
        $this->data['transaksi_detail'] = $this->db->get_where('transaksi_detail', ['kode_transaksi' => $kode])->result_array();
        $this->data['title'] = "Detail Transaksi Masuk";
        $this->load->view('bendahara/transaksi/transaksi_masuk', $this->data);
    }

    public function uang_keluar($kode = '')
    {
        $this->data['title'] = "Detail Transaksi Keluar";
        $this->load->view('bendahara/transaksi/transaksi_keluar', $this->data);
    }
}
