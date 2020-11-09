<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends Bendahara_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->data['title'] = "Cari Siswa";
        $this->data['siswa'] = $this->db->get('siswa')->result_array();
        $this->load->view('bendahara/pembayaran', $this->data);
    }

    public function detail($nis, $tahun = null)
    {
        $tahun = !empty($tahun) ? $tahun : date('Y');
        $this->data['siswa'] = $this->db->get_where('siswa', ['nis' => $nis])->row_array();
        $this->data['tahun'] = $tahun;

        $this->data['notif_cart'] = $this->db->get_where('cart', ['nis' => $nis])->num_rows();
        $this->data['cart'] = $this->db->get_where('cart', ['nis' => $nis])->result_array();
        $this->db->select_sum('nominal');
        $this->data['total_cart'] = $this->db->get_where('cart', ['nis' => $nis])->row_array();

        $this->data['sem_ganjil'] = $this->db->get_where('tagihan', ['nis' => $nis, 'tahun' => $tahun . '1', 'kode_tagihan' => 1])->result_array();
        $this->data['sem_genap'] = $this->db->get_where('tagihan', ['nis' => $nis, 'tahun' => $tahun . '2', 'kode_tagihan' => 1])->result_array();
        $this->data['uang_kat'] = $this->db->get_where('tagihan', ['nis' => $nis, 'kode_tagihan' => 2])->row_array();
        $this->data['title'] = "Detail Pembayaran";
        $this->load->view('bendahara/pembayaran_detail', $this->data);
    }


    public function getCart($nis)
    {

        $this->db->select('*');
        $this->db->where('nis', $nis);
        $cart = $this->db->get('cart')->result_array();

        echo json_encode($cart);
    }

    public function tambahCart()
    {
        //ambil data tagihan
        $tagihan = $this->db->get_where('tagihan', ['id_tagihan' => $this->input->post('idTagihanToCart')])->row_array();
        // print_r($tagihan);
        // die;
        $sisa_tagihan = $tagihan['harga'] - $tagihan['jml_dibayar'];

        //form validation rule
        $this->form_validation->set_rules('nisToCart', 'nisToCart', 'required');
        $this->form_validation->set_rules('itemToCart', 'itemToCart', 'required');
        $this->form_validation->set_rules('nominalToCart', 'itemToCart', 'required');
        $this->form_validation->set_rules('idTagihanToCart', 'idTagihanToCart', 'required|integer');

        //custom message
        $this->form_validation->set_message('integer', 'Harus Berupa Angka!');
        $this->form_validation->set_message('required', 'Input Tidak Boleh Kosong!');
        $this->form_validation->set_message('less_than', 'Input Tidak Boleh Lebih Dari Tagihan!');

        $nominal = str_replace('.', '', $this->input->post('nominalToCart'));

        if ($this->form_validation->run() == TRUE) {
            if (($sisa_tagihan - $nominal) >= 0) {
                $data = [
                    'nis' => $this->input->post('nisToCart'),
                    'item' => $this->input->post('itemToCart'),
                    'nominal' => $nominal,
                    'id_tagihan' => $this->input->post('idTagihanToCart'),
                ];
                $this->db->insert('cart', $data);
                $this->session->set_flashdata('message', '<strong>Berhasil!</strong> menambahkan item ke cart');
                redirect('bendahara/pembayaran/detail/' . $tagihan['nis']);
                // echo "error ss";
                // die;
            } else {
                $this->session->set_flashdata('message_error', '<strong>Gagal!</strong> Jumlah melebihi sisa pembayaran');
                redirect('bendahara/pembayaran/detail/' . $tagihan['nis']);
            }
        } else {
            echo 'error';
            die;
        }
    }

    public function hapusCart($nis, $id)
    {
        $this->db->delete('cart', array('id_tagihan' => $id));

        $this->session->set_flashdata('message', '<strong>Berhasil!</strong> menghapus item dari cart');
        redirect('bendahara/pembayaran/detail/' . $nis);
    }

    public function confirmPembayaran($nis)
    {
        //ambil data input berupa array
        $nominal = $this->input->post('nominal');

        //looping data update ke tabel tagihan
        $i = 0;
        $kode_transaksi = 'TR-' . date("YmdHis");
        $total = 0;

        foreach ($this->input->post('id_tagihan') as $id_tagihan) {

            $tagihan = $this->db->get_where('tagihan', ['id_tagihan' => $id_tagihan])->row_array();

            $bayar = $tagihan['jml_dibayar'] + $nominal[$i];

            $data = [
                'jml_dibayar' => $bayar
            ];


            if ($bayar == $tagihan['harga']) {
                $data['is_lunas'] = 1;
            } else {
                $data['is_lunas'] = 0;
            }

            //update data tagihan
            $this->db->where('id_tagihan', $id_tagihan);
            $this->db->update('tagihan', $data);


            $cart = $this->db->get_where('cart', ['id_tagihan' => $id_tagihan])->row_array();

            $transaksi_detail = [
                'kode_transaksi' => $kode_transaksi,
                'nominal' => $nominal[$i],
                'nama_item' => $cart['item'],
                'id_tagihan' => $id_tagihan,
                'kode_tagihan' => $tagihan['kode_tagihan']
            ];

            $total += $nominal[$i];

            $this->db->insert('transaksi_detail', $transaksi_detail);
            $i++;
        }

        //input transaction
        $transaksi = [
            'kode_transaksi' => $kode_transaksi,
            'total' => $total,
            'nis' => $nis
        ];
        $this->db->insert('transaksi', $transaksi);

        //delete item cart
        $this->db->where('nis', $tagihan['nis']);
        $this->db->delete('cart');

        redirect('bendahara/transaksi/success/' . $kode_transaksi);
    }
}
