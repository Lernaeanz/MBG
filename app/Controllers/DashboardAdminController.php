<?php namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $table = 'sekolah';  // nama tabel database
    protected $primaryKey = 'id';  // primary key tabel

    protected $allowedFields = ['nama', 'alamat']; // field yg boleh diisi massal
}
