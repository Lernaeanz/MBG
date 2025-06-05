<?php

namespace App\Models;

use CodeIgniter\Model;

class BlockchainModel extends Model
{
    protected $table = 'blockchain';
    protected $primaryKey = 'id';
    protected $allowedFields = ['transaksi_id', 'data_transaksi', 'hash_prev', 'hash_curr', 'timestamp'];

    public function getLastBlock()
    {
        return $this->orderBy('id', 'DESC')->first();
    }

    public function createBlock($transaksi_id, $data_transaksi)
    {
        // Ambil blok terakhir untuk dapatkan hash_prev
        $lastBlock = $this->getLastBlock();
        $hashPrev = $lastBlock ? $lastBlock['hash_curr'] : '0'; // Genesis block hash_prev = 0

        // Data transaksi sebagai JSON
        $dataJson = json_encode($data_transaksi);

        // Buat hash blok sekarang: hash dari (hash_prev + data transaksi)
        $hashCurr = hash('sha256', $hashPrev . $dataJson);

        // Simpan blok baru ke database
        $this->insert([
            'transaksi_id' => $transaksi_id,
            'data_transaksi' => $dataJson,
            'hash_prev' => $hashPrev,
            'hash_curr' => $hashCurr,
        ]);

        return $this->insertID();
    }
}
