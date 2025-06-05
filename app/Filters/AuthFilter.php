<?php namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface {
    public function before($request, $arguments = null) {
        if (!session('logged_in')) {
            return redirect()->to('/login');
        }
        if ($arguments && !in_array(session('role'), $arguments)) {
            return redirect()->to('/login')->with('error', 'Akses tidak diperbolehkan.');
        }
    }
    public function after($request, $response, $arguments = null) {}
}
