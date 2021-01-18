<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_keluar extends Admin_Controller
{
    public function index()
    {
        $this->data['transaksi_pengeluaran'] = $this->db->get('transaksi_pengeluaran')->result_array();

        $this->db->select_sum('total');
        $this->data['total_uangmasuk'] = $this->db->get('transaksi')->row_array();

        $this->db->select_sum('nominal');
        $this->data['total_uangkeluar'] = $this->db->get('transaksi_pengeluaran')->row_array();

        $this->data['title'] = "Manajemen Transaksi Uang Keluar ";
        $this->load->view('admin/uang_keluar/uang_keluar', $this->data);
    }

    public function hapusTransaksi($id)
    {
        $this->db->delete('transaksi_pengeluaran', ['id_transaksi' => $id]);
        
        $this->session->set_flashdata('message', 'Berhasil menghapus transaksi!');
        redirect("admin/uang_keluar", 'refresh');
    }
}