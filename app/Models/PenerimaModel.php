<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerimaModel extends Model
{
    protected $table = 'sekolah_penerima';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_sekolah','alamat','Tahun', 'total_bantuan', 'status','jenjang'];
}
