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
        $this->data['title'] = "Tagihan";
        $this->load->view('admin/tagihan/tagihan', $this->data);
    }

    public function diskon()
    {
        $this->data['title'] = "Diskon Tagihan";
        $this->load->view('admin/tagihan/diskon_tagihan', $this->data);
    }

    public function buatTagihan()
    {
        if ($this->input->post("lingkup") == "semuasiswa") {
            $this->db->select('nis');
            $this->db->from('siswa');
            $siswaAll = $this->db->get();


            $pembayaran = $this->db->get_where('pembayaran', array('id' => $this->input->post('tagihan')))->row_array();

            if ($pembayaran['is_spp'] == 1) {
                foreach ($siswaAll->result() as $row) {

                    $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

                    for ($i = 0; $i <= 11; $i++) {
                        $tagihan_spp = [
                            "nis" => $row->nis,
                            "id_pembayaran" => $pembayaran['id'],
                            "harga" => $pembayaran['harga'],
                            "jml_dibayar" => 0,
                            "is_lunas" => 0,
                            "tahun" => $this->input->post('tahun'),
                            "bulan" => $bulan[$i],
                            "sisa_bayar" => $pembayaran['harga'],
                            "is_spp" => $pembayaran['is_spp'],
                            "nama_tagihan" => $pembayaran['nama_pembayaran'] . ' ' . $bulan[$i]
                        ];

                        $this->db->insert("tagihan", $tagihan_spp);
                    }
                }
            } else {

                foreach ($siswaAll->result() as $row) {
                    $tagihan = [
                        "nis" => $row->nis,
                        "id_pembayaran" => $pembayaran['id'],
                        "harga" => $pembayaran['harga'],
                        "jml_dibayar" => 0,
                        "is_lunas" => 0,
                        "tahun" => $this->input->post('tahun'),
                        "sisa_bayar" => $pembayaran['harga'],
                        "is_spp" => $pembayaran['is_spp'],
                        "nama_tagihan" => $pembayaran['nama_pembayaran']
                    ];

                    $this->db->insert("tagihan", $tagihan);
                }
            }
        }

        redirect("admin/tagihan");
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
