<?php

function cek_spp($nis, $bulan, $tahun)
{
    $ci = get_instance();

    $spp = $ci->db->get_where('siswa', ['nis' => $nis])->row()->spp;
    $tagihan = $ci->db->get_where('tagihan', ['nis' => $nis, 'bulan' => $bulan, 'tahun' => $tahun])->row_array();

    if(!empty($tagihan)){
        if($tagihan['is_lunas']){
            return true;
        }else{
            return $tagihan['jml_dibayar'];
        }
    }else{
        return false;
    }
}


