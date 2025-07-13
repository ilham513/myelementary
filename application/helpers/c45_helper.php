<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('klasifikasi_c45')) {
    function klasifikasi_c45($kinerja, $kehadiran, $kreativitas)
    {
        // Aturan sederhana berbasis pengamatan data training
        if ($kinerja == 'Sangat Baik' && $kehadiran == 'Lengkap' && $kreativitas == 'Tinggi') {
            return 'Terbaik';
        } elseif ($kinerja == 'Baik' && $kehadiran == 'Lengkap' && $kreativitas == 'Tinggi') {
            return 'Terbaik';
        } elseif ($kinerja == 'Baik' && $kehadiran == 'Lengkap' && $kreativitas == 'Sedang') {
            return 'Terbaik';
        } elseif ($kinerja == 'Sangat Baik' && $kehadiran == 'Lengkap' && $kreativitas == 'Sedang') {
            return 'Terbaik';
        } else {
            return 'Tidak';
        }
    }
}
