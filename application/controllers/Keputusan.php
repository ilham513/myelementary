<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keputusan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->helper('c45_helper');
    }

    public function index()
    {
        $data_penilaian = $this->crud_model->get_penilaian_with_karyawan();

        // Dataset training
        $data_training = [
            ['kinerja' => 'Sangat Baik', 'kehadiran' => 'Lengkap', 'kreativitas' => 'Tinggi', 'label' => 'Terbaik'],
            ['kinerja' => 'Baik', 'kehadiran' => 'Lengkap', 'kreativitas' => 'Tinggi', 'label' => 'Terbaik'],
            ['kinerja' => 'Baik', 'kehadiran' => 'Kurang', 'kreativitas' => 'Sedang', 'label' => 'Tidak'],
            ['kinerja' => 'Cukup', 'kehadiran' => 'Lengkap', 'kreativitas' => 'Rendah', 'label' => 'Tidak'],
            ['kinerja' => 'Sangat Baik', 'kehadiran' => 'Kurang', 'kreativitas' => 'Tinggi', 'label' => 'Tidak'],
            ['kinerja' => 'Sangat Baik', 'kehadiran' => 'Lengkap', 'kreativitas' => 'Sedang', 'label' => 'Terbaik'],
            ['kinerja' => 'Baik', 'kehadiran' => 'Lengkap', 'kreativitas' => 'Sedang', 'label' => 'Terbaik'],
            ['kinerja' => 'Cukup', 'kehadiran' => 'Kurang', 'kreativitas' => 'Sedang', 'label' => 'Tidak'],
            ['kinerja' => 'Sangat Baik', 'kehadiran' => 'Lengkap', 'kreativitas' => 'Tinggi', 'label' => 'Terbaik'],
            ['kinerja' => 'Baik', 'kehadiran' => 'Lengkap', 'kreativitas' => 'Rendah', 'label' => 'Tidak']
        ];

        // Klasifikasi penilaian yang sudah ada
        $hasil_klasifikasi = [];
        foreach ($data_penilaian as $item) {
            $status = klasifikasi_c45($item->kinerja, $item->kehadiran, $item->kreativitas);
            $hasil_klasifikasi[] = [
                'nama_karyawan' => $item->nama_karyawan,
                'kinerja' => $item->kinerja,
                'kehadiran' => $item->kehadiran,
                'kreativitas' => $item->kreativitas,
                'status' => $status
            ];
        }

        $data['hasil_klasifikasi'] = $hasil_klasifikasi;
        $data['data_training'] = $data_training;

        $this->load->view('keputusan_index', $data);
    }

    public function cetak_pdf()
{
    $this->load->model('crud_model');
    $this->load->helper('c45_helper');
    $this->load->library('pdf');

    $data_penilaian = $this->crud_model->get_penilaian_with_karyawan();
    $hasil_klasifikasi = [];

    foreach ($data_penilaian as $item) {
        $status = klasifikasi_c45($item->kinerja, $item->kehadiran, $item->kreativitas);
        $hasil_klasifikasi[] = [
            'nama_karyawan' => $item->nama_karyawan,
            'kinerja' => $item->kinerja,
            'kehadiran' => $item->kehadiran,
            'kreativitas' => $item->kreativitas,
            'status' => $status
        ];
    }

    $data['hasil_klasifikasi'] = $hasil_klasifikasi;

    // Ambil HTML dari view
    $html = $this->load->view('keputusan_pdf', $data, true);

    // Set dan render PDF
    $this->pdf->loadHtml($html);
    $this->pdf->setPaper('A4', 'portrait');
    $this->pdf->render();
    $this->pdf->stream("laporan_keputusan_karyawan.pdf", array("Attachment" => false));
}

}
