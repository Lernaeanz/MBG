<?php namespace App\Controllers;

use App\Models\DuitmbgModel;
use App\Models\BlockchainModel;
use CodeIgniter\Controller;

class Keuangan extends Controller
{
    protected $duitmbgModel;
    protected $blockchainModel;

    public function __construct()
    {
        $this->duitmbgModel = new DuitmbgModel();
        $this->blockchainModel = new BlockchainModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $filter = $this->request->getGet();
        $builder = $this->duitmbgModel;
    
        if (!empty($filter['tahun'])) {
            $builder = $builder->where('YEAR(tanggal)', $filter['tahun']);
        }
        if (!empty($filter['asal_dana'])) {
            $builder = $builder->where('asal_dana', $filter['asal_dana']);
        }
        if (!empty($filter['status_pembayaran'])) {
            $builder = $builder->where('status_pembayaran', $filter['status_pembayaran']);
        }
    
        $data['duitmbg'] = $builder->orderBy('tanggal', 'DESC')->findAll();
        $data['filter'] = $filter;
        $data['blockchainModel'] = $this->blockchainModel;
    
        // Session info
        $session = session();
        $data['isLoggedIn'] = $session->has('id');
        $data['role'] = $session->get('role');

        $data['title'] = 'Keuangan';
        $data['menu'] = 'keuangan';
    
        echo view('keuangan/index', $data);
    }
    

    public function create()
    {
        $session = session();
        if (!$session->has('id') || $session->get('role') !== 'sekolah') {
            return redirect()->to('/keuangan');
        }
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost();
            $post['total_biaya'] = $post['jumlah_porsi'] * $post['harga_per_porsi'];

            // Simpan transaksi baru
            $transaksi_id = $this->duitmbgModel->insert($post);

            if ($transaksi_id) {
                // Buat blok blockchain dari data transaksi baru
                $this->blockchainModel->createBlock($transaksi_id, $post);
            }

            return redirect()->to('/keuangan');
        }

        echo view('keuangan/create');
    }

    public function edit($id = null)
    {
        $session = session();
        $role = $session->get('role');
    
        // Cegah vendor (dan non-login) masuk ke edit
        if (!$session->has('id') || $role !== 'vendor') {
            return redirect()->to('/keuangan')->with('error', 'Akses ditolak.');
        }
    
        $data['item'] = $this->duitmbgModel->find($id);
        if (!$data['item']) {
            return redirect()->to('/keuangan');
        }
    
        if ($this->request->getMethod() == 'post') {
            $post = $this->request->getPost();
            $post['total_biaya'] = $post['jumlah_porsi'] * $post['harga_per_porsi'];
    
            $updated = $this->duitmbgModel->update($id, $post);
    
            if ($updated) {
                $this->blockchainModel->createBlock($id, $post);
            }
    
            return redirect()->to('/keuangan')->with('success', 'Data berhasil diperbarui.');
        }
    
        echo view('keuangan/edit', $data);
    }
    

    public function delete($id = null)
    {
        $this->duitmbgModel->delete($id);
        // Kalau ingin, bisa juga delete blok blockchain terkait (opsional)
        return redirect()->to('/keuangan');
    }
}
