<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Contact extends Controller
{
    public function index()
    {
        // Mengirim variabel title ke view supaya header bisa pakai judul dinamis
        return view('contact', ['title' => 'Hubungi Kami']);
    }

    public function sendEmail()
    {
        $email = \Config\Services::email();

        $name = $this->request->getPost('name');
        $fromEmail = $this->request->getPost('email');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');

        $email->setFrom($fromEmail, $name);
        $email->setTo('lalalililolo62@gmail.com'); // Ganti dengan email tujuan Anda
        $email->setSubject($subject);
        $email->setMessage($message);

        // Tangkap file upload
        $file = $this->request->getFile('attachment');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Pindahkan file dulu ke folder sementara agar nama file dan format aman
            $newName = $file->getRandomName();
            $filePath = WRITEPATH . 'uploads/' . $newName;
            $file->move(WRITEPATH . 'uploads', $newName);

            // Attach file yang sudah dipindahkan
            $email->attach($filePath, $file->getClientName());
        }

        if ($email->send()) {
            return redirect()->to('/contact')->with('success', 'Pesan berhasil dikirim.');
        } else {
            $debug = $email->printDebugger(['headers', 'subject', 'body', 'debug']);
            $debugString = is_array($debug) ? implode(' | ', $debug) : $debug;
            return redirect()->to('/contact')->with('error', 'Pesan gagal dikirim. Debug info: ' . $debugString);
        }
    }
}
