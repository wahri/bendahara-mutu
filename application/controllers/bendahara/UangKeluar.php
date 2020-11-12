<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UangKeluar extends Bendahara_Controller
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
    public function buat_akun()
    {
        $this->data['title'] = "Buat Akun";
        $this->load->view('bendahara/uang_keluar/buat_akun', $this->data);
    }
}
