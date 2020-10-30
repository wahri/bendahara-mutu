<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->data['user'] = $this->db->get('user')->result_array();
    }

    public function index($id = null)
    {
        if($id != null){
            $this->data['user_edit'] = $this->db->get_where('user', ['id' => $id])->row_array();
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
        $this->form_validation->set_rules('level', 'Level Akun  ', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');

        if ($this->form_validation->run() === TRUE) {
            $this->_tambahUser();
        } else {
            $this->data['title'] = "Tambah User";
            $this->load->view('admin/user/add_user', $this->data);
        }
    }

    public function _tambahuser()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'level' => $this->input->post('level'),
            'active' => 1
        ];

        $this->db->insert('user', $data);
        $this->session->set_flashdata('message', 'Berhasil menambah user.');
        redirect("admin/user", 'refresh');
    }

    public function set_status($id)
    {
        $admin = $this->data['user_login'];

        $user = $this->db->get_where('user', ['id' => $id])->row_array();


        if ($admin['id'] != $id) {
            $data['active'] = !$user['active'];
            $this->db->update('user', $data, ['id' => $id]);

            $this->session->set_flashdata('message', 'Berhasil mengupdate status!');
            redirect("admin/user", 'refresh');
        } else {
            $this->session->set_flashdata('message_error', 'Tidak bisa mengubah status ketika login!');
            redirect("admin/user", 'refresh');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('level', 'Level Akun  ', 'required');
        if(!empty($this->input->post('password'))){
            $this->form_validation->set_rules('password', 'Password', 'required|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required');
        }

        if ($this->form_validation->run() === TRUE) {
            if (!empty($this->input->post('password'))) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $this->db->update('user', $data, ['id' => $id]);
            }
            $data = [
                'level' => $this->input->post('level')
            ];
            $this->db->update('user', $data, ['id' => $id]);

            $this->session->set_flashdata('message', 'Berhasil mengupdate status!');
            redirect("admin/user", 'refresh');
        } else {
            $this->data['user_edit'] = $this->db->get_where('user', ['id' => $id])->row_array();
            $this->data['title'] = "Tambah User";
            $this->load->view('admin/user/edit_user', $this->data);
        }
    }
}
