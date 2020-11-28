<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->db->distinct();
        $this->db->select('kode_tagihan, nama_tagihan');
        $this->data['tagihan'] = $this->db->get_where('tagihan', ['kode_tagihan !=' => 1])->result_array();
        $this->data['tagihan'] = $this->db->get('tagihan_lainnya')->result_array();
        $this->data['title'] = "Tagihan";
        $this->load->view('admin/tagihan/tagihan', $this->data);
    }

    public function diskon()
    {
        $this->data['title'] = "Diskon Tagihan";
        $this->load->view('admin/tagihan/diskon_tagihan', $this->data);
    }

    public function editdiskon()
    {
        $this->data['title'] = "Edit Diskon";
        $this->load->view('admin/tagihan/edit_diskon', $this->data);
    }

    public function buatTagihanLainnya()
    {
        $this->form_validation->set_rules('pilih_kelas', 'Target siswa', 'trim|required');
        $this->form_validation->set_rules('nama_tagihan', 'Nama Tagihan', 'trim|required');
        $this->form_validation->set_rules('harga', 'Nominal', 'trim|required');

        if ($this->form_validation->run() === TRUE) {
            $this->db->select_max('kode_tagihan', 'kode');
            $kode_tagihan = $this->db->get('tagihan_lainnya')->row_array();

            $data = [
                'target' => $this->input->post('pilih_kelas'),
                'nama_tagihan' => $this->input->post('nama_tagihan'),
                'kode_tagihan' => empty($kode_tagihan['kode']) ? 2 : $kode_tagihan['kode'] + 1,
                'harga' => str_replace('.', '', $this->input->post('harga'))
            ];
            $this->db->insert('tagihan_lainnya', $data);

            $this->session->set_flashdata('message', 'Berhasil membuat tagihan...');
            redirect('admin/tagihan');
        } else {
            $this->session->set_flashdata('message_error', 'Gagal membuat tagihan <br>' . validation_errors());
            redirect('admin/tagihan');
        }

        // $target = $this->input->post('pilih_kelas');
        // if($target == 'all'){
        //     $siswa = $this->db->get_where('siswa', ['kelas !=' => 13])->result_array();
        //     $jml_siswa = $this->db->get_where('siswa', ['kelas !=' => 13])->num_rows();
        // }else{
        //     $siswa = $this->db->get_where('siswa', ['kelas' => $target])->result_array();
        //     $jml_siswa = $this->db->get_where('siswa', ['kelas' => $target])->num_rows();
        // }

        // $this->db->select_max('kode_tagihan', 'kode');
        // $kode_tagihan = $this->db->get('tagihan')->row_array();

        // if(!empty($siswa)){
        //     $i = 0;
        //     foreach($siswa as $s){
        //         $data = [
        //             'nis' => $s['nis'],
        //             'harga' => str_replace('.', '', $this->input->post('harga')),
        //             'kode_tagihan' => empty($kode_tagihan['kode']) ? 2 : $kode_tagihan['kode'] + 1,
        //             'nama_tagihan' => $this->input->post('nama_tagihan')
        //         ];
        //         $this->db->insert('tagihan', $data);
        //         $i++;
        //     }
        //     if($i == $jml_siswa){
        //         $this->session->set_flashdata('message', 'Berhasil membuat tagihan...');
        //         redirect('admin/tagihan');
        //     }else{
        //         $this->session->set_flashdata('message', 'Berhasil membuat tagihan...');
        //         $this->session->set_flashdata('message_error', $i . ' tagihan gagal dibuat');
        //         redirect('admin/tagihan');  
        //     }
        // }else{
        //     $this->session->set_flashdata('message_error', 'Target siswa kosong...');
        //     redirect('admin/tagihan');  
        // }
    }

    public function editTagihan($kode)
    {
        $this->form_validation->set_rules('nama_tagihan', 'Nama Tagihan', 'trim|required');
        $this->form_validation->set_rules('harga', 'Nominal', 'trim|required');

        if ($this->form_validation->run() === TRUE) {
            $cek_bayar = $this->db->get_Where('tagihan', ['kode_tagihan' => $kode, 'jml_dibayar >' => 0])->result_array();
            if (!empty($cek_bayar)) {
                $this->session->set_flashdata('message_error', 'Tidak bisa mengubah tagihan yang sudah ada transaksi!');
                redirect("admin/tagihan", 'refresh');
            } else {
                $data = [
                    'nama_tagihan' => $this->input->post('nama_tagihan'),
                    'harga' => str_replace('.', '', $this->input->post('harga'))
                ];
                $this->db->update('tagihan_lainnya', $data, ['kode_tagihan' => $kode]);

                $this->session->set_flashdata('message', 'Berhasil mengubah data tagihan');
                redirect("admin/tagihan", 'refresh');
            }
        } else {
            // TABEL TAGIHAN
            $this->db->distinct();
            $this->db->select('kode_tagihan, nama_tagihan');
            $this->data['tagihan'] = $this->db->get_where('tagihan_lainnya')->result_array();

            // TAGIHAN YG AKAN DIEDIT
            $this->data['tagihans'] = $this->db->get_where('tagihan_lainnya', ['kode_tagihan' => $kode])->row_array();

            $this->data['title'] = "Edit Tagihan";
            $this->load->view('admin/tagihan/edittagihan', $this->data);
        }
    }

    public function deleteTagihan($kode)
    {
        $cek_bayar = $this->db->get_Where('tagihan', ['kode_tagihan' => $kode, 'jml_dibayar >' => 0])->result_array();
        if (!empty($cek_bayar)) {
            $this->session->set_flashdata('message_error', 'Tidak bisa menghapus tagihan yang sudah ada transaksi!');
            redirect("admin/tagihan", 'refresh');
        } else {
            $cek_tagihan = $this->db->get_Where('tagihan', ['kode_tagihan' => $kode])->result_array();
            if (!empty($cek_tagihan)) {
                $this->db->delete('tagihan', ['kode_tagihan' => $kode]);
            }
            $this->db->delete('tagihan_lainnya', ['kode_tagihan' => $kode]);

            $this->session->set_flashdata('message', 'Berhasil menghapus data tagihan');
            redirect("admin/tagihan", 'refresh');
        }
    }
    public function tambahPembayaran()
    {
        $data = [
            "nama_pembayaran" => $this->input->post("nama_pembayaran"),
            "harga" => $this->input->post("harga"),
            "is_spp" => $this->input->post("is_spp")
        ];

        $this->db->insert("pembayaran", $data);

        redirect("admin/tagihan");
    }

    public function deletePembayaran($id)
    {
    }
}
