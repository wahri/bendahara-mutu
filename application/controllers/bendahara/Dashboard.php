<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Bendahara_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = "Dashboard";
        $this->load->view('bendahara/dashboard', $this->data);
    }
}