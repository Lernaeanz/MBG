<?php namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table = 'keuangan';
    protected $primaryKey = 'id';

    protected $allowedFields = ['tanggal', 'keterangan', 'jenis', 'jumlah'];
    protected $useTimestamps = true;
}
