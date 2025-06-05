<?php namespace App\Controllers;

use App\Models\RegisterModel;

class Register extends BaseController
{
    public function submit()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|valid_email|is_unique[register.email]',
            'password'   => 'required|min_length[6]',
            'agree'      => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Kalau validasi gagal, kembali ke form dengan error dan input sebelumnya
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $registerModel = new RegisterModel();

        $data = $this->request->getPost();

        $registerModel->insertUser($data);

        // Setelah berhasil insert, redirect ke halaman login
        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
