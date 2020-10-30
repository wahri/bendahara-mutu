<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_Masuk extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['um'] = $this->db->get('uang_masuk')->result_array();
        $this->data['title'] = "Uang Masuk";
        $this->load->view('admin/uang_masuk/add_uang_masuk', $this->data);
    }
}
