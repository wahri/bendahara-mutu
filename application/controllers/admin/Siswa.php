<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size'] = 10000;

        $this->data['title'] = "Siswa Management";
        $this->load->view('admin/siswa/siswa', $this->data);
    }

    public function importDataSiswa()
    {
        $this->load->library('Excel');

        $fileName = $_FILES['file']['name'];

        $config['upload_path'] = './assets/'; //path upload
        $config['file_name'] = $fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 100000; // maksimal sizze

        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            $this->session->set_flashdata('message_error', $this->upload->display_errors());
            redirect('admin/siswa');
        }

        $inputFileName = './assets/' . $this->upload->data('file_name');

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 1; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray(
                'A' . $row . ':' . $highestColumn . $row,
                NULL,
                TRUE,
                FALSE
            );

            // Sesuaikan key array dengan nama kolom di database                                                         
            $data = array(
                "nis" => $rowData[0][0],
                "nisn" => $rowData[0][1],
                "nama" => $rowData[0][2],
                "kelas" => $rowData[0][3],
                "tahun_masuk" => $rowData[0][4],
                "kat" => str_replace('.', '', $this->input->post('kat')),
                "spp" => str_replace('.', '', $this->input->post('spp'))
            );
            $import = $this->db->insert("siswa", $data);

            if ($import) {

                $bulan = [
                    "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                ];

                for ($i = 0; $i <= 11; $i++) {
                    $spp = [
                        "nis" => $rowData[0][0],
                        "kode_tagihan" => 2,
                        "harga" => 200000,
                        "bulan" => $bulan[$i],
                        "jml_dibayar" => 0,
                        "status" => 0,
                        "sisa_tagihan" => 200000
                    ];
                    $this->db->insert("tagihan", $spp);
                }

                $kat = [
                    "nis" => $rowData[0][0],
                    "kode_tagihan" => 1,
                    "harga" => 1000000,
                    "bulan" => $bulan[$i],
                    "jml_dibayar" => 0,
                    "status" => 0,
                    "sisa_tagihan" => 1000000
                ];
                $this->db->insert("tagihan", $kat);
            }
        }
        $this->session->set_flashdata('message', 'Berhasil mengimport data siswa');
        redirect('admin/siswa');
    }
}
