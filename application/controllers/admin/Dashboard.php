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
        $this->data['title'] = "Dashboard";
        $this->load->view('admin/dashboard', $this->data);
    }
}