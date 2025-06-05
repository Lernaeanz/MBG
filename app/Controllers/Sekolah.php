<?php

namespace App\Controllers;

use App\Models\PenerimaModel;

class Sekolah extends BaseController
{
    protected $PenerimaModel;

    public function __construct()
    {
        $this->PenerimaModel = new PenerimaModel();
    }
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard',
            'menu' => 'dashboard',
        ];
        return view('admin/dashboard', $data);
    }
    public function manajemen_artikel()
    {
        $PenerimaModel = $this->PenerimaModel->findAll();
        $data = [
            'title' => 'Manajemen Artikel',
            'menu' => 'manajemen',
            'penerima' => $PenerimaModel
        ];
        return view('admin/manajemenArtikel', $data);
    }
    public function tambah_artikel()
    {
        $data = [
            'title' => 'Tambah Artikel',
            'menu' => 'manajemen',
            'validation' => \config\Services::validation()

        ];
        return view('admin/addArtikel', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ],
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul wajib diisi !'
                ]
            ],
            'sub_judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sub Judul wajib diisi !'
                ]
            ],
            'isi_artikel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Artikel tidak boleh kosong !'
                ]
            ],
        ])) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/manajemen_artikel/tambah_artikel');
        } else {
            //jika valid
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);

            $this->PenerimaModel->save([
                'gambar' => $namaGambar,
                'judul' => $this->request->getVar('judul'),
                'sub_judul' => $this->request->getVar('sub_judul'),
                'isi_artikel' => $this->request->getVar('isi_artikel'),
            ]);
            return redirect()->to('/manajemen_artikel');
        }
    }

    public function edit_artikel($id = false)
    {
        $artikel = $this->PenerimaModel->where(['id' => $id])->first();
        $data = [
            'title' => 'Edit Artikel',
            'menu' => 'manajemen',
            'artikel' => $artikel
        ];
        return view('admin/editArtikel', $data);
    }

    public function save_edit()
    {
        $PenerimaModel = new PenerimaModel();
        $namaGambar = $this->request->getVar('gambarLama');
        // Periksa apakah ada gambar yang diunggah
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar && $fileGambar->isValid()) {
            // Jika ada gambar yang diunggah, simpan gambar ke direktori 'img' dan dapatkan nama filenya
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            unlink('img/' . $this->request->getVar('gambarLama'));
        } else {
            // Jika tidak ada gambar yang diunggah, gunakan gambar default
            $namaGambar = $namaGambar;
        }

        // Menyiapkan data yang ingin diupdate
        $dataToUpdate = array(
            'judul' => $this->request->getPost('judul'),
            'sub_judul' => $this->request->getPost('sub_judul'),
            'isi_artikel' => $this->request->getPost('isi_artikel'),
            // Update nama gambar hanya jika ada gambar yang diunggah
            'gambar' => $namaGambar,
            // Tambahkan field lain yang ingin diupdate
        );

        // Lakukan update hanya pada field-field yang diinginkan
        $PenerimaModel->update($this->request->getPost('id_artikel'), $dataToUpdate);

        return redirect()->to('/manajemen_artikel');
    }



    public function delete_artikel($id = false)
    {
        $PenerimaModel = new PenerimaModel();
        $PenerimaModel->delete($id);
        return redirect()->to('/manajemen_artikel');
    }
}
