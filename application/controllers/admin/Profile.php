<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends Admin_Controller
{
    public function index()
    {
        $this->data['title'] = "Profile";
        $this->load->view('admin/profile/profile', $this->data);
    }
}
