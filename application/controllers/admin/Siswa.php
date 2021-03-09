<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Siswa extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['siswa'] = $this->db->get('siswa')->result_array();
        $this->data['title'] = "Siswa Management";
        $this->load->view('admin/siswa/siswa', $this->data);
    }

    public function detail($id)
    {
        if($this->input->post('simpan')){
            $siswa = $this->db->get_where('siswa', ['id' => $id])->row_array();
            $nis = empty($this->input->post('nis')) ? null : $this->input->post('nis');
            $nisn = empty($this->input->post('nisn')) ? null : $this->input->post('nisn');

            if($this->input->post('nis') != $siswa['nis']){
                $cek_mhs = $this->db->get_Where('siswa', "nis = '$nis'")->num_rows();
                if($cek_mhs > 0){
                    $this->session->set_flashdata('message_error', 'Gagal mengubah data siswa, NIS duplikat');
                    redirect('admin/siswa/detail/' . $id);
                }else{
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'kelas' => $this->input->post('kelas'),
                        'nis' => $nis,
                        'jurusan' => $this->input->post('jurusan'),
                        'tahun_masuk' => $this->input->post('tahun_masuk')
                    ];
                    $this->db->update('siswa', $data, ['id' => $id]);

                    $this->session->set_flashdata('message', 'Berhasil mengubah data siswa');
                    redirect('admin/siswa/detail/' . $id);
                }
            }elseif( $this->input->post('nisn') != $siswa['nisn']){
                $cek_mhs = $this->db->get_Where('siswa', "nisn = '$nisn'")->num_rows();
                if ($cek_mhs > 0) {
                    $this->session->set_flashdata('message_error', 'Gagal mengubah data siswa, NISN duplikat');
                    redirect('admin/siswa/detail/' . $id);
                } else {
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'kelas' => $this->input->post('kelas'),
                        'nisn' => $nisn,
                        'jurusan' => $this->input->post('jurusan'),
                        'tahun_masuk' => $this->input->post('tahun_masuk')
                    ];
                    $this->db->update('siswa', $data, ['id' => $id]);

                    $this->session->set_flashdata('message', 'Berhasil mengubah data siswa');
                    redirect('admin/siswa/detail/' . $id);
                }
            }else{
                $data = [
                    'nama' => $this->input->post('nama'),
                    'kelas' => $this->input->post('kelas'),
                    'jurusan' => $this->input->post('jurusan'),
                    'tahun_masuk' => $this->input->post('tahun_masuk')
                ];
                $this->db->update('siswa', $data, ['id' => $id]);

                $this->session->set_flashdata('message', 'Berhasil mengubah data siswa');
                redirect('admin/siswa/detail/' . $id);
            }
        }

        $this->data['title'] = "Detail Siswa";
        $this->data['siswa'] = $this->db->get_where('siswa', ['id' => $id])->row_array();
        $this->data['transaksi'] = $this->db->get_where('transaksi', ['nis' => $this->data['siswa']['nis']])->result_array();
        $this->load->view('admin/siswa/siswa_detail', $this->data);
    }

    public function tambah()
    {
        $this->data['title'] = "Tambah Siswa";
        $this->load->view('admin/siswa/siswa_tambah', $this->data);
    }

    public function tambahSiswaBaru()
    {
        $cek_nis = $this->db->get_where('siswa', ['nis' => $this->input->post('nis')])->row_array();
        $cek_nisn = $this->db->get_where('siswa', ['nisn' => $this->input->post('nisn')])->row_array();
        if(!empty($cek_nis)){
            $this->session->set_flashdata('message_error', 'Gagal menambah siswa, NIS duplikat');
            redirect('admin/siswa');
        }elseif(!empty($cek_nisn)){
            $this->session->set_flashdata('message_error', 'Gagal menambah siswa, NISN duplikat');
            redirect('admin/siswa');
        }else{
            $data = [
                'nis' => $this->input->post('nis'),
                'nisn' => $this->input->post('nisn'),
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas'),
                'jurusan' => $this->input->post('jurusan'),
                'tahun_masuk' => $this->input->post('tahun_masuk'),
                'spp' => str_replace('.', '', $this->input->post('spp'))
            ];
            $this->db->insert('siswa', $data);

            $this->session->set_flashdata('message', 'Berhasil menambah siswa');
            redirect('admin/siswa');
        }
    }

    public function update($id)
    {
    }

    public function naik_kelas()
    {
        $this->data['title'] = "Naik Kelas";
        $this->data['siswa'] = $this->db->get_where('siswa', 'kelas != 13')->result_array();
        $this->load->view('admin/siswa/naik_kelas', $this->data);
    }

    public function progresnaikkelas()
    {
        $data13['kelas']=13;
        $data13['tahun_lulus']= date('Y');
        $this->db->where('kelas', 12);
        $this->db->where_not_in('nis', $this->input->post('nis'));
        $this->db->update('siswa', $data13);
        $data12['kelas']=12;
        $this->db->where('kelas', 11);
        $this->db->where_not_in('nis', $this->input->post('nis'));
        $this->db->update('siswa', $data12);
        $data11['kelas']=11;
        $this->db->where('kelas', 10);
        $this->db->where_not_in('nis', $this->input->post('nis'));
        $this->db->update('siswa', $data11);

        // buat tagihan setahun kedepan
        // $siswa = $this->db->get_where('siswa', ('kelas != 13'))->result_array();
        // foreach ($siswa as $s) {
        //     $this->db->order_by('id_tagihan', 'DESC');
        //     $tagihan_lama = $this->db->get_where('tagihan', ['nis' => $s['nis'], 'kode_tagihan' => 1])->row_array();
        //     $tahun = substr($tagihan_lama['tahun'], 0, 4) + 1;

        //     $angka_bulan = [
        //         "07", "08", "09", "10", "11", "12", "01", "02", "03", "04", "05", "06"
        //     ];

        //     $bulan = ["Juli", "Agustus", "September", "Oktober", "November", "Desember", "Januari", "Februari", "Maret", "April", "Mei", "Juni"];

        //     for ($i = 0; $i <= 5; $i++) {
        //         $tagihan_spp = [
        //             'nis' => $s['nis'],
        //             'harga' => $tagihan_lama['harga'],
        //             'tahun' => $tahun . '1',
        //             'bulan' => $angka_bulan[$i],
        //             'kode_tagihan' => '1',
        //             'nama_tagihan' => 'SPP ' . $bulan[$i] . ' ' . $tahun,
        //             'kelas' => $s['kelas']
        //         ];

        //         $this->db->insert("tagihan", $tagihan_spp);
        //     }
        //     for ($i = 6; $i <= 11; $i++) {
        //         $tagihan_spp = [
        //             'nis' => $s['nis'],
        //             'harga' => $tagihan_lama['harga'],
        //             'tahun' => $tahun . '2',
        //             'bulan' => $angka_bulan[$i],
        //             'kode_tagihan' => '1',
        //             'nama_tagihan' => 'SPP ' . $bulan[$i] . ' ' . ($tahun + 1),
        //             'kelas' => $s['kelas']
        //         ];

        //         $this->db->insert("tagihan", $tagihan_spp);
        //     }
        // }

        $this->session->set_flashdata('message', 'kelas berhasil di update...');
        redirect('admin/siswa');
    }


    public function importDataSiswaTes()
    {
        $fileName = $_FILES['file']['name'];

        $config['upload_path'] = './temp_upload/'; //path upload
        $config['file_name'] = $fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 100000; // maksimal sizze

        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $inputFileName = './temp_upload/' . $this->upload->data('file_name');

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

            $spreadsheet = $reader->load($inputFileName);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            // cek data kosong
            // for ($i = 0; $i < count($sheetData); $i++) {
            //     if (empty($sheetData[$i][0]) || empty($sheetData[$i][1]) || empty($sheetData[$i][2]) || empty($sheetData[$i][3]) || empty($sheetData[$i][4])) {
            //         unlink('./temp_upload/' . $this->upload->data('file_name'));
            //         $this->session->set_flashdata('message_error', 'Pesan!!! Data excel tidak boleh ada yang kosong<br>Baris ' . ($i + 1) . ' kosong');
            //         redirect('admin/siswa');
            //     }
            // }

            $hitung_error_baris = "";
            for ($j = 0; $j < count($sheetData); $j++) {
                
                // cek field kosong
                if (empty($sheetData[$j][0]) && empty($sheetData[$j][1]) && empty($sheetData[$j][2]) && empty($sheetData[$j][3]) && empty($sheetData[$j][4]) && empty($sheetData[$j][5])) {
                    continue;
                }

                // cek data kosong
                if (empty($sheetData[$j][0]) || empty($sheetData[$j][1]) || empty($sheetData[$j][2]) || empty($sheetData[$j][3]) || empty($sheetData[$j][4]) || empty($sheetData[$j][5])) {
                    $hitung_error_baris .= "Baris " . ($j + 1) . " gagal ditambahkan, Data tidak lengkap<br />";
                    print_r($sheetData[$j]);
                    die;
                    continue;
                }

                $cek_nis = $this->db->get_where('siswa', ['nis' => $sheetData[$j][0]])->row_array();
                if (!empty($cek_nis)) {
                    $hitung_error_baris .= "Baris " . ($j + 1) . " gagal ditambahkan, NIS duplikat atau sudah terdaftar<br />";
                    continue;
                }

                $cek_nisn = $this->db->get_where('siswa', ['nisn' => $sheetData[$j][1]])->row_array();
                if (!empty($cek_nisn)) {
                    $hitung_error_baris .= "Baris " . ($j + 1) . " gagal ditambahkan, NISN duplikat atau sudah terdaftar<br />";
                    continue;
                }
                $data = [
                    "nis" => $sheetData[$j][0],
                    "nisn" => $sheetData[$j][1],
                    "nama" => $sheetData[$j][2],
                    "kelas" => $sheetData[$j][3],
                    "tahun_masuk" => $sheetData[$j][4],
                    "jurusan" => $sheetData[$j][5],
                    'spp' => str_replace('.', '', $this->input->post('spp'))
                ];
                // $import = $this->db->insert("siswa", $data);
                $this->db->insert("siswa", $data);

                // if ($import) {

                //     $angka_bulan = [
                //         "07", "08", "09", "10", "11", "12", "01", "02", "03", "04", "05", "06"
                //     ];

                //     $bulan = ["Juli", "Agustus", "September", "Oktober", "November", "Desember", "Januari", "Februari", "Maret", "April", "Mei", "Juni"];

                //     for ($i = 0; $i <= 5; $i++) {
                //         $tagihan_spp = [
                //             'nis' => $sheetData[$j][0],
                //             'harga' => str_replace('.', '', $this->input->post('spp')),
                //             'tahun' => $sheetData[$j][4] . '1',
                //             'bulan' => $angka_bulan[$i],
                //             'kode_tagihan' => '1',
                //             'nama_tagihan' => 'SPP ' . $bulan[$i] . ' ' . $sheetData[$j][4]
                //         ];

                //         $this->db->insert("tagihan", $tagihan_spp);
                //     }
                //     for ($i = 6; $i <= 11; $i++) {
                //         $tagihan_spp = [
                //             'nis' => $sheetData[$j][0],
                //             'harga' => str_replace('.', '', $this->input->post('spp')),
                //             'tahun' => $sheetData[$j][4] . '2',
                //             'bulan' => $angka_bulan[$i],
                //             'kode_tagihan' => '1',
                //             'nama_tagihan' => 'SPP ' . $bulan[$i] . ' ' . ($sheetData[$j][4] + 1)
                //         ];

                //         $this->db->insert("tagihan", $tagihan_spp);
                //     }

                //     $kat = [
                //         'nis' => $sheetData[$j][0],
                //         'harga' => str_replace('.', '', $this->input->post('kat')),
                //         'kode_tagihan' => '2',
                //         'nama_tagihan' => 'Uang KAT'
                //     ];
                //     $this->db->insert("tagihan", $kat);
                // } else {
                //     echo "something is wrong.";
                //     die;
                // }
            }

            unlink('./temp_upload/' . $this->upload->data('file_name'));
            if (!empty($hitung_error_baris)) {
                $this->session->set_flashdata('message_error', $hitung_error_baris);
            }
            $this->session->set_flashdata('message', 'Selesai mengimport data siswa...');
            redirect('admin/siswa');
        } else {
            $this->session->set_flashdata('message_error', $this->upload->display_errors());
            redirect('admin/siswa');
        }
    }
}
