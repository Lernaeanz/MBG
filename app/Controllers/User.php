<?php

namespace App\Controllers;

use App\Models\PenerimaModel;
use App\Models\AuthModel;
use App\Models\FeedbackModel;
use App\Models\DuitmbgModel;

class User extends BaseController
{
    protected $PenerimaModel;
    protected $AuthModel;
    protected $FeedbackModel;
    protected $DuitmbgModel;

    public function __construct()
    {
        $this->PenerimaModel = new PenerimaModel();
        $this->AuthModel = new AuthModel();
        $this->FeedbackModel = new FeedbackModel();
        $this->DuitmbgModel = new DuitmbgModel();
        helper('session');
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'menu' => 'home'
        ];
        return view('user/home', $data);
    }

    public function pengaduan()
    {
        $data = [
            'title' => 'pengaduan',
            'menu' => 'pengaduan'
        ];
        return view('user/pengaduan', $data);
    }
    public function keuangan()
    {
        $data = [
            'title' => 'Laporan Keuangan',
            'menu' => 'keuangan'
        ];
        return view('user/keuangan', $data);
    }
    public function bantuan()
    {
        $DuitmbgModel = $this->DuitmbgModel->findAll();
        $data = [
            'title' => 'Penerima Bantuan',
            'menu' => 'bantuan',
            'penerima' => $DuitmbgModel
        ];
        return view('user/halpenerimabantuan', $data);
    }
public function program($page = 1)
{
    $perPage = 12; // tampilkan 12 komentar per halaman

    $feedbackModel = $this->FeedbackModel;

    $totalFeedback = $feedbackModel->countAllResults(false);

    // Hitung total halaman
    $totalPages = ceil($totalFeedback / $perPage);

    // Pastikan $page valid
    if ($page < 1) {
        $page = 1;
    } elseif ($page > $totalPages && $totalPages > 0) {
        $page = $totalPages;
    }

    $offset = ($page - 1) * $perPage;

$feedbackData = $feedbackModel->orderBy('id', 'DESC')
                             ->findAll($perPage, $offset);


    $data = [
        'title' => 'Efek Program',
        'menu' => 'program',
        'feedback' => $feedbackData,
        'currentPage' => $page,
        'totalPages' => $totalPages,
    ];

    return view('user/halefekprogram', $data);
}


    public function save_feedback()
    {
        // Menangani form submit
        $model = new FeedbackModel();

        // Mengambil input dari form
        $nama = $this->request->getPost('nama');
        $instansi = $this->request->getPost('instansi');
        $komentar = $this->request->getPost('komentar');

        // Menyimpan komentar ke database
        $model->save([
            'nama' => $nama,
            'instansi' => $instansi,
            'komentar' => $komentar
        ]);

        // Redirect untuk memperbarui halaman setelah mengirim komentar
        return redirect()->to('/program');
    }

    public function save_step1()
    {
        $date_ = $this->request->getVar('date');
        $time_ = $this->request->getVar('time');

        if (!$this->validate([
            'date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Date required',

                ]
            ],
            'time' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Time required'
                ]
            ],
        ])) {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/therapy_step_1');
        } else {
            //jika valid
            // Simpan data dalam sesi
            session()->set('date_', $date_);
            session()->set('time_', $time_);
            return redirect()->to('/therapy_step_2');
        }
    }

    public function therapy_step_2()
    {
        // Ambil data dari sesi
        $date_ = session()->get('date_');
        $time_ = session()->get('time_');

        $data = [
            'title' => 'Therapy Step 2',
            'menu' => 'therapy',
            'date_' => $date_, // Kirim data ke view
            'time_' => $time_, // Kirim data ke view
        ];
        return view('user/therapyStep2', $data);
    }

    public function save_therapy()
    {
        $id = $this->request->getVar('id');
        $date = $this->request->getVar('date');
        $time = $this->request->getVar('time');
        $first_name = $this->request->getVar('first_name');
        $last_name = $this->request->getVar('last_name');
        $phone = $this->request->getVar('phone');
        $email = $this->request->getVar('email');

        if (!$this->validate([
            'date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Date required',
                ]
            ],
            'time' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Time required'
                ]
            ],
            'id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'You need to login'
                ]
            ],
            'first_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'First name required'
                ]
            ],
            'last_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Last name required'
                ]
            ],
            'phone' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Phone number required',
                    'numeric' => 'Your input at phone column is not a number',
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email required'
                ]
            ],
        ])) {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/therapy_step_2');
        } else {

            $Exists = $this->FeedbackModel->where('date', $date)->where('time', $time)->where('id', $id)->first();
            if ($Exists) {
                // Jika resep sudah ada, berikan pesan kesalahan
                session()->setFlashdata('error', 'You have already register therapy at the same time and date');
                return redirect()->to('therapy_step_2/');
            } else {
                //jika valid
                $this->FeedbackModel->save([
                    'id' => $id,
                    'date' => $date,
                    'time' => $time,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'phone' => $phone,
                    'email' => $email,

                ]);
            }
            return redirect()->to('/therapy_step_3');
        }
    }

    public function therapy_step_3()
    {
        $date = session()->get('date_');
        $time = session()->get('time_');

        $data = [
            'title' => 'Therapy Step 3',
            'menu' => 'article',
            'date' => $date,
            'time' => $time,
        ];
        return view('user/therapyStep3', $data);
    }
    public function article()
    {
        $PenerimaModel = $this->PenerimaModel->findAll();

        $data = [
            'title' => 'Article',
            'menu' => 'article',
            'artikel' => $PenerimaModel
        ];
        return view('user/article', $data);
    }

    public function detail_artikel($id = false)
    {
        $artikel = $this->PenerimaModel->where(['id' => $id])->first();

        $data = [
            'title' => 'Detail Article',
            'menu' => 'article',
            'artikel' => $artikel
        ];
        return view('user/detailArticle', $data);
    }
}
