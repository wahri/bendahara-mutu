<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends Kepsek_Controller
{
    public function index()
    {
        $this->data['title'] = "Profile";
        $this->load->view('kepsek/profile/profile', $this->data);
    }
}
