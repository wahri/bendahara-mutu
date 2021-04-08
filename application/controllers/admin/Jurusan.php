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
        if($this->input->post('tambah_jurusan')){
            $data = [
                'nama_jurusan' => $this->input->post('nama_jurusan')
            ];
            $this->db->insert('jurusan', $data);

            $this->session->set_flashdata('message', 'Berhasil menambah jurusan.');
            redirect('admin/jurusan');
        }
        if($this->input->post('edit_jurusan')){
            $data = [
                'nama_jurusan' => $this->input->post('nama_jurusan')
            ];
            $this->db->update('jurusan', $data, ['id_jurusan' => $this->input->post('id_jurusan')]);

            $this->session->set_flashdata('message', 'Berhasil menambah jurusan.');
            redirect('admin/jurusan');
        }
        $this->db->order_by('nama_jurusan', 'asc');
        $this->data['jurusan'] = $this->db->get('jurusan')->result_array();
        $this->data['title'] = "Jurusan";
        $this->load->view('admin/jurusan/jurusan', $this->data);
    }

    public function hapusJurusan($id)
    {
        $this->db->delete('jurusan', ['id_jurusan' => $id]);
        $this->session->set_flashdata('message', 'Berhasil menghapus jurusan.');
        redirect('admin/jurusan');
    }
}