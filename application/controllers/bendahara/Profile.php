<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends Bendahara_Controller
{
    public function index()
    {
        $this->data['title'] = "Profile";
        $this->load->view('bendahara/profile/profile', $this->data);
    }
}
