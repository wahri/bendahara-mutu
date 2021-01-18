<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Kepsek_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['jml_siswa_aktif'] = $this->db->get_where('siswa', ['kelas !=' => 13])->num_rows();
        $this->data['jml_alumni'] = $this->db->get_where('siswa', ['kelas' => 13])->num_rows();

        $this->data['title'] = "Dashboard";
        $this->load->view('kepsek/dashboard', $this->data);
    }
}