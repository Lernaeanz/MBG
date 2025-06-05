<?php namespace App\Models;

use CodeIgniter\Model;

class DuitmbgModel extends Model
{
    protected $table = 'duitmbg';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'tanggal', 'nama_sekolah', 'vendor', 'jumlah_porsi', 'harga_per_porsi', 'total_biaya', 'asal_dana', 'status_pembayaran'
    ];
}
