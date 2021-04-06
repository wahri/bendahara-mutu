<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = "Jurusan";
        $this->load->view('admin/jurusan/jurusan', $this->data);
    }
}