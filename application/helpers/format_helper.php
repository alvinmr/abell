<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function nama_hari($tanggal){

        $ubah = gmdate($tanggal, time()+60*60*8);

        $pecah = explode("-",$ubah);

        $tgl = $pecah[2];

        $bln = $pecah[1];

        $thn = $pecah[0];

        $nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));

        $nama_hari = "";

        if($nama=="Sunday") {$nama_hari="Minggu";}

        else if($nama=="Monday") {$nama_hari="Senin";}

        else if($nama=="Tuesday") {$nama_hari="Selasa";}

        else if($nama=="Wednesday") {$nama_hari="Rabu";}

        else if($nama=="Thursday") {$nama_hari="Kamis";}

        else if($nama=="Friday") {$nama_hari="Jumat";}

        else if($nama=="Saturday") {$nama_hari="Sabtu";}
        return $nama_hari;
    }

    function is_logged_in(){
        $ci = get_instance();
        if(!$ci->session->userdata('email')){
            redirect('auth');
        }
    }