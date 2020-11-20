<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends Bendahara_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function uang_masuk()
    {
        // if (!empty($this->input->get('tgl_awal'))) {
        //     $tgl_awal = date('Y-m-d H:i:s', $this->input->get('tgl_awal'));

        // } else {
        //     $tgl_awal = date('Y-m-d');
        // }
        // if (!empty($this->input->get('tgl_akhir'))) {
        //     $tgl_akhir = date('Y-m-d H:i:s', $this->input->get('tgl_akhir'));
        // } else {
        //     $tgl_akhir = date('Y-m-d');
        // }

        if(!empty($this->input->get('tgl_awal')) && !empty($this->input->get('tgl_akhir'))){
            $tgl_awal = $this->input->get('tgl_awal');
            $awal = date('Y-m-d 00:00:00', strtotime($tgl_awal . '-1 days'));
            $tgl_akhir = $this->input->get('tgl_akhir');
            $akhir = date('Y-m-d 23:59:59', strtotime($tgl_akhir));
            $this->db->join('siswa', 'siswa.nis = transaksi.nis', 'left');
            $this->data['laporan'] = $this->db->get_where('transaksi', ['date >=' => $awal, 'date <=' => $akhir])->result_array();
            $this->db->select_sum('total');
            $this->data['total_laporan'] = $this->db->get_where('transaksi', ['date >=' => $awal, 'date <=' => $akhir])->row_array();
            
        }else{
            $this->data['laporan'] = null;

        }
        // $this->data['tes'] = date('d m Y 15:00:00', strtotime($tgl_awal.'-1 days'));
        $this->data['title'] = 'Laporan Uang Masuk';
        $this->load->view('bendahara/laporan/uang_masuk', $this->data);
    }

    public function uang_keluar()
    {
        $this->data['title'] = 'Laporan Uang Keluar';
        $this->load->view('bendahara/laporan/uang_keluar', $this->data);
    }

    public function detail_uang_masuk($kode = '')
    {
        $this->db->join('siswa', 'siswa.nis = transaksi.nis');
        $this->data['transaksi'] = $this->db->get_where('transaksi', ['kode_transaksi' => $kode])->row_array();
        $this->data['transaksi_detail'] = $this->db->get_where('transaksi_detail', ['kode_transaksi' => $kode])->result_array();
        $this->data['title'] = "Detail Transaksi Masuk";
        $this->load->view('bendahara/transaksi/transaksi_masuk', $this->data);
    }

    public function detail_uang_keluar($kode = '')
    {
        $this->data['title'] = "Detail Transaksi Keluar";
        $this->load->view('bendahara/transaksi/transaksi_keluar', $this->data);
    }
}
