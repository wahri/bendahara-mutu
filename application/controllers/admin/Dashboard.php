<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['jml_siswa_aktif'] = $this->db->get_where('siswa', ['kelas !=' => 13, 'status' => 1])->num_rows();
        $this->data['jml_alumni'] = $this->db->get_where('siswa', ['kelas' => 13, 'status' => 1])->num_rows();

        $this->data['title'] = "Dashboard";
        $this->load->view('admin/dashboard', $this->data);
    }
}