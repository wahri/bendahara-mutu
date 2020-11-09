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
        $this->data['siswa'] = $this->db->get_where('siswa', ['id' => $id])->row_array();
        $this->load->view('admin/siswa/siswa_detail', $this->data);
    }

    public function tambah()
    {
        $this->load->view('admin/siswa/siswa_tambah');
    }

    public function update($id)
    {
    }

    // public function importDataSiswa()
    // {
    //     $this->load->library('Excel');

    //     $fileName = $_FILES['file']['name'];

    //     $config['upload_path'] = './assets/'; //path upload
    //     $config['file_name'] = $fileName;  // nama file
    //     $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
    //     $config['max_size'] = 100000; // maksimal sizze

    //     $this->load->library('upload'); //meload librari upload
    //     $this->upload->initialize($config);

    //     if (!$this->upload->do_upload('file')) {
    //         $this->session->set_flashdata('message_error', $this->upload->display_errors());
    //         redirect('admin/siswa');
    //     }

    //     $inputFileName = './assets/' . $this->upload->data('file_name');

    // try {
    //     $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    //     $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    //     $objPHPExcel = $objReader->load($inputFileName);
    // } catch (Exception $e) {
    //     die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
    // }

    // $sheet = $objPHPExcel->getSheet(0);
    // $highestRow = $sheet->getHighestRow();
    // $highestColumn = $sheet->getHighestColumn();

    // for ($row = 1; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
    //     $rowData = $sheet->rangeToArray(
    //         'A' . $row . ':' . $highestColumn . $row,
    //         NULL,
    //         TRUE,
    //         FALSE
    //     );

    //     // Sesuaikan key array dengan nama kolom di database                                                         
    //     $data = array(
    //         "nis" => $rowData[0][0],
    //         "nisn" => $rowData[0][1],
    //         "nama" => $rowData[0][2],
    //         "kelas" => $rowData[0][3],
    //         "tahun_masuk" => $rowData[0][4]
    //     );
    //     $import = $this->db->insert("siswa", $data);

    //         if ($import) {

    //             $angka_bulan = [
    //                 "07", "08", "09", "10", "11", "12", "01", "02", "03", "04", "05", "06"
    //             ];

    //             $bulan = ["Juli", "Agustus", "September", "Oktober", "November", "Desember", "Januari", "Februari", "Maret", "April", "Mei", "Juni"];

    //             for ($i = 0; $i <= 5; $i++) {
    //                 $tagihan_spp = [
    //                     'nis' => $rowData[0][0],
    //                     'harga' => str_replace('.', '', $this->input->post('spp')),
    //                     'tahun' => $rowData[0][4] . '1',
    //                     'bulan' => $angka_bulan[$i],
    //                     'kode_tagihan' => '2',
    //                     'nama_tagihan' => 'SPP ' . $bulan[$i] . ' ' . $rowData[0][4]
    //                 ];

    //                 $this->db->insert("tagihan", $tagihan_spp);
    //             }
    //             for ($i = 6; $i <= 11; $i++) {
    //                 $tagihan_spp = [
    //                     'nis' => $rowData[0][0],
    //                     'harga' => str_replace('.', '', $this->input->post('spp')),
    //                     'tahun' => $rowData[0][4] . '2',
    //                     'bulan' => $angka_bulan[$i],
    //                     'kode_tagihan' => '2',
    //                     'nama_tagihan' => 'SPP ' . $bulan[$i] . ' ' . ($rowData[0][4] + 1)
    //                 ];

    //                 $this->db->insert("tagihan", $tagihan_spp);
    //             }

    //             $kat = [
    //                 'nis' => $rowData[0][0],
    //                 'harga' => str_replace('.', '', $this->input->post('kat')),
    //                 'kode_tagihan' => '2',
    //                 'nama_tagihan' => 'Uang KAT'
    //             ];
    //             $this->db->insert("tagihan", $kat);
    //         } else {
    //             echo "something is wrong.";
    //             die;
    //         }
    //     }

    //     unlink('./assets/' . $this->upload->data('file_name'));

    //     $this->session->set_flashdata('message', 'Berhasil mengimport data siswa');
    //     redirect('admin/siswa');
    // }

    public function importDataSiswaTes()
    {
        $fileName = $_FILES['file']['name'];

        $config['upload_path'] = './assets/'; //path upload
        $config['file_name'] = $fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 100000; // maksimal sizze

        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $inputFileName = './assets/' . $this->upload->data('file_name');

            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

            $spreadsheet = $reader->load($inputFileName);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            for ($i = 1; $i < count($sheetData); $i++) {
                if (empty($sheetData[$i][0]) || empty($sheetData[$i][1]) || empty($sheetData[$i][2]) || empty($sheetData[$i][3]) || empty($sheetData[$i][4])) {
                    $this->session->set_flashdata('message_error', 'Pesan!!! Data excel tidak boleh ada yang kosong<br>Baris ' . ($i + 1) . ' kosong');
                    redirect('admin/siswa');
                }
            }

            // for ($i = 0; $i < count($sheetData); $i++) {
            //     echo $i . '<br>';
            // }
            // die;

            for ($j = 0; $j < count($sheetData); $j++) {
                $data = [
                    "nis" => $sheetData[$j][0],
                    "nisn" => $sheetData[$j][1],
                    "nama" => $sheetData[$j][2],
                    "kelas" => $sheetData[$j][3],
                    "tahun_masuk" => $sheetData[$j][4]
                ];
                $import = $this->db->insert("siswa", $data);

                if ($import) {

                    $angka_bulan = [
                        "07", "08", "09", "10", "11", "12", "01", "02", "03", "04", "05", "06"
                    ];

                    $bulan = ["Juli", "Agustus", "September", "Oktober", "November", "Desember", "Januari", "Februari", "Maret", "April", "Mei", "Juni"];

                    for ($i = 0; $i <= 5; $i++) {
                        $tagihan_spp = [
                            'nis' => $sheetData[$j][0],
                            'harga' => str_replace('.', '', $this->input->post('spp')),
                            'tahun' => $sheetData[$j][4] . '1',
                            'bulan' => $angka_bulan[$i],
                            'kode_tagihan' => '1',
                            'nama_tagihan' => 'SPP ' . $bulan[$i] . ' ' . $sheetData[$j][4]
                        ];

                        $this->db->insert("tagihan", $tagihan_spp);
                    }
                    for ($i = 6; $i <= 11; $i++) {
                        $tagihan_spp = [
                            'nis' => $sheetData[$j][0],
                            'harga' => str_replace('.', '', $this->input->post('spp')),
                            'tahun' => $sheetData[$j][4] . '2',
                            'bulan' => $angka_bulan[$i],
                            'kode_tagihan' => '1',
                            'nama_tagihan' => 'SPP ' . $bulan[$i] . ' ' . ($sheetData[$j][4] + 1)
                        ];

                        $this->db->insert("tagihan", $tagihan_spp);
                    }

                    $kat = [
                        'nis' => $sheetData[$j][0],
                        'harga' => str_replace('.', '', $this->input->post('kat')),
                        'kode_tagihan' => '2',
                        'nama_tagihan' => 'Uang KAT'
                    ];
                    $this->db->insert("tagihan", $kat);
                } else {
                    echo "something is wrong.";
                    die;
                }
            }
            $this->session->set_flashdata('message', 'Berhasil mengimport data siswa');
            redirect('admin/siswa');
        } else {
            $this->session->set_flashdata('message_error', $this->upload->display_errors());
            redirect('admin/siswa');
        }
    }
}
