<?php

function cek_spp($nis, $bulan, $tahun)
{
    $ci = get_instance();

    // $ci->db->get_where('pembayaran', ['bulan_spp'=>$bulan, 'tahun_spp'=>$tahun])->result_array();

    $siswa = $ci->db->get_where('siswa', ['nis' => $nis])->row_array();
    $jumlah_dibayar = $ci->db->select_sum('jumlah_dibayar')->from('pembayaran')->where(['nis' => $nis, 'bulan_spp' => $bulan, 'tahun_spp' => $tahun])->get()->row_array();

    // print_r($jumlah_dibayar);
    $spp = [
        'jumlah_dibayar' => $jumlah_dibayar['jumlah_dibayar'],
        'status' => $jumlah_dibayar['jumlah_dibayar'] < $siswa['spp'] ? 0 : 1
    ];
    return $spp;
}
