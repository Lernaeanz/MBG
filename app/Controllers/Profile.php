<?php

namespace App\Controllers;

use App\Models\DuitmbgModel;
class Profile extends BaseController
{

public function traceFood()
{
    $model = new DuitmbgModel();

    // Hitung jumlah total bantuan (baris transaksi)
    $totalBantuan = $model->countAll();

    // Hitung jumlah sekolah unik
    $penerimaTerdaftar = $model->select('nama_sekolah')->distinct()->countAllResults();

    // Hitung jumlah vendor unik
    $mitraAktif = $model->select('vendor')->distinct()->countAllResults();

    // Hitung total dana
    $totalDana = $model->selectSum('total_biaya')->first()['total_biaya'];

    $data = [
        'title' => 'Profile Trace Food',
        'menu' => 'profile',
        'totalBantuan' => $totalBantuan,
        'penerimaTerdaftar' => $penerimaTerdaftar,
        'mitraAktif' => $mitraAktif,
        'totalDana' => $totalDana,
    ];

    return view('profile_trace_food', $data);
}

}
