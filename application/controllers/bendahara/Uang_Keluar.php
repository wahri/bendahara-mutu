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
        $this->data['title'] = "Uang Keluar";
        $this->load->view('bendahara/uang_keluar/uang_keluar', $this->data);
    }

    public function tambah_transaksi()
    {
        $this->data['title'] = "Tambah Transaksi";
        $this->load->view('bendahara/uang_keluar/tambah_transaksi', $this->data);
    }
}
